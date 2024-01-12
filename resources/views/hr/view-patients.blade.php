@extends('layout.app')
@section('content')
@section('title'){{'View Patients'}} @endsection

<!--  BEGIN BREADCRUMBS  -->
<div class="secondary-nav">
    <div class="breadcrumbs-container" data-page-heading="Analytics">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>
            <div class="d-flex breadcrumb-content">
                <div class="page-header">

                    <div class="page-title">View Patient Info</div>

                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="#">Patient</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Patient</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </header>
    </div>
</div>
<!--  END BREADCRUMBS  -->

<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <div class="doc-container">

            <div class="row">

                <div class="col-xl-9">

                    <div class="invoice-container">
                        <div class="invoice-inbox">

                            <div id="ct" class="">

                                <div class="invoice-00001">
                                    <div class="content-section">

                                        <div class="inv--head-section inv--detail-section">
                                            <div class="row">
                                                <div class="col-sm-12 col-12" style="text-align: center"> 
                                                    <h3 class="in-heading align-self-center">{{$patient['patient_name']}}</h3>
                                                    <p class="inv-due-date"><span class="inv-title">Age : {{$patient['age']}}</span></p>
                                                    <p class="inv-due-date"><span class="inv-title">{{$patient['address']}}</span></p>
                                                    <p class="inv-due-date"><span class="inv-title">0{{$patient['mobile_number']}}</span></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="inv--product-table-section">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="">
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Content</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $n = 1;
                                                    @endphp
                                                    @foreach ($prescriptin as $item)
                                                        <td>{{$n++}}</td>
                                                        <td >{{$item['content']}}</td>
                                                        <td >{{$item['created_at']}}</td> 
                                                        <td> 
                                                        <a href={{ route('viewPrescription',$item['id'])}} class="bs-tooltip me-2 text-primary"
                                                            data-toggle="tooltip" data-placement="top" title="View Prescription">
                                                         <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="inv--total-amounts">
                                        </div>
                                        <div class="inv--note">
                                            <div class="row mt-4">
                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                    <p>Note: Thank you for doing Business with us.</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>

                <div class="col-xl-3">

                    <div class="invoice-actions-btn">

                        <div class="invoice-action-btn">

                            <div class="row">
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Print</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="/src/example.pdf" download="" class="btn btn-success btn-download">Download</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="purchase-order-edit.php" class="btn btn-dark btn-edit">Edit</a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<!-- CONTENT AREA -->

@endsection
