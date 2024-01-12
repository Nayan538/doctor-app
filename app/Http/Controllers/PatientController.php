<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Drug;
use App\Models\User;
use App\Models\Prescription_detail;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
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
    public function staffShow()
    {
        $data['data'] = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];

        $list_staff_profile = Patient::all();
            return view('hr.staff-profiles',[
                'list_staff_profile'=>$list_staff_profile
            ],$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff_profile = new Patient();
        $staff_profile->patient_name=$request->patient_name;
        $staff_profile->age=$request->age;
        $staff_profile->sex=$request->sex;
        $staff_profile->marital_status=$request->marital_status;
        $staff_profile->blood_group=$request->blood_group;
        $staff_profile->mobile_number=$request->mobile_number;
        $staff_profile->address=$request->address;
        $staff_profile->details=$request->details;
        $staff_profile->save();
        return redirect('staff-profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    function update(Request $request)
    {
        $edit_staff_profile = Patient::find($request->id);
        $edit_staff_profile->patient_name=$request->patient_name;
        $edit_staff_profile->age=$request->age;
        $edit_staff_profile->sex=$request->sex;
        $edit_staff_profile->marital_status=$request->marital_status;
        $edit_staff_profile->blood_group=$request->blood_group;
        $edit_staff_profile->mobile_number=$request->mobile_number;
        $edit_staff_profile->address=$request->address;
        $edit_staff_profile->details=$request->details;
        $edit_staff_profile->save();
        
        return redirect('staff-profiles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
    public function viewPatientHistory($id)
    {
        $data['data'] = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];

        $patient = Patient::find($id);
        $prescriptin = Prescription::where('patient_id', '=', $id)->get();
        return view('hr.view-patients',[
            'prescriptin'=>$prescriptin,
            'patient'=>$patient
        ],$data);
    }
}
