<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\user;
use Auth;
use App\Models\MerchantRequest;
use App\Models\UserRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationThankYou;
class AuthController extends Controller
{
    public function index()
    {
      return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
    
        return redirect()->back()->withErrors(['login' => 'Invalid credentials.']);
    }
    

    public function register_view()
    {  
        return view('auth.register');
    }

    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string',
            'country' => 'required|string',
            'account_type' => 'required|string|in:merchant,customer',
            'postalcode' => 'required|string'
        ]);
    
        // Create a new user instance
        $user = new User();
        $user->fill($validatedData);
        $user->password = bcrypt($request->input('password'));
        $user->save();
    
        Mail::to($user->email)->send(new RegistrationThankYou());
    
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('dashboard');
        }
        return redirect('register_view')->withErrors('Login failed');
    }
    

    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('login');
    }
    
   public function dashboard() {
    $user_id = Auth::user()->id;
    // Total count of merchant requests
    $totalCount = MerchantRequest::where('user_id', $user_id)->count();
    $startOfMonth = now()->subMonth()->startOfMonth();
    $endOfMonth = now()->subMonth()->endOfMonth();
    $countSinceLastMonth = MerchantRequest::where('user_id', $user_id)
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->count();

    $percentageSinceLastMonth = ($totalCount > 0) ? ($countSinceLastMonth / $totalCount) * 100 : 0;

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

    $max_amount = 100000;
    $performance = (($total_amount_buy + $total_amount_sell) / $max_amount) * 100;
        

    // Performance data month-wise
    $performance_monthly = [];
    $months = [];

    // Include the current month
    $months[] = now()->format('M Y');

    // Calculate performance for the current month separately
    $currentMonthStart = now()->startOfMonth();
    $currentMonthEnd = now()->endOfMonth();
    $performance_monthly[] = MerchantRequest::where('user_id', $user_id)
        ->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
        ->where('status', 'approved')
        ->sum('amount') / 100;

    // Loop through the previous 5 months
    for ($i = 1; $i <= 5; $i++) {
        $monthStart = now()->subMonths($i)->startOfMonth();
        $monthEnd = now()->subMonths($i)->endOfMonth();
        $months[] = $monthStart->format('M Y');
        $performance_monthly[] = MerchantRequest::where('user_id', $user_id)
            ->whereBetween('created_at', [$monthStart, $monthEnd])
            ->where('status', 'approved')
            ->sum('amount') / 100;
    }

    // Reverse the arrays to display the latest month first
    $performance_monthly = array_reverse($performance_monthly);
    $months = array_reverse($months);


    return view('dashboard.index', compact('totalCount', 'percentageSinceLastMonth', 'total_amount_buy', 'total_amount_sell', 'performance', 'performance_monthly', 'months'));
}

public function customer_dashboard(){
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
    
        // Performance data month-wise
        $performance_monthly = [];
        $months = [];
        for ($i = 1; $i <= 6; $i++) {
            $monthStart = now()->subMonths($i)->startOfMonth();
            $monthEnd = now()->subMonths($i)->endOfMonth();
            $months[] = $monthStart->format('M Y');
            $performance_monthly[] = MerchantRequest::where('user_id', $user_id)
                ->whereBetween('created_at', [$monthStart, $monthEnd])
                ->where('status', 'approved')
                ->sum('amount') / 100;
        }
    
        $performance_monthly = array_reverse($performance_monthly);
        $months = array_reverse($months);
        
    return view('customer.dashboard',compact('totalCount', 'total_amount_buy', 'total_amount_sell', 'performance', 'performance_monthly', 'months'));
}

public function admin_dashboard(){
    $user_id = Auth::user()->id;

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
    
        // Performance data month-wise
        $performance_monthly = [];
        $months = [];
        for ($i = 1; $i <= 6; $i++) {
            $monthStart = now()->subMonths($i)->startOfMonth();
            $monthEnd = now()->subMonths($i)->endOfMonth();
            $months[] = $monthStart->format('M Y');
            $performance_monthly[] = MerchantRequest::whereBetween('created_at', [$monthStart, $monthEnd])
                ->where('status', 'approved')
                ->sum('amount') / 100;
        }
    
        $performance_monthly = array_reverse($performance_monthly);
        $months = array_reverse($months);
        
    return view('admin.dashboard',compact('totalCount', 'total_amount_buy', 'total_amount_sell', 'performance', 'performance_monthly', 'months'));
}
    public function getRequestCount()
    {
        $user_id = Auth::user()->id;
        $totalCount = UserRequest::where('user_id', $user_id)->count();

        return response()->json(['count' => $totalCount]);
    }   
    
    public function profile(){
        return view('dashboard.profile');
    }
}
