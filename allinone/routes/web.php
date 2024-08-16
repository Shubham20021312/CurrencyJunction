<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddShopController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CurrencyExchangeController ;
use App\Http\Controllers\UserList ;
use App\Http\Controllers\SupportTicketController ;
use App\Http\Controllers\AddBankAccount ;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home',[HomeController::class,'home'])->name('home');
Route::get('/aboutus',[HomeController::class,'aboutus'])->name('aboutus');
Route::get('/service',[HomeController::class,'service'])->name('service');
Route::get('/roadmap',[HomeController::class,'roadmap'])->name('roadmap');
Route::get('/feature',[HomeController::class,'feature'])->name('feature');
Route::get('/faq',[HomeController::class,'faq'])->name('faq');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

//register
Route::group(['middleware' =>'guest'],function(){
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register/view', [AuthController::class, 'register_view'])->name('register_page');
Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::group(['middleware' =>'auth'],function(){
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('customer_dashboard', [AuthController::class, 'customer_dashboard'])->name('customer_dashboard');
Route::get('admin_dashboard', [AuthController::class, 'admin_dashboard'])->name('admin_dashboard');

// web.php

Route::get('/get-request-count', [AuthController::class, 'getRequestCount'])->name('getRequestCount');
Route::get('profile', [AuthController::class, 'profile'])->name('profile');

Route::get('add_shop', [AddShopController::class, 'add_shop'])->name('add_shop');
Route::post('update_shop', [AddShopController::class, 'update_shop'])->name('update_shop');

Route::post('store_shop', [AddShopController::class, 'store_shop'])->name('store_shop');

Route::get('currency_detail', [AddShopController::class, 'currency_detail'])->name('currency_detail');
Route::post('currency_detail/store', [AddShopController::class, 'currency_detail_store'])->name('currency_detail.store');
Route::post('currency_detail/delete', [AddShopController::class, 'currency_detail_delete'])->name('currency_detail/delete');

//request
Route::get('merchant/request', [RequestController::class, 'merchant_request'])->name('merchant.request');
Route::post('merchant/request/delete', [RequestController::class, 'merchant_request_delete'])->name('merchant.request.delete');
Route::post('merchant/bankdetails', [RequestController::class, 'merchant_bankdetails'])->name('merchant.bankdetails');

//payment
Route::get('merchant/payment', [RequestController::class, 'merchant_payment'])->name('merchant.payment');
Route::post('merchant/payment-proof', [RequestController::class, 'upload'])->name('merchant.upload');
Route::get('merchant/status', [RequestController::class, 'status'])->name('status');

//money exchange
Route::get('currency-exchange', [CurrencyExchangeController::class, 'currency_exchange'])->name('currency-exchange');
Route::post('currency-exchange/data', [CurrencyExchangeController::class, 'currency_exchange_data'])->name('currency-exchange.data');

Route::get('currency-exchange/transaction_request', [CurrencyExchangeController::class, 'transaction_request'])->name('currency-exchange.transaction_request');
Route::post('currency-exchange/transaction_request_proof', [CurrencyExchangeController::class, 'transaction_request_proof'])->name('transaction_request');

//fixed exchange status
Route::get('status', [CurrencyExchangeController::class, 'fixed_status'])->name('fixed_status');
Route::post('floating_exchange', [CurrencyExchangeController::class, 'floating_exchange'])->name('floating_exchange');

Route::post('floating_exchange_user_id', [CurrencyExchangeController::class, 'floating_exchange_user_id'])->name('floating_exchange_user_id');
Route::post('floating_exchange/request', [CurrencyExchangeController::class, 'floating_exchange_request'])->name('floating_exchange_request');


//user list
Route::get('list', [UserList::class, 'list'])->name('admin.list');
Route::get('merchant_payment_request', [UserList::class, 'merchant_payment_request'])->name('admin.merchant_payment_request');
Route::post('admin/action', [UserList::class, 'admin_action'])->name('admin_action');
Route::post('admin/change_status', [UserList::class, 'status_change'])->name('status_change');

Route::get('admin/user_payment_request', [UserList::class, 'user_payment_request'])->name('admin.user_payment_request');
Route::post('admin/user_change_status', [UserList::class, 'user_status_change'])->name('user_status_change');

Route::get('suppot_ticket', [SupportTicketController::class, 'suppot_ticket'])->name('suppot_ticket');
Route::post('suppot_ticket/store', [SupportTicketController::class, 'store'])->name('support.store');
Route::get('show_ticket', [SupportTicketController::class, 'show_ticket'])->name('show_ticket');

Route::post('change/status', [SupportTicketController::class, 'change_status'])->name('change_status');

Route::get('account', [AddBankAccount::class, 'Add_account'])->name('Add_account');
Route::post('store_account', [AddBankAccount::class, 'store_account'])->name('store_account');

Route::get('user_bank_details', [AddBankAccount::class, 'user_bank_details'])->name('user_bank_details');
Route::post('user_bank_details/status', [AddBankAccount::class, 'change_status'])->name('user_bank_details.change_status');





});




