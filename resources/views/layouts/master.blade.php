
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MonerDaktar') }}</title>


    <link href="{{ secure_asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/jquery-confirm.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <link href="{{ secure_asset('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('css')


</head>

<body>

<!-- Page Content -->
@include('partials.header')


@yield('content')


@include('partials.footer')
<script src="{{ secure_asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ secure_asset('js/bootstrap.bundle.js') }}"></script>
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}

@yield('javascript')



</body>

</html>

<!-- /.container -->