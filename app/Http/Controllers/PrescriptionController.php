<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Drug;
use App\Models\User;
use App\Models\Prescription_detail;
use App\Models\Patient;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
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
    public function createShow(Prescription $prescriptin)
    {
        $data['data'] = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];

        $patient = Patient::All();
        $prescriptin = Prescription::All();
        $drugs = Drug::all();
        return view('hr.create-prescriptions',[
            'prescriptin'=>$prescriptin,
            'patient'=>$patient,
            'drugs'=>$drugs
        ],$data);
    }
    public function store(Request $request)
    {
        //    echo"<pre>"; print_r($request->all());echo"<pre>";
        //  die;
        $prescription = new Prescription();
        $prescription->patient_id=$request->patient_id;
        $prescription->content=$request->content;
        $prescription->save();

     foreach($request->inputs as $key=>$value ) {
        $prescriptionDetail = new Prescription_detail();
        $prescriptionDetail->prescrition_id=$prescription->id;
        $prescriptionDetail->drugs_id=$value['drugs_id'];
        $prescriptionDetail->unit=$value['unit'];
        $prescriptionDetail->dose=$value['dose'];
        $prescriptionDetail->duration=$value['duration'];
        $prescriptionDetail->save();
      }
        return redirect('create-prescriptions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescriptin  $prescriptin
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescriptin)
    {
        $data['data'] = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];

        $patient = Patient::All();
        $prescriptin = Prescription::All();
        $drugs = Drug::all();
        return view('hr.prescriptions',[
            'prescriptin'=>$prescriptin,
            'patient'=>$patient,
            'drugs'=>$drugs
            
        ],$data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescriptin  $prescriptin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];

        $edit_prescriptin = Prescription::find($id);
        $prescriptin_details = Prescription_detail::where('prescrition_id',$id)->get();

        $patient = Patient::All();
        $drugs = Drug::all();
    
        return view('hr.edit-prescriptions',[
            'edit_prescriptin'=>$edit_prescriptin,
            'patient'=>$patient,
            'drugs'=>$drugs,
            'prescriptin_details'=>$prescriptin_details
        ],$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescriptin  $prescriptin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $prescription = Prescription:: find($request->id);
        $prescription->patient_id=$request->patient_id;
        $prescription->content=$request->content;
        $prescription->save();

     foreach($request->inputs as $key=>$value ) {
        $prescriptionDetail = Prescription_detail::find($key);
        $prescriptionDetail->drugs_id=$value['drugs_id'];
        $prescriptionDetail->unit=$value['unit'];
        $prescriptionDetail->dose=$value['dose'];
        $prescriptionDetail->duration=$value['duration'];
        $prescriptionDetail->save();

        // $newPrescriptionDetail = new Prescription_detail();
        // $newPrescriptionDetail->prescrition_id=$prescription->id;
        // $newPrescriptionDetail->drugs_id=$value['drugs_id'];
        // $newPrescriptionDetail->unit=$value['unit'];
        // $newPrescriptionDetail->dose=$value['dose'];
        // $newPrescriptionDetail->duration=$value['duration'];
        // $newPrescriptionDetail->save();
        
      }
        return redirect('all-prescriptions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescriptin  $prescriptin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescriptin)
    {
        //
    }
    public function viewPrescription($id)
    {
        $data['data'] = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];

        $prescriptin = Prescription::find($id);
        $patient = Patient::All();
        $prescription_detail = Prescription_detail::where('prescrition_id', '=', $id)->get();
        $drugs = Drug::all();
        return view('hr.view-prescriptions',[
            'prescriptin'=>$prescriptin,
            'patient'=>$patient,
            'drugs'=>$drugs,
            'prescription_detail'=>$prescription_detail
        ],$data);
    }
}
