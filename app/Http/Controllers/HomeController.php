<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function dashboard(){
        $data['data'] = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view('dashboard', $data);
        //return view('dashboard');
    }

    public function account(){
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        return view('account',compact('data'));
    }

    public function accountUpdate(Request $request)
    {
        $change = User::findOrFail($request->id);
        $change->name = $request->name;
        $change->email = $request->email;
        $change->password = Hash::make($request->password);
        $change->role = $request->role;
        $save = $change->save();

        return back()->with('success', 'Information Updated Successfully.');
    }
}
