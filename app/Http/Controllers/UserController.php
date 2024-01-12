<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $admin = new User();
        $admin->name=$request->adminName;
        $admin->email=$request->adminEmail;
        $admin->password=Hash::make($request->adminPass);
        $admin->type=$request->adminType;
        $admin->status=$request->adminStatus;
        $admin->save();
        return redirect('admin');
    }

    public function show()
    {
        $list_admin = User::all();
        $data['data'] = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        // $array = json_decode(json_encode($list_attendance), true);
        return view('admin.admin',['list_admin'=>$list_admin],$data);
    }

    public function edit($id)
    {
        $data['data'] = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        $admin = User::find($id);
        $list_admin = User::all();
        return view('admin.edit-admin',[
            'admin'=>$admin,
            'list_admin'=>$list_admin,
        ], $data);
    }

    public function update(Request $request)
    {
        $edit_admin = User::find($request->id);
        $edit_admin->name=$request->adminName;
        $edit_admin->email=$request->adminEmail;
        $edit_admin->type=$request->adminType;
        $edit_admin->status=$request->adminStatus;
        $edit_admin->save();
        return redirect('admin');
    }
}
