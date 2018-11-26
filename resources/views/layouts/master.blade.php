
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


    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-confirm.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('css')


</head>

<body>

<!-- Page Content -->
@include('partials.header')


@yield('content')


@include('partials.footer')
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}

<script>
    function setFooterPosition(){
        var marginTop = $(window).height() - $("body").outerHeight();
        console.log($("body").outerHeight());
        console.log(marginTop);
        console.log($(window).height());
        if(marginTop > 0){
            //console.log(marginTop);
            $('footer').css('margin-top', marginTop);
        }
    }
</script>
@yield('javascript')

{{--
<script>
    $(document).ready(function(){
        var marginTop = $(window).height() - $("body").outerHeight();
        if(marginTop > 0){
            console.log(marginTop);
            $('footer').css('margin-top', marginTop+17);
        }
    });
</script>
--}}



</body>

</html>

<!-- /.container -->