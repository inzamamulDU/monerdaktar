@extends('layouts.master')

@section('content')
    <div class="container">
        <section class="py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-title alert alert-primary">

                                <h5>
                                    <span>Appoinment</span>
                                    <button class="btn btn-primary btn-sm float-md-right" type="button" data-toggle="collapse" data-target="#appoinment_create" aria-expanded="false" aria-controls="appoinment_create">
                                        <i class="material-icons">
                                            border_color
                                        </i> Create
                                    </button>

                                </h5>

                        </div>


                            <div class="collapse" id="appoinment_create">
                                <div class="card-body">

                                    <form class="form-horizontal" method="POST" action="{{ route('appoinment.store') }}">
                                    {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="form-group col-md-6{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label for="title" class="control-label">Appointment title</label>
                                                <input id="title" type="title" class="form-control" name="title" value="{{ old('title') }}" autofocus>
                                                @if ($errors->has('title'))
                                                    <small class="form-text text-danger">{{ $errors->first('title') }}</small>
                                                @endif

                                            </div>
                                        </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6{{ $errors->has('host_id') ? ' has-error' : '' }}">
                                            <label for="host_id" class="">Doctors</label>
                                            <select name="host_id" class="form-control" id="doctors-dropdown">
                                                <option value="">--Choose one--</option>
                                                @if($results)
                                                    @foreach($results->data as $key=>$value)
                                                    <option value="{{ $value->id }}" >{{ $value->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                                @if($errors->has('host_id'))
                                                    <small class="form-text text-danger">{{ $errors->first('host_id') }}</small>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6 {{ $errors->has('appointment_date') ? ' has-error' : '' }}">
                                            <label for="appointment_date" class="">Select date and time</label>
                                            <input id="appointment_date" type="text" class="form-control" name="appointment_date">

                                            @if ($errors->has('appointment_date'))
                                                <small class="form-text text-danger">{{ $errors->first('appointment_date') }}</small>
                                            @endif

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Create
                                            </button>

                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </section>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $('#appointment_date').datetimepicker();
    </script>
@endsection

@section('css')

@endsection