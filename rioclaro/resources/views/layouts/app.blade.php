<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'Río Claro')
    </title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <style>

        body{
            background:#f5f5f5;
        }

        .sidebar{

            min-height:100vh;
            background:white;
            border-right:1px solid #ddd;
            padding-top:20px;
        }

        .sidebar .nav-link{
            color:#444;
            display:flex;
            align-items:center;
        }

        .sidebar .nav-link:hover{
            background:#f0f0f0;
        }

        .material-icons{
            font-size:20px;
        }

        .card-dashboard{
            border:none;
            border-radius:16px;
            box-shadow:0 2px 8px rgba(0,0,0,.08);
        }

        .counter{
            font-size:2rem;
            font-weight:bold;
        }

    </style>

    @stack('styles')

</head>

<body>

@include('layouts.navbar')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-2 p-0">

            @include('layouts.sidebar')

        </div>

        <div class="col-md-10">

            <div class="p-4">

                @yield('content')

            </div>

        </div>

    </div>

</div>

@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>

</html>