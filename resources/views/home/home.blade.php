@extends('layouts.master')

@section('content')
    @include('partials.slider')
    <div>
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
