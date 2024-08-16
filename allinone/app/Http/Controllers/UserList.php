<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentProof;
use App\Models\MerchantRequest;
use App\Models\UserRequest;

class UserList extends Controller
{
    public function list(){

        $users = User::all();

        $totalCount = MerchantRequest::all()->count();
    
        $buy_rates = MerchantRequest::where('type', 'buy')
        ->where('status', 'approved')
        ->orderBy('created_at', 'asc')
        ->get();
    
        $total_amount_buy = $buy_rates->sum('amount');
        $sell_rates = MerchantRequest::where('type', 'sell')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();
    
        $total_amount_sell = $sell_rates->sum('amount');
        $performance = ($total_amount_buy + $total_amount_sell) / 100;
        
        return view('admin.list',compact('users','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));
    }

    public function merchant_payment_request(){
        
        $totalCount = MerchantRequest::all()->count();
    
        $buy_rates = MerchantRequest::where('type', 'buy')
        ->where('status', 'approved')
        ->orderBy('created_at', 'asc')
        ->get();
    
        $total_amount_buy = $buy_rates->sum('amount');
        $sell_rates = MerchantRequest::where('type', 'sell')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();
    
        $total_amount_sell = $sell_rates->sum('amount');
        $performance = ($total_amount_buy + $total_amount_sell) / 100;
        
        //
        $merchant_request = PaymentProof::with('user')->get();

        return view('admin.merchant_request',compact('merchant_request','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));

    }

    public function admin_action(Request $request){
        $request_id = $request->all('requestId');  

        $details = MerchantRequest::where('request_id',$request_id)->first();

        return response()->json(['details' => $details]);
    }

    public function status_change(Request $request){
        $request_id = $request->all('requestId');
        $request_status = $request->input('status');
        $status = PaymentProof::where('request_id',$request_id)->first();
        $status->payment_process = $request_status;
        $status->save();
    }

    public function user_payment_request(){

        $totalCount = MerchantRequest::all()->count();
    
        $buy_rates = MerchantRequest::where('type', 'buy')
        ->where('status', 'approved')
        ->orderBy('created_at', 'asc')
        ->get();
    
        $total_amount_buy = $buy_rates->sum('amount');
        $sell_rates = MerchantRequest::where('type', 'sell')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();
    
        $total_amount_sell = $sell_rates->sum('amount');
        $performance = ($total_amount_buy + $total_amount_sell) / 100;

        //
        $user_request = UserRequest::with('user')->get();
        return view('admin.user_request',compact('user_request','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));
    }

    public function user_status_change(Request $request){
        $request_id = $request->input('requestId');
        $status = $request->input('status');
            $userRequest = UserRequest::where('request_id', $request_id)->first();
    
        if ($userRequest) {
            $userRequest->after_proof = $status;
            $userRequest->save();
    
            return response()->json(['message' => 'Status updated successfully'], 200);
        } else {
            return response()->json(['message' => 'User request not found'], 404);
        }
    }
    
    
}
