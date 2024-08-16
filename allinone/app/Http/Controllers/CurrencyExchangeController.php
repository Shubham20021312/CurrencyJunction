<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FixedRate;
use App\Models\UserRequest;
use Auth;
use Illuminate\Support\Str;
use  App\Models\PaymentProof;
use  App\Models\CurrencyDetail;
use  App\Models\AddedShop;
use  App\Models\MerchantRequest;

class CurrencyExchangeController extends Controller
{
    public function currency_exchange(){

        $user_id =Auth::user()->id;
        $totalCount = MerchantRequest::where('customer_id', $user_id)->count();
    
        $buy_rates = MerchantRequest::where('customer_id', $user_id)
        ->where('type', 'buy')
        ->where('status', 'approved')
        ->orderBy('created_at', 'asc')
        ->get();
    
        $total_amount_buy = $buy_rates->sum('amount');
        $sell_rates = MerchantRequest::where('customer_id', $user_id)
            ->where('type', 'sell')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();
    
        $total_amount_sell = $sell_rates->sum('amount');
        $performance = ($total_amount_buy + $total_amount_sell) / 100;
        
        return view('customer.currencyexchange',compact('totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));
    }

    public function currency_exchange_data(Request $request){

        if ($request->has('approval') && $request->boolean('approval')) {
            $fromCurrency = $request->input('fromCurrency');
            $toCurrency = $request->input('toCurrency');
            $fixedRate = FixedRate::where('currency_from', $fromCurrency)->where('currency_to', $toCurrency)->first();
            $user_id = Auth::id(); 
    
            $user_request = new UserRequest();
            $user_request->user_id = $user_id;
            $user_request->request_id = Str::random(8); 
            $user_request->status = $request->boolean('approval'); 
            $user_request->rate = $fixedRate->rate;
            $user_request->amount = $request->input('amount');
            $user_request->fee = $fixedRate->fee;
            $user_request->transaction_type = 'fixed';
            $user_request->save();
    
            return response()->json(['message' => 'Transaction approved successfully']);
        }
    
        $fromCurrency = $request->input('fromCurrency');
        $toCurrency = $request->input('toCurrency');
        $fixedRate = FixedRate::where('currency_from', $fromCurrency)->where('currency_to', $toCurrency)->first();
    
        if (!$fixedRate) {
            return response()->json(['error' => 'Exchange rate not found'], 404);
        }
    
        $rate = $fixedRate->rate;
        $fee = $fixedRate->fee;
        $amount = $request->input('amount');
    
        $exchangedAmount = $amount * $rate;
        
        if ($fee !== null) {
            $exchangedAmount += $fee;
        }
    
        return response()->json([
            'exchange_rate' => $rate,
            'exchanged_amount' => $exchangedAmount,
            'fee' => $fee
        ]);
    }

    public function transaction_request(){
       
        $user_id = Auth::user()->id;
        $totalCount = MerchantRequest::where('customer_id', $user_id)->count();
    
        $buy_rates = MerchantRequest::where('customer_id', $user_id)
        ->where('type', 'buy')
        ->where('status', 'approved')
        ->orderBy('created_at', 'asc')
        ->get();
    
        $total_amount_buy = $buy_rates->sum('amount');
        $sell_rates = MerchantRequest::where('customer_id', $user_id)
            ->where('type', 'sell')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();
    
        $total_amount_sell = $sell_rates->sum('amount');
        $performance = ($total_amount_buy + $total_amount_sell) / 100;
        
        $data = UserRequest::where('user_id', $user_id)->where('status', '1')->get(); 
        
        $proof = PaymentProof::whereIn('request_id',$data->pluck('request_id'))->get();
        return view('customer.transaction-request', compact('data','proof','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));
    }

    public function transaction_request_proof(Request $request){
        $request_id = $request->input('request_id');
        $user_id = Auth::user()->id;
    
        if ($request->hasFile('proof')) {
            $path = $request->file('proof')->store('public/proof');
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
        $data = UserRequest::where('user_id', $user_id)->where('request_id', $request_id)->where('status', '1')->first(); 
        
        if (isset($data)) {
            $data->proof = $path; 
            $data->after_proof = 'Processing';
            $data->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'error' => 'No matching record found'], 404);
        }
    }
    public function fixed_status(){
        $user_id = Auth::user()->id;


        $totalCount = MerchantRequest::where('customer_id', $user_id)->count();
    
        $buy_rates = MerchantRequest::where('customer_id', $user_id)
        ->where('type', 'buy')
        ->where('status', 'approved')
        ->orderBy('created_at', 'asc')
        ->get();
    
        $total_amount_buy = $buy_rates->sum('amount');
        $sell_rates = MerchantRequest::where('customer_id', $user_id)
            ->where('type', 'sell')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();
    
        $total_amount_sell = $sell_rates->sum('amount');
        $performance = ($total_amount_buy + $total_amount_sell) / 100;

        $status = UserRequest::where('user_id',$user_id)->get();
        return view('customer.fixed_status',compact('status','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));
    }

    public function floating_exchange(Request $request){
        $currency_to = $request->input('currencyTo');
        $shop = CurrencyDetail::where('currency_code', $currency_to)->get();
    
        $results = [];
    
        foreach ($shop as $currency) {
            $user_id = $currency->user_id;
            $addShop = AddedShop::where('user_id', $user_id)->first();
            if ($addShop) {
                $results[] = $addShop;
            }
        }
        
        return response()->json($results);
    }
    
    public function floating_exchange_user_id(Request $request){
        $user_id = $request->input('user_id');
        $currency = $request->input('currencyTo');
    
        $currency_details = CurrencyDetail::where('currency_code', $currency)->where('user_id', $user_id)->first();
    
        return response()->json($currency_details);
    }
    public function floating_exchange_request(Request $request){
        $user_id = Auth::user()->id;
        $amount = $request->input('amount');
        $request_type = $request->input('option');
        $currencyCode = $request->input('currencyCode');
        $shop_user_id = $request->input('userId');
    
        $currency_details = CurrencyDetail::where('currency_code', $currencyCode)->where('user_id', $shop_user_id)->first();
    
        if($currency_details === null) {
            return response()->json(['error' => 'Currency details not found'], 404);
        }
    
        if($request_type == 'buy'){
            $amount = ($amount * $currency_details->buying_rate) + $currency_details->fee ;
            $type = 'buy';
            $rate = $currency_details->buying_rate;
        } else {
            $amount = ($amount * $currency_details->selling_rate) + $currency_details->fee ;
            $type = 'sell';
            $rate = $currency_details->selling_rate;
        }
    
        $request = new MerchantRequest();
        $request->user_id = $shop_user_id;
        $request->currency_code =  $currencyCode;
        $request->request_id = Str::random(8);
        $request->amount = $amount ;
        $request->rate = $rate;
        $request->type = $type;
        $request->customer_id = $user_id;
        $request->save();
    
        $user_request = new UserRequest();
        $user_request->user_id = $user_id;
        $user_request->request_id = $request->request_id;
        $user_request->amount = $request->amount;
        $user_request->rate = $request->rate;
        $user_request->transaction_type = 'Floating';
        $user_request->currency_code = $currencyCode;

        $user_request->save();
    
        return response()->json(['message' => 'Request submitted successfully'], 200);
    }
    

    
}
