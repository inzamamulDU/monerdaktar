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
                                                    <option value="{{ $value->user->id }}" >{{ $value->user->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                                @if($errors->has('host_id'))
                                                    <small class="form-text text-danger">{{ $errors->first('host_id') }}</small>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3 {{ $errors->has('start_date') ? ' has-error' : '' }}">
                                            <label for="start_date" class="">Select Start date and time</label>
                                            <input id="start_date" type="text" class="form-control" name="start_date">

                                            @if ($errors->has('start_date'))
                                                <small class="form-text text-danger">{{ $errors->first('start_date') }}</small>
                                            @endif

                                        </div>

                                        <div class="form-group col-md-3 {{ $errors->has('end_date') ? ' has-error' : '' }}">
                                            <label for="end_date" class="">Select End date and time</label>
                                            <input id="end_date" type="text" class="form-control" name="end_date">

                                            @if ($errors->has('end_date'))
                                                <small class="form-text text-danger">{{ $errors->first('end_date') }}</small>
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

        @if($appointmentList)
        <section class="py-1">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th scope="col">Meeting Title</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Patient</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointmentList->data as $key=>$appointment)
                            <tr>

                                <td>{{$appointment->title}}</td>
                                <td>{{$appointment->doctor->name}}</td>
                                <td>{{$appointment->patient->name}}</td>
                                <td>{{$appointment->start_time}}</td>
                                <td>{{$appointment->end_time}}</td>
                                <td><a href="{{route('appoinment.ongoing',['id'=>$appointment->id])}}" class="btn btn-sm btn-info disabled" >Start</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endif

    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $('#start_date').datetimepicker();
        $('#end_date').datetimepicker();
    </script>
@endsection

@section('css')

@endsection