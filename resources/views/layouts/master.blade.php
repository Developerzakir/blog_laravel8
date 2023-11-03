
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{@yield('meta_description')}}">
    <meta name="keywords" content="{{@yield('meta_keywords')}}">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

     <!-- Summernote editor css link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    {{-- Datatables css --}}
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">


    <style>
        div.dataTables_wrapper div.dataTables_paginate .paginate_button{
            padding: 0px !important;
            margin: 0px !important;
        }

        .dataTables_wrapper .dataTables_length select{
            width: 50% !important;
        }
    </style>
    
</head>
<body>
    
@include('layouts.inc.admin-navbar')

<div id="layoutSidenav">
   @include('layouts.inc.admin-sidebar')

   <div id="layoutSidenav_content">
    <main>
        @yield('content')

    </main>
   @include('layouts.inc.admin-footer')
   </div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('admin/js/scripts.js')}}"></script>

    {{-- Summernote Editor js link --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    {{-- Data tables js --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    

    <script>
        $(document).ready(function() {
           
            $("#my_summernote").summernote({
                height: 250,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script>

        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        
    </script>

    @yield('scripts')
</body>
</html>
