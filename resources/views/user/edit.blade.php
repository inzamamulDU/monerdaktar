@extends('layouts.master')

@section('content')
    <div class="container">
        <section class="py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-title">
                            <div class="alert alert-primary" role="alert">

                                <b>Profile Info</b>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="from-row">
                                    <div class="form-group col-md-6 ">
                                        <span class="mr-5"><img class="rounded-circle" width="100" height="100" src="{{ asset('images/userphoto/'.$results->data->photo) }}"></span>
                                    </div>
                                    <p class="mt-3">   <b>{{ title_case( $results->data->role->name) }} </b></p>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="control-label">Name</label>


                                            <input id="name" type="text" class="form-control" name="name" value="{{ $results->data->name ? $results->data->name:old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif

                                    </div>
                                    {{--<input id="name" type="hidden" name="id" value="{{ $results->data->id  }}" >--}}

                                    <div class="form-group col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="control-label">E-Mail Address</label>


                                            <input id="email" type="email" class="form-control" name="email" value="{{  $results->data->email}}" disabled>

                                            @if ($errors->has('email'))

                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                        @endif

                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="control-label">Password</label>

                                            <input id="password" type="password" class="form-control" name="password" >

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password-confirm" class="control-label">Confirm Password</label>


                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >

                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="address" class="control-label">Address</label>

                                            <textarea class="form-control" rows="5" id="comment" name="address" >{{ ($results->data->patientInfo != null) ?$results->data->patientInfo->address :$results->data->doctorInfo->address }}</textarea>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="postcode" class="control-label">Post Code</label>
                                            <input id="postcode" type="text" class="form-control" name="postcode" value="{{ ($results->data->patientInfo != null) ?$results->data->patientInfo->postcode :$results->data->doctorInfo->postcode }}"  >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="city" class="control-label">City</label>

                                            <input id="city" type="text" class="form-control" name="city" value="{{ ($results->data->patientInfo != null) ?$results->data->patientInfo->city :$results->data->doctorInfo->city }}"  >

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="country" class="control-label">Country</label>
                                             <input id="country" type="text" class="form-control" name="country" value="{{ ($results->data->patientInfo != null) ?$results->data->patientInfo->country :$results->data->doctorInfo->country }}"  >
                                    </div>


                                    <div class="form-group col-md-6{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class="control-label">Phone</label>


                                            <input id="phone" type="text" class="form-control" name="phone" value="{{ $results->data->phone }}" disabled>

                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                     <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif

                                    </div>
                                </div>


                                @if($results->data->role->id == 2)
                                    <div class="form-row">

                                        <div  id="designation" class="form-group col-md-6">
                                            <label for="designation" class="control-label">Designation</label>


                                            <input id="designation" type="text" class="form-control" name="designation" value="{{ $results->data->doctorInfo->designation }}" >

                                        </div>

                                        <div id="institute" class="form-group col-md-6">
                                            <label for="institute" class="control-label">Institute</label>
                                            <input id="institute" type="text" class="form-control" name="institute" value="{{ $results->data->doctorInfo->designation }}" >

                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div  id="degree" class="form-group col-md-6">
                                            <label for="degree" class="control-label">Degree</label>


                                            <input id="degree" type="text" class="form-control" name="degree" value="{{ $results->data->doctorInfo->degree }}" >

                                        </div>

                                        <div id="available_time" class="form-group col-md-6">
                                            <label for="available_time" class="control-label">Available Time</label>
                                            <input id="available_time" type="text" class="form-control" name="available_time" value="{{ $results->data->doctorInfo->available_time }}" >

                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div id="biography" class="form-group col-md-12">
                                            <label for="biography" class="control-label">Biography</label>

                                            <textarea class="form-control" rows="5"  name="biography" >{{ $results->data->doctorInfo->biography }}</textarea>

                                        </div>
                                    </div>


                                @endif


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="photo" class="control-label">Photo</label>


                                        <input id="photo" type="file" class="form-control" name="photo" >



                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('javascript')
    <script>
        /*$("#doctor").change(function(){
            $("#job_title").removeClass("d-none");
            $("#orgnization").removeClass("d-none");


        });
        $("#patient").change(function(){
            $("#job_title").addClass("d-none");
            $("#orgnization").addClass("d-none");


        });*/

    </script>
@endsection