<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- datatables local -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <script src="{{ asset('DataTables/datatables.js') }}" defer></script>
   <!-- Select2 -->
   <link href="{{ asset('select2/select2.min.css') }}" rel="stylesheet">
   <script src="{{ asset('select2/select2.full.min.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.28/dist/sweetalert2.all.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.28/dist/sweetalert2.min.css"> -->
</head>
<body>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    
    <div id="app">
        @include('inc.navbar')
        
        <main class="container-fluid">
            <div class="col-md-8 offset-md-2">
                @include('inc.messages')
                @include('sweet::alert')
                @yield('content')
            </div>
        </main>
    </div>
    <!-- DataTables -->
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
</body>
@yield('myscripts')

</html>

