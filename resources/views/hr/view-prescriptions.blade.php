@extends('layout.app')
@section('content')
@section('title'){{'View Prescription'}} @endsection

<!--  BEGIN BREADCRUMBS  -->
<div class="secondary-nav">
    <div class="breadcrumbs-container" data-page-heading="Analytics">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>
            <div class="d-flex breadcrumb-content">
                <div class="page-header">

                    <div class="page-title">Prescription</div>

                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="#">Patient</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Prescription</li>
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

                                                <div class="col-sm-6 col-12 mr-auto">
                                                    <div class="d-flex">
                                                        <img class="company-logo" src="/src/assets/img/mm-associates-logo.png" alt="company">
                                                        <h3 class="in-heading align-self-center">Square Hospitals Ltd</h3>
                                                    </div>
                                                    <p class="inv-street-addr mt-3">Md.Shabuddin</p>
                                                    <p class="inv-email-address">nayan273@gmail.com</p>
                                                    <p class="inv-email-address">01952343273</p>
                                                </div>

                                                <div class="col-sm-6 text-sm-end">
                                                    <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span class="inv-title">Date :</span> <span class="inv-number">{{date('d-m-Y', strtotime($prescriptin->created_at))}}</span></p>
                                                    <p class="inv-created-date mt-sm-5 mt-3"><span class="inv-title">Patient Name :  </span> <span class="inv-date">{{$prescriptin->patient->patient_name}}</span></p>
                                                    <p class="inv-due-date"><span class="inv-title">Age : {{$prescriptin->patient->age}}</span></p>
                                                    <p class="inv-due-date"><span class="inv-title">Number : 0{{$prescriptin->patient->mobile_number}}</span></p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="inv--product-table-section">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="">
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Trade Name</th>
                                                        <th>Unit(Mg/Ml)</th>
                                                        <th>Dose(Time)</th>
                                                        <th>Duration(Days)</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $n = 1;
                                                    @endphp
                                                    @foreach ($prescription_detail as $item)
                                                        <td>{{$n++}}</td>
                                                        <td>{{$item->drugs->trade_name}}</td>
                                                        <td >{{$item['unit']}}</td>
                                                        <td >{{$item['dose']}}</td>
                                                        <td>{{$item['duration']}}</td>
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
