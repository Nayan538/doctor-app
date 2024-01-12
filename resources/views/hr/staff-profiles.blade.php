@extends('layout.app')
@section('content')
@section('title'){{'Staff Profiles'}} @endsection

<!--  BEGIN BREADCRUMBS  -->
<div class="secondary-nav">
    <div class="breadcrumbs-container" data-page-heading="Analytics">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>
            <div class="d-flex breadcrumb-content">
                <div class="page-header">

                    <div class="page-title">Patient  Profiles</div>

                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="#">Patient </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profiles</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </header>
    </div>
</div>
<!--  END BREADCRUMBS  -->

<!-- CONTENT AREA -->
<div class="row layout-top-spacing">


    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 page-title-wrapper">
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search align-self-center">
                <div class="inner-page-title pt-1">Patient Profiles</div>
            </div>

            <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-end">
                <button class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#createModal">
                    Create Profile
                </button>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-8">
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Sex</th>
                    <th>Marital Status</th>
                    <th>Blood Group</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @csrf
                    @foreach ($list_staff_profile as $item)
                <tr>
                    <td>{{$item['patient_name']}}</td>
                    <td>{{$item['address']}}</td>
                    <td>{{$item['mobile_number']}}</td>
                    <td>{{$item['sex']}}</td>
                    <td>{{$item['marital_status']}}</td>
                    <td>{{$item['blood_group']}}</td>
                    <td class="text-center">
                        <div class="action-btns">
                            <a href={{ route('viewPatientHistory',$item['id'])}} class="bs-tooltip me-2 text-primary"
                                data-toggle="tooltip" data-placement="top" title="View Patient">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href={{$item->id}} class="action-btn btn-edit bs-tooltip me-2 text-success"
                                data-patient_name="{{ $item->patient_name }}"
                                data-address="{{ $item->address }}"
                                data-mobile_number="{{ $item->mobile_number }}"
                                data-age="{{ $item->age }}"
                                data-sex="{{ $item->sex}}"
                                data-marital_status="{{ $item->marital_status }}"
                                data-blood_group="{{ $item->blood_group }}"
                                data-details="{{ $item->details }}"
                               data-action="{{ route('updateStaffProfile', $item->id ) }}"
                               data-toggle="tooltip" data-placement="top" title="Edit"
                               data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href={{$item['id']}} onclick="return confirm('Are you sure?')" class="action-btn btn-view bs-tooltip me-2 text-danger"
                               data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Create Modal -->
<div class="modal fade inputForm-modal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header" id="createModalLabel">
                <h5 class="modal-title">Create Staff Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            </div>
            <form action="#" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <input type="text" name="patient_name" class="form-control" placeholder="Patient Name *" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <textarea type="text" name="address" class="form-control" placeholder="Home Address *" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 col-sm-12">
                            <input type="number" name="mobile_number" class="form-control" placeholder="Contact No *" required>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <input type="number" name="age" class="form-control" placeholder="Age *" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 col-sm-12">
                            <select name="sex" class="form-select" required>
                                <option>Select One </option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <select name="marital_status" class="form-select" required>
                                <option>Select One </option>
                                <option>Married</option>
                                <option>Unmarried</option>
                                <option>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 col-sm-12">
                            <select name="blood_group" class="form-select" required>
                                <option>Choose Blood Group</option>
                                <option>A+ </option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>O+</option>
                                <option>O-</option>
                            </select>                 
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <textarea name="details" class="form-control"></textarea>                       
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect">Save Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade inputForm-modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header" id="editModalLabel">
                <h5 class="modal-title">Edit Staff Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            </div>
            <form action="" method="post" id="editFrom">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <input type="text" name="patient_name" id="patient_name" class="form-control" placeholder="Patient Name *" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <textarea type="text" name="address" id="address" class="form-control" placeholder="Home Address *" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 col-sm-12">
                            <input type="number" name="mobile_number" id="mobile_number" class="form-control" placeholder="Contact No *" required>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <input type="number" name="age" id="age"  class="form-control" placeholder="Age *" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 col-sm-12">
                            <select name="sex" id="sex" class="form-select" required>
                                <option>Select One </option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <select name="marital_status" id="marital_status" class="form-select" required>
                                <option>Select One </option>
                                <option>Married</option>
                                <option>Unmarried</option>
                                <option>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 col-sm-12">
                            <select name="blood_group" id="blood_group"class="form-select" required>
                                <option>Choose Blood Group</option>
                                <option>A+ </option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>O+</option>
                                <option>O-</option>
                            </select>                 
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <textarea name="details" id="details" class="form-control"></textarea>                       
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- CONTENT AREA -->
@section("page_script")

<script>
$(document).ready(function(e) {

    $(document).on('click','.btn-edit', function(){

        $('#patient_name').val($(this).data('patient_name'));
        $('#address').val($(this).data('address'));
        $('#mobile_number').val($(this).data('mobile_number'));
        $('#sex').val($(this).data('sex'));
        $('#age').val($(this).data('age'));
        $('#marital_status').val($(this).data('marital_status'));
        $('#blood_group').val($(this).data('blood_group'));
        $('#details').val($(this).data('details'));
        $("#editFrom").attr("action", $(this).data('action'));
    
    });

    
    });
</script>
@endsection
@endsection
