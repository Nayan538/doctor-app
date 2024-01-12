@extends('layout.app')
@section('content')
@section('title'){{'All Prescription'}} @endsection


<!--  BEGIN BREADCRUMBS  -->
<div class="secondary-nav">
    <div class="breadcrumbs-container" data-page-heading="Analytics">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>
            <div class="d-flex breadcrumb-content">
                <div class="page-header">

                    <div class="page-title">All Prescription</div>

                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="#">Patient</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Prescription</li>
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
                <div class="inner-page-title pt-1">All Prescription</div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-end">
                <a href="{{ route('createPrescriptionShow') }}" class="btn btn-primary me-1">
                    Create Prescription
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-8">
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Content</th>
                    <th class="no-content">Action</th>
                </tr>
                </thead>
                <tbody>
                @csrf
                @foreach ($prescriptin as $item)
                <tr>
                    <td>{{$item->patient->patient_name}}</td>
                    <td>{{date('d-m-Y', strtotime($item['created_at']))}}</td>
                    <td>{{$item['content']}}</td>
                    <td>
                        <a href={{ route('viewPrescription',$item['id'])}} class="bs-tooltip me-2 text-primary"
                            data-toggle="tooltip" data-placement="top" title="View Prescription">
                         <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('editPrescription', $item->id) }}" class="action-btn me-2 text-success"><i class="far fa-edit"></i></a>
                        <a href={{$item['id']}} onclick="return confirm('Are you sure?')" class="action-btn btn-view bs-tooltip me-2 text-danger"
                           data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>


<!-- CONTENT AREA -->
@section("page_script")

<script>

</script>
@endsection
@endsection
