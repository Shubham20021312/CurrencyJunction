<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\RegisterUser; 
class RegisterController extends Controller
{
    public function register_index(Request $request){
        return view('register');
    }
    public function register(Request $request)
    {
        dd($request->all());
          // Validate form data
        //   $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'phoneNumber' => 'required|string|max:20|unique:users',
        //     'username' => 'required|string|max:255|unique:users',
        //     'password' => 'required|string|min:8',
        //     'address' => 'required|string',
        //     'country' => 'required|string',
        //     'accountType' => 'required|string|in:merchant,customer',
        //     'email_verification' => 'required|string', // Add email verification field
        //     'mobile_verification' => 'required|string', // Add mobile OTP verification field
        // ]);
        // dd('l');

        // Validate OTPs (assuming you store them in session)
        $emailVerification = $request->session()->get('email_verification');
        $mobileVerification = $request->session()->get('mobile_verification');

        if ($emailVerification !== $request->input('email_verification') ||
            $mobileVerification !== $request->input('mobile_verification')) {
            return back()->withErrors(['otp' => 'Invalid OTPs'])->withInput();
        }

        // Save user data to database
        $user = new RegisterUser();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phoneNumber');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->address = $request->input('address');
        $user->country = $request->input('country');
        $user->account_type = $request->input('accountType');
        $user->save();

        // Optionally, you can log the user in here

        // Redirect or respond with success message
        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }
    }   
