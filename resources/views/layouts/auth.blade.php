<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
{{--    <title>Sign in - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>--}}
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS files -->
    <link href="{{asset('tabler/dist/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-flags.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-payments.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/demo.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/custom-style.css')}}" rel="stylesheet"/>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
<div class="page page-center">

        @yield('content')
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="{{asset('tabler/dist/js/tabler.min.js')}}"></script>
</body>
</html>
