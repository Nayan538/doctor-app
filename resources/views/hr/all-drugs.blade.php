@extends('layout.app')
@section('content')
@section('title'){{'All Drugs'}} @endsection


<!--  BEGIN BREADCRUMBS  -->
<div class="secondary-nav">
    <div class="breadcrumbs-container" data-page-heading="Analytics">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>
            <div class="d-flex breadcrumb-content">
                <div class="page-header">
                    <div class="page-title">Drugs</div>

                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="#">Patient</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Drugs</li>
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
                <div class="inner-page-title pt-1">Drugs</div>
            </div>

            <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-end">
                <button class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#createModal">
                    All Drugs
                </button>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-8 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-8">
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>Trade Name</th>
                    <th>Generic Name</th>
                    <th class="no-content">Action</th>
                </tr>
                </thead>
                <tbody>
                @csrf
                @foreach ($list_drugs as $item)
                <tr>
                    <td>{{$item['trade_name']}}</td>
                    <td>{{$item['generic_name']}}</td>
                    <td>
                        <a href={{$item->id}} class="action-btn btn-edit bs-tooltip me-2 text-success"
                            data-trade_name="{{ $item->trade_name }}"
                            data-generic_name="{{ $item->generic_name }}"
                            data-action="{{ route('updateDrugsStore', $item->id ) }}"
                            data-toggle="tooltip" data-placement="top" title="Edit"
                            data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href={{"edit_department/".$item['id']}} onclick="return confirm('Are you sure?')" class="action-btn btn-view bs-tooltip me-2 text-danger"
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

<!-- Create Modal -->
<div class="modal fade inputForm-modal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header" id="createModalLabel">
                <h5 class="modal-title">Add Drugs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            </div>
            <form action="#" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <input type="text" name="trade_name" class="form-control" placeholder="Trade Name *" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <input type="text" name="generic_name" class="form-control" placeholder="Generic Name *" required>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect">Save Drugs</button>
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
                <h5 class="modal-title">Edit Drugs Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            </div>
            <form action=" " method="post" id="editFrom">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <input name="trade_name" id="trade_name" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <input name="generic_name" id="generic_name" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect">Update Drugs Info</button>
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

        $('#trade_name').val($(this).data('trade_name'));
        $('#generic_name').val($(this).data('generic_name'));
        $("#editFrom").attr("action", $(this).data('action'));
    
    });

    
    });
</script>
@endsection
@endsection
