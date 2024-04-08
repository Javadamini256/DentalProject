    <head>

        <meta charset="utf-8">
        <title>نرم افزار مدیریت کلینیک دندانپزشکی</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="یک قالب مدیریتی با امکانات فراوان برای ساخت سی آر ام، سیستم مدیریت محتوا و ..." name="description">
        <meta content="قائم امیدی" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">



        <!-- App css -->
        <link href="{{ asset('admin-asset/dist/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin-asset/dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin-asset/dist/assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin-asset/dist/assets/css/custom.css') }}" rel="stylesheet" type="text/css">
        <!-- Responsive Table css -->
        <link href="{{ asset('admin-asset/dist/assets/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
        <link href="{{ asset('admin-asset/dist/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-asset/dist/assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- third party css -->
        {{-- <link href="{{ asset('admin-asset/dist/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-asset/dist/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-asset/dist/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-asset/dist/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" /> --}}
        <!-- third party css end -->

        <link rel="stylesheet" href="{{ asset('admin-asset/persianDate/css/persianDatepicker-dark.css') }}" />
        {{-- <link href='{{ asset('admin-asset/persianDate/css/normalize.css') }}' rel='stylesheet' />
        <link href='{{ asset('admin-asset/persianDate/css/fontawesome/css/font-awesome.min.css') }}' rel='stylesheet' />
        <link href="{{ asset('admin-asset/persianDate/css/vertical-responsive-menu.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin-asset/persianDate/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin-asset/persianDate/css/prism.css') }}" rel="stylesheet" /> --}}
        {{-- <link rel="stylesheet" href="{{ asset('admin-asset/persianDate/css/persianDatepicker-default.css') }}" /> --}}
        {{-- <link rel="stylesheet" href="{{ asset('admin-asset/persianDate/css/persianDatepicker-latoja.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin-asset/persianDate/css/persianDatepicker-melon.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin-asset/persianDate/css/persianDatepicker-lightorang.css') }}" /> --}}
        {{-- <script src="{{ asset('admin-asset/persianDate/js/prism.js') }}"></script>
        <script src="{{ asset('admin-asset/persianDate/js/vertical-responsive-menu.min.js') }}"></script> --}}

        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="{{ asset('admin-asset/dist/assets/images/favicon.ico') }}" /> --}}


        {{-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" /> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-asset/dist/assets/datatables/css/datatables.min.css') }}" />

        {{-- Table icon css  --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">


        {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css"> --}}
        <style>
            div.dataTables_wrapper {
                direction: rtl;
                width: 100%;
            }

            th,
            td {
                white-space: nowrap;
            }
        </style>
        @routes

    </head>
