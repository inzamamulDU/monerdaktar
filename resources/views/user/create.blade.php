@extends('layouts.master')

@section('content')
    <div class="container">
        <section class="py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-title">
                            <div class="alert alert-primary" role="alert">

                                <b>Register</b>
                            </div>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="from-row">
                                    <div class="form-group col-md-6 ">
                                        <label><input id="patient" type="radio" name="role_id" value="3" checked  >Patient</label>

                                        <label><input id="doctor"  type="radio" name="role_id" value="2" >Doctor</label>
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="control-label">Name</label>


                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                        @endif

                                    </div>
                                    {{--<input id="name" type="hidden" name="id" value="{{ $results->data->id  }}" >--}}

                                    <div class="form-group col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="control-label">E-Mail Address</label>


                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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

                                        <input id="password" type="password" class="form-control" name="password"  required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                        @endif

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password-confirm" class="control-label">Confirm Password</label>


                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="address" class="control-label">Address</label>

                                        <textarea class="form-control" rows="5" id="comment" name="address" >{{ old('address') }}</textarea>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="postcode" class="control-label">Post Code</label>
                                        <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode') }}"  >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="city" class="control-label">City</label>

                                        <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}"  >

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="country" class="control-label">Country</label>
                                        <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}"  >
                                    </div>


                                    <div class="form-group col-md-6{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class="control-label">Phone</label>


                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                     <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                        @endif

                                    </div>
                                </div>



                                <div class="form-row">

                                    <div  id="job_title" class="form-group col-md-6 d-none">
                                        <label for="job_title" class="control-label">Job Tile</label>


                                        <input id="job_title" type="text" class="form-control" name="job_title" value="{{ old('job_title') }}" >

                                    </div>

                                    <div id="orgnization" class="form-group col-md-6 d-none">
                                        <label for="orgnization" class="control-label">Orgnization</label>
                                        <input id="job_title" type="text" class="form-control" name="orgnization" value="{{ old('orgnization') }}" >

                                    </div>
                                </div>



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
        $("#doctor").change(function(){
            $("#job_title").removeClass("d-none");
            $("#orgnization").removeClass("d-none");


        });
        $("#patient").change(function(){
            $("#job_title").addClass("d-none");
            $("#orgnization").addClass("d-none");


        });

    </script>
@endsection