<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assects/bootstrap-4.6.2-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assects/css/style.css')}}"> 
    <link rel="stylesheet" href="{{asset('assects/DataTables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assects/sweetalert2/sweetalert2.min.css')}}">
     <meta name="csrf-token" content="{{csrf_token()}}">  
    <title>Internship Task</title>
</head>
<body>
    @include('includes.header')
    <div class="container inside-body">
        @yield('content')
    </div>
    @include('includes.footer')

    <script src="{{asset('assects/jquery/jquery-3.6.1.min.js')}}"></script>
    <script src="{{asset('assects/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assects/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('assects/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assects/jquery/jquery.validate.min.js')}}"></script>

    <script>
        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
    </script>

    @yield('jquerycode')
</body>
</html>