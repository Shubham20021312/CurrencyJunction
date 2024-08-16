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
use App\Models\Account;

class AddBankAccount extends Controller
{
    public function Add_account(){

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

        $accounts = Account::where('user_id', auth()->id())->get();
        return view('customer.add_bank',compact('accounts','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));
    }

    public function store_account(Request $request)
    {
        $validatedData = $request->validate([
            'accountHolderName' => 'required|string|max:255',
            'accountNumber' => 'required|string|max:20',
            'bankName' => 'required|string|max:255',
            'ifscCode' => 'required|string|max:11',
        ]);

        // Assuming you have user authentication and the authenticated user is creating the account
        $validatedData['user_id'] = auth()->id();

        // Create the account record in the database
        Account::create($validatedData);

        return back()->with('success', 'Account added successfully!');
    }

    public function user_bank_details(){
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

        $accounts = Account::all();

        return view('admin.user_bank_details',compact('accounts','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));

    }

    public function change_status(Request $request)
    {   
        $ticket_id = $request->input('ticketId');
        $status = $request->input('status');
        $ticket = Account::where('id', $ticket_id)->first();
        if ($ticket) {
            $ticket->status = $status;
            $ticket->save();
    
            return response()->json(['message' => 'Status updated successfully'], 200);
        } else {
            return response()->json(['error' => 'Ticket not found'], 404);
        }
    }
}
