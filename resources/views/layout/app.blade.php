<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <title> @yield('title') </title>

    <link rel="icon" type="image/x-icon" href="{{asset('/src/assets/img/cork-logo.png')}}"/>
    <!-- ENABLE LOADERS -->
    <link href="{{asset('src/vertical-light-menu/css/light/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/vertical-light-menu/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('src/vertical-light-menu/loader.js')}}"></script>
    <!-- /ENABLE LOADERS -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/vertical-light-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/vertical-light-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!--    <link rel="stylesheet" href="plugins/src/font-icons/fontawesome/css/regular.css">-->
    <!--    <link rel="stylesheet" href="plugins/src/font-icons/fontawesome/css/fontawesome.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/src/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/css/light/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/css/dark/table/datatable/dt-global_style.css')}}">

    <link href="{{asset('src/plugins/src/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/plugins/src/noUiSlider/nouislider.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('src/assets/css/light/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/plugins/css/light/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('src/assets/css/light/elements/alert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/assets/css/dark/elements/alert.css')}}">
    <link href="{{asset('src/assets/css/light/components/modal.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/assets/css/light/apps/contacts.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/assets/css/light/apps/invoice-add.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/assets/css/dark/apps/invoice-add.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/assets/css/light/apps/invoice-preview.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/assets/css/dark/apps/invoice-preview.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/src/tomSelect/tom-select.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/css/light/tomSelect/custom-tomSelect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css')}}">

    <!--    Only for dashboard-->
    <link href="{{asset('src/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/assets/css/light/components/list-group.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/assets/css/light/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('src/assets/css/dark/components/list-group.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/assets/css/dark/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('src/assets/css/light/components/list-group.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/assets/css/light/users/user-profile.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('src/assets/css/dark/components/list-group.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/assets/css/dark/users/user-profile.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('src/assets/css/light/custom.css')}}" rel="stylesheet" type="text/css" />
    
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        body.dark .layout-px-spacing, .layout-px-spacing {
            min-height: calc(100vh - 155px) !important;
        }
    </style>

</head>
<body class="layout-boxed" page="starter-pack">
    @foreach($data as $LoggedUserInfo)
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    @include('include.header')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">
                @yield('content')
            </div>
        </div>
        @include('include.footer')

    </div>
    <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

     <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
     <script src="{{asset('src/plugins/src/global/vendors.min.js')}}"></script>
     <script src="{{asset('src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
     <script src="{{asset('src/vertical-light-menu/app.js')}}"></script>

     <script src="{{asset('src/plugins/src/table/datatable/datatables.js')}}"></script>
     <!--<script src="src/assets/js/scrollspyNav.js"></script>-->
     <script src="{{asset('src/plugins/src/flatpickr/flatpickr.js')}}"></script>

     <script src="{{asset('src/plugins/src/flatpickr/custom-flatpickr.js')}}"></script>
     <script src="{{asset('src/assets/js/apps/invoice-add.js')}}"></script>
     <script src="{{asset('src/plugins/src/tomSelect/tom-select.base.js')}}"></script>
     <script src="{{asset('src/plugins/src/tomSelect/custom-tom-select.js')}}"></script>

     <script src="{{asset('src/plugins/src/apex/apexcharts.min.js')}}"></script>
     <script src="{{asset('src/assets/js/dashboard/dash_2.js')}}"></script>
     <script src="{{asset('src/assets/js/apps/invoice-preview.js')}}"></script>

     <script src="{{asset('src/assets/js/custom.js')}}"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10
        });

        //Initialize Datepicker
        flatpickr($('.datepicker'));
        var f2 = flatpickr($('.dateTimePicker'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i:S",
        });
        var f3 = flatpickr($('.timePicker'), {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        document.querySelectorAll('.tom-select').forEach((el)=>{
            let settings = {};
            new TomSelect(el,settings);
        });

    </script>
    
    @yield('page_script')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @endforeach
</body>
</html>
