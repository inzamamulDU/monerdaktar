@extends('layouts.master')

@section('content')
    <div class="container">
        <section class="py-3">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-title">
                            <div class="alert alert-primary" role="alert">
                                Register
                            </div>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">

                                    <div class="col-md-6 offset-md-3 radio" >


                                        <label><input id="patient" type="radio" name="role_id" value="3" checked  >Patient</label>

                                        <label><input id="doctor"  type="radio" name="role_id" value="2" >Doctor</label>
                                    </div>



                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Phone</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="photo" class="col-md-4 control-label">Photo</label>

                                    <div class="col-md-6">
                                        <input id="photo" type="file" class="form-control" name="photo" >


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-md-4 control-label">Address</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="5" id="comment" name="address" >{{ old('address') }}</textarea>


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="postcode" class="col-md-4 control-label">Post Code</label>

                                    <div class="col-md-6">
                                        <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode') }}"  >


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="city" class="col-md-4 control-label">City</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}"  >


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="country" class="col-md-4 control-label">Country</label>

                                    <div class="col-md-6">
                                        <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}"  >


                                    </div>
                                </div>


                                <div  id="job_title" class="form-group d-none">
                                    <label for="job_title" class="col-md-4 control-label">Job Tile</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="job_title" value="{{ old('job_title') }}"  >


                                    </div>
                                </div>

                                <div id="orgnization" class="form-group d-none">
                                    <label for="orgnization" class="col-md-4 control-label">Orgnization</label>

                                    <div class="col-md-6">
                                        <input  type="text" class="form-control" name="orgnization" value="{{ old('orgnization') }}"  >


                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
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