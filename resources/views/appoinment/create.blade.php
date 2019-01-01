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
                                        <div class="from-row">
                                            <div class="form-group col-md-6 ">
                                                <label><input  type="radio" name="type" value="consultation" checked  >Consultation</label>

                                                <label><input type="radio" name="type" value="psychotherapy" >Psychotherapy</label>
                                            </div>

                                        </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6{{ $errors->has('host_id') ? ' has-error' : '' }}">
                                            <label for="doctor_id" class="">Doctors</label>
                                            <select name="doctor_id" class="form-control" id="doctors-dropdown">
                                                <option value="">--Choose one--</option>
                                                @if($results)
                                                    @foreach($results->data as $key=>$value)
                                                    <option value="{{ $value->user->id }}" >{{ $value->user->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                                @if($errors->has('doctor_id'))
                                                    <small class="form-text text-danger">{{ $errors->first('host_id') }}</small>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3 {{ $errors->has('start_time') ? ' has-error' : '' }}">
                                            <label for="start_time" class="">Select Start date and time</label>
                                            <input id="start_time" type="text" class="form-control" name="start_time">

                                            @if ($errors->has('start_time'))
                                                <small class="form-text text-danger">{{ $errors->first('start_time') }}</small>
                                            @endif

                                        </div>

                                        <div class="form-group col-md-3 {{ $errors->has('end_time') ? ' has-error' : '' }}">
                                            <label for="end_time" class="">Select End date and time</label>
                                            <input id="end_time" type="text" class="form-control" name="end_time">

                                            @if ($errors->has('end_time'))
                                                <small class="form-text text-danger">{{ $errors->first('end_time') }}</small>
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


        <div class="data-show">
            @if($html_data)
                {!! $html_data !!}
            @endif
        </div>


    </div>


@endsection

@section('javascript')
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $('#start_time').datetimepicker();
        $('#end_time').datetimepicker();
    </script>


    <script type="text/javascript">


        $(document).ready(function(){

            setFooterPosition();

        });






        function populateAppointmentList(request){

            if(request=="") return;

            var base_url = '<?php echo env('API_URL')  ?>';

            var api_URL = base_url+'appoinment/get-appointments';

            var request_data = '{\"url\" :\"'+request+'\"}';


            var json = JSON.parse(request_data);
            console.log(json);





            $.ajax({
                headers: {
                    'Accept':'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type':'application/json' },
                method: "POST",
                url: api_URL,
                data: request_data,
                dataType : 'text',
                success: function(result){
                    console.log("success");
                    $('.data-show').html(result);




                },
                error: function( jqXhr, textStatus, errorThrown ) {

                    console.log(jqXhr, textStatus.toString(), errorThrown.toString());
                }
            });




        }

    </script>

@endsection

@section('css')

@endsection