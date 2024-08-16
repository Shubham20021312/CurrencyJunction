<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\MerchantRequest;
use  App\Models\BankDetails;
use  App\Models\PaymentProof;
use App\Models\UserRequest;

class RequestController extends Controller
{
    public function merchant_request(){
    $user_id = Auth::user()->id;

    $totalCount = MerchantRequest::where('user_id', $user_id)->count();
    
    $buy_rates = MerchantRequest::where('user_id', $user_id)
        ->where('type', 'buy')
        ->where('status', 'approved')
        ->orderBy('created_at', 'asc')
        ->get();

    $total_amount_buy = $buy_rates->sum('amount');
    $sell_rates = MerchantRequest::where('user_id', $user_id)
        ->where('type', 'sell')
        ->where('status', 'approved')
        ->orderBy('created_at', 'asc')
        ->get();

    $total_amount_sell = $sell_rates->sum('amount');

    $performance = ($total_amount_buy + $total_amount_sell) / 100;

    //
    $data = MerchantRequest::where('user_id',$user_id)->get();
        return view('merchant.request',compact('data','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));
    }

    public function merchant_request_delete(Request $request)
    {
        $request_id = $request->input('itemId');
        $remark = $request->input('remark'); 
    
        $transaction = MerchantRequest::where('request_id', $request_id)->first();
    
        if ($transaction) {
            $transaction->status = 'rejected';
            $transaction->remark = $remark;
            $transaction->save();
        
            return response()->json(['message' => 'Request rejected successfully'], 200);
        } else {
            return response()->json(['error' => 'Transaction not found'], 404);
        }
    }
    

    public function merchant_bankdetails(Request $request){
        // Extracting itemId and remarks from request
        $id = $request->input('itemId');
        
        $remark = $request->input('remarks');
    
        // Creating a new BankDetails instance
        $bankDetail = new BankDetails();
    
        // Assigning values from request to BankDetails attributes
        $bankDetail->bank_name = $request->input('bankName');
        $bankDetail->account_holder_name = $request->input('accountHolderName');
        $bankDetail->account_number = $request->input('accountNumber');
        $bankDetail->ifsc_code = $request->input('ifscCode');
        $bankDetail->request_id = $request->input('itemId');
        $bankDetail->user_id = Auth::user()->id;
    
        // Handle the uploaded file
        if ($request->hasFile('qrCode')) {
            $path = $request->file('qrCode')->store('public/qr_codes');
            $bankDetail->qr_code = $path;
        }
        $bankDetail->save();
        $transaction = MerchantRequest::where('request_id',$id)->first();
        $transaction->status = 'approved';
        $transaction->remark = $remark;
        $transaction->save();

        $user_request = UserRequest::where('request_id',$id)->first();
        $user_request->status = '1';
        $user_request->save();
    
        // Return a JSON response indicating success
        return response()->json(['message' => 'Bank details saved successfully'], 200);
    }
    
    public function merchant_payment() {
        $user_id = Auth::user()->id;
// dd($user_id);
        $totalCount = MerchantRequest::where('user_id', $user_id)->count();
    
        $buy_rates = MerchantRequest::where('user_id', $user_id)
            ->where('type', 'buy')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();

        $total_amount_buy = $buy_rates->sum('amount');
        $sell_rates = MerchantRequest::where('user_id', $user_id)
            ->where('type', 'sell')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();

        $total_amount_sell = $sell_rates->sum('amount');

        $performance = ($total_amount_buy + $total_amount_sell) / 100;
        //

        $data = MerchantRequest::where('user_id', $user_id)->where('status', 'approved')->get(); 
        // if($data->isEmpty()) {
        //     return redirect()->back()->with('error', 'No approved requests found.');
        // }
        // dd($data);
        $details = BankDetails::whereIn('request_id', $data->pluck('request_id'))->get();
        $proof = PaymentProof::whereIn('request_id',$details->pluck('request_id'))->get();

        return view('merchant.payment', compact('data', 'details','proof','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));    
    }   
    
    public function upload(Request $request)
    {
        $user_id = Auth::user()->id;
        // Validate the request data
        $request->validate([
            'request_id' => 'required',
            'proof.*' => 'required|file', 
        ]);
    
        if ($request->hasFile('proof')) {
            foreach ($request->file('proof') as $file) {
                $path = $file->store('public/proof');
    
                PaymentProof::create([
                    'user_id' => $user_id,
                    'request_id' => $request->request_id,
                    'merchant_proof' => $path,
                    'payment_process' =>'Processing'
                ]);
            }
        }
        return redirect()->back()->with('success', 'Files uploaded successfully.');
    }

    public function status(){
        $user_id = Auth::user()->id;

        $totalCount = MerchantRequest::where('user_id', $user_id)->count();
    
        $buy_rates = MerchantRequest::where('user_id', $user_id)
            ->where('type', 'buy')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();
    
        $total_amount_buy = $buy_rates->sum('amount');
        $sell_rates = MerchantRequest::where('user_id', $user_id)
            ->where('type', 'sell')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();
    
        $total_amount_sell = $sell_rates->sum('amount');
    
        $performance = ($total_amount_buy + $total_amount_sell) / 100;
        //

        $status = PaymentProof::where('user_id',$user_id)->get();
        return view('merchant.payment_status',compact('status','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));
    }
    
}
