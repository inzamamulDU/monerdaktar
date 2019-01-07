@extends('layouts.master')

@section('content')
    @include('partials.slider')
    <div class="container">
        @if (Session::has('fail'))
            <div class="alert alert-warning">
                {{ Session::get('message') }}
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        @include('partials.homebody')
    </div>

@endsection

@if(Auth::id() > 0)
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
    <script>
        $(function () {
            var usrId = "{{Auth::id()}}";
            var socket = io.connect('http://104.248.155.229:5000?token='+usrId);

        });
    </script>
@endsection
@endif
