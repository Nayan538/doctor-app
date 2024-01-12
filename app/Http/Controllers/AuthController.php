<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginValidate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $check = User::where('email','=',$request->email)->first();

        if(!$check){
            return back()->with('failed','Email Address not correct');
        }else{
            /* Check Password */
            if(Hash::check($request->password, $check->password)){
                $request->session()->put('LoggedUser', $check->id);
                return redirect()->route('dashboard');
            }else{
                return back()->with('failed','Incorrect Password');
            }
        }
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect()->route('login')->with('failed','You have been successfully Logged Out!');
        }
    }
}
