@extends('layout.app')
@section('content')
@section('title'){{'Edit Prescription'}} @endsection


<!--  BEGIN BREADCRUMBS  -->
<div class="secondary-nav">
    <div class="breadcrumbs-container" data-page-heading="Analytics">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>
            <div class="d-flex breadcrumb-content">
                <div class="page-header">

                    <div class="page-title">Edit Prescription</div>

                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="#">Patient</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Prescription</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </header>
    </div>
</div>
<!--  END BREADCRUMBS  -->
<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 page-title-wrapper">
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search align-self-center">
                <div class="inner-page-title pt-1">Edit Prescription</div>
            </div>
        </div>
<form action="{{ route('updatePrescriptionStore', $edit_prescriptin->id)}}" method="POST">    
     @csrf
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="doc-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="invoice-actions-btn">
                    <div class="invoice-address-company">
                        <h4>Basic Information</h4>
                        <div class="invoice-address-company-fields">
                            <div class="form-group row mt-2">
                                <div class="col-md-4 col-sm-12">   
                                    <select name="patient_id" id="patient_id" class="form-select" required>
                                        <option value="" selected>Choose Patient *</option>
                                        @foreach($patient as $row)
                                        <option value="{{$row->id}}" @if($edit_prescriptin['patient_id'] == $row->id) selected @endif>{{$row->patient_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <input type="text" name="content" value="{{$edit_prescriptin['content']}}" class="form-control" placeholder="Patient Info">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="invoice-actions-btn">
                    <div class="invoice-action-btn">
                        <h4>Edit Medicine Items</h4>
                        @foreach($prescriptin_details as $row)
                        <div  id="duplicater">
                            <div class="row mb-4">
                                <div class="col-md-6 col-sm-8">
                                    <h6>Trade Name</h6>
                                    <select name="inputs[{{$row->id}}][drugs_id]" class="form-control " required>
                                        <option disabled="disabled" selected>Choose Trade Name *</option>
                                        @foreach($drugs as $drug)
                                        <option value="{{$drug->id}}" @if($row['drugs_id'] == $drug->id) selected @endif>{{$drug->trade_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <h6>Unit (Mg/Ml)</h6>
                                    <input type="text" name="inputs[{{$row->id}}][unit]"  value="{{$row['unit']}}" class="form-control" placeholder="Mg/Ml">
                                </div>
                            </div>   
                            <div>
                                <br/>
                             </div>
                            <div class="row mb-4">
                               
                                <div class="col-md-6 col-sm-8">
                                    <h6>Dose (Timetables)</h6>
                                    <input type="text" name="inputs[{{$row->id}}][dose]"  value="{{$row['dose']}}" class="form-control" placeholder="Dose">
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <h6>Duration (Days)</h6>
                                    <input type="text" name="inputs[{{$row->id}}][duration]"  value="{{$row['duration']}}" class="form-control" placeholder="Duration">
                                </div>
                            </div>
                            <hr>    
                            <div class="text-end mt-4">
                                <input type="button" id="rembtn" class="btn btn-danger mt-2 mb-2 btn-no-effect" value="Remove" onclick="removecurrentrow(this)">                               
                            </div>
                            @endforeach
                        </div>
                        </div>    
                            <div class="text-center">
                                <button type="button" class="btn btn-success mt-2 mb-2 btn-no-effect" id="button1" onclick="duplicate()">Add Medicine</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect">Update Prescription</button>
                    </div>
                </div>
            </div>
    </div>

</div>
</form>
</div>

@section("page_script")
<script>
//  $('.add-more-btn').click(function() {
//   var clone = $('.form-main').clone('.form-block');
//   $('.form-main').append(clone);
// });

// document.getElementById('button1').onclick = duplicate;
// 	var i = 0;
// 	var original = document.getElementById('duplicater');

//     function duplicate() {
//         var clone = original.cloneNode(true); 
//         clone.id = "duplicetor" + ++i; 
//         original.parentNode.appendChild(clone);
//     }
var tr = $(".invoice-action-btn");
    var i=0;
        $('#button1').click(function(){
            ++i;
            $('#duplicater').append(
                `<div>
                <div class="row mb-4">
                    <div class="col-md-6 col-sm-8">
                        <h6>Trade Name</h6>
                        <select name="inputs[`+i+`][drugs_id]" class="form-control " required>
                            <option disabled="disabled" selected>Choose Trade Name *</option>
                            @foreach($drugs as $drug)
                            <option value="{{$drug->id}}">{{$drug->trade_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-8">
                        <h6>Unit (Mg/Ml)</h6>
                        <input type="text" name="inputs[`+i+`][unit]" class="form-control" placeholder="Mg/Ml">
                    </div>
                    </div>   
                    <div>
                        <br/>
                     </div>
                    <div class="row mb-4">
                       
                        <div class="col-md-6 col-sm-8">
                            <h6>Dose (Timetables)</h6>
                            <input type="text" name="inputs[`+i+`][dose]" class="form-control" placeholder="Dose">
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <h6>Duration (Days)</h6>
                            <input type="text" name="inputs[`+i+`][duration]" class="form-control" placeholder="Duration">
                        </div>
                    </div>
                    <div class="text-end mt-4">
                        <input type="button" id="rembtn" class="btn btn-danger mt-2 mb-2 btn-no-effect" value="Remove" onclick="removecurrentrow(this)">                               
                    </div>
                    </div>
                    `);
});

    function removecurrentrow(e) {
         e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
    } 
</script>
<!-- CONTENT AREA -->
@endsection
@endsection
