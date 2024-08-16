<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddedShop;
use App\Models\CurrencyDetail;
use App\Models\MerchantRequest;

use Auth;

class AddShopController extends Controller
{
 public function add_shop(){

    $user_id = Auth::user()->id;
    $totalCount = MerchantRequest::where('user_id', $user_id)->count();
    $buy_rates = MerchantRequest::where('user_id', $user_id)->where('type', 'buy')->where('status', 'approved')->orderBy('created_at', 'asc')->get();
    $total_amount_buy = $buy_rates->sum('amount');
    $sell_rates = MerchantRequest::where('user_id', $user_id)->where('type', 'sell')->where('status', 'approved')->orderBy('created_at', 'asc')->get();
    $total_amount_sell = $sell_rates->sum('amount');
    $performance = ($total_amount_buy + $total_amount_sell) / 100;

    $added_shop = AddedShop::where('user_id',$user_id)->first(); 
   
    return view('merchant.add_shop',compact('totalCount', 'total_amount_buy', 'total_amount_sell', 'performance','added_shop'));
 }  
 
 public function update_shop(Request $request){
    $user_id = Auth::user()->id;
    $validatedData = $request->validate([
        'name' => 'required|string',
        'location' => 'required|string',
        'contact' => 'required|string',
        'operating_hours' => 'required|string',
    ]);

    $shop = AddedShop::where('user_id',$user_id)->first();

    $shop->name = $validatedData['name'];
    $shop->location = $validatedData['location'];
    $shop->contact = $validatedData['contact'];
    $shop->operating_hours = $validatedData['operating_hours'];
    $shop->save();
    return redirect()->route('add_shop')->with('success', 'Shop details updated successfully');
}


 public function store_shop(Request $request){
   // Validate the incoming request data
   $validatedData = $request->validate([
    'name' => 'required|string|max:255',
    'location' => 'required|string|max:255',
    'contact' => 'required|string|max:20',
    'operating_hours' => 'required|string|max:255',
    'country' => 'required|string|max:255',
    'additional_services' => 'nullable|string|max:255',
    'special_instructions' => 'nullable|string',
    ]);

    // Create a new Shop instance
    $shop = new AddedShop();
    $shop->user_id = Auth::user()->id;
    $shop->name = $validatedData['name'];
    $shop->location = $validatedData['location'];
    $shop->contact = $validatedData['contact'];
    $shop->operating_hours = $validatedData['operating_hours'];
    $shop->country = $validatedData['country'];
    $shop->additional_services = $validatedData['additional_services'];
    $shop->special_instructions = $validatedData['special_instructions'];

    $shop->save();
    return response()->json(['success' => true, 'message' => 'Shop added successfully']);
 }

 public function currency_detail(){
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
    $data = CurrencyDetail::where('user_id',$user_id)->get();
    return view('merchant.currency_detail', compact('data','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));
 }

 public function currency_detail_store(Request $request)
    { // Validate the incoming request data
        $validatedData = $request->validate([
            'currency_code' => 'required|string|max:255',
            'currency_name' => 'required|string|max:255',
            'buying_rate' => 'required|numeric',
            'selling_rate' => 'required|numeric',
            'minimum_transaction' => 'nullable|numeric',
            'maximum_transaction' => 'nullable|numeric',
            'fee' => 'nullable|numeric',
            'availability' => 'nullable|boolean',
        ]);

        // Create a new CurrencyDetail instance with the validated data
        $currencyDetail = new CurrencyDetail();
        $currencyDetail->user_id = Auth::user()->id;
        $currencyDetail->currency_code = $validatedData['currency_code'];
        $currencyDetail->currency_name = $validatedData['currency_name'];
        $currencyDetail->buying_rate = $validatedData['buying_rate'];
        $currencyDetail->selling_rate = $validatedData['selling_rate'];
        $currencyDetail->minimum_transaction = $validatedData['minimum_transaction'];
        $currencyDetail->maximum_transaction = $validatedData['maximum_transaction'];
        $currencyDetail->fee = $validatedData['fee'];
        $currencyDetail->availability = $validatedData['availability'];
        $currencyDetail->save();
        // Optionally, you can return a JSON response if it's an AJAX request
        return response()->json([
            'message' => 'Currency detail added successfully!',
            'currency_detail' => $currencyDetail,
        ]);
    }

    public function currency_detail_delete(Request $request)
    {
        $id = $request->id;
        $record = CurrencyDetail::find($id);
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->delete();
        return response()->json(['message' => 'Record deleted successfully'], 200);
    }
}
