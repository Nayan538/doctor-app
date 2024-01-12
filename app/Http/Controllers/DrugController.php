<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\User;
use Illuminate\Http\Request;

class DrugController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $designation = new Drug();
        $designation->trade_name=$request->trade_name;
        $designation->generic_name=$request->generic_name;
        $designation->save();
        return redirect('all-drugs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function show(Drug $drug)
    {
        $data['data'] = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];

        $list_drugs = Drug::all();
        return view('hr.all-drugs',['list_drugs'=>$list_drugs],$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function edit(Drug $drug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $edit_drugs = Drug::find($request->id);
        $edit_drugs->trade_name=$request->trade_name;
        $edit_drugs->generic_name=$request->generic_name;
        $edit_drugs->save();
        return redirect('all-drugs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        //
    }
}
