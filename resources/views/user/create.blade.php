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
                            <form class="form-horizontal" method="POST" action="{{ route('webuser.store') }}" enctype="multipart/form-data">
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

                                        <textarea class="form-control" rows="5" id="address" name="address" >{{ old('address') }}</textarea>

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
                                            <span class="text-danger">
                                                     <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                        @endif

                                    </div>
                                </div>



                                <div class="form-row">

                                    <div  id="designation" class="form-group col-md-6 d-none">
                                        <label for="designation" class="control-label">Designation</label>


                                        <input id="designation" type="text" class="form-control" name="designation" value="{{ old('designation') }}" >

                                    </div>

                                    <div id="institute" class="form-group col-md-6 d-none">
                                        <label for="institute" class="control-label">Institute</label>
                                        <input id="institute" type="text" class="form-control" name="institute" value="{{ old('institute') }}" >

                                    </div>
                                </div>

                                <div class="form-row">

                                    <div  id="degree" class="form-group col-md-6 d-none">
                                        <label for="degree" class="control-label">Degree</label>


                                        <input id="degree" type="text" class="form-control" name="degree" value="{{ old('degree') }}" >

                                    </div>

                                    <div id="doc_info_category" class="form-group col-md-6 checkbox d-none">
                                        <label><input type="checkbox" name="is_consultant" value="1">Consultant</label>
                                        <label><input type="checkbox" name="is_psychotherapist" value="1">Psychotherapist</label>

                                    </div>

                                </div>




                                <div class="form-row d-none" id="available_time">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Availabilities:</legend>
                                        <div id="dynamic_field">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="sname" class="checkout-req-lebel">Day</label>

                                                <select name="day[1]" id="day" class="form-control">
                                                    <option value="">---</option>
                                                    <option value="sat">Sat</option>
                                                    <option value="sun">Sun</option>
                                                    <option value="mon">Mon</option>
                                                    <option value="tue">Tue</option>
                                                    <option value="wed">Wed</option>
                                                    <option value="thu">Thu</option>
                                                    <option value="fri">Fri</option>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="start_time" class="checkout-req-lebel">Start Time</label>
                                                <input type="text" class="timepicker form-control" name="start_time[1]" >
                                                <small class="form-text text-danger" id="start_time_1_err"></small>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="start_time" class="checkout-req-lebel">End Time</label>
                                                <input type="text" class="timepicker form-control" name="end_time[1]">
                                                <small class="form-text text-danger" id="end_time_1_err"></small>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="lname" class="checkout-req-lebel text-center">Add more</label>
                                                <button type="button" name="add" id="add" class="btn btn-info btn-sm">
                                                    <span class="fa fa-md fa-plus"></span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    </fieldset>

                                </div>




                                <div class="form-row">

                                    <div id="biography" class="form-group col-md-12 d-none">
                                        <label for="biography" class="control-label">Biography</label>

                                        <textarea class="form-control" rows="5"  name="biography" >{{ old('biography') }}</textarea>

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
                                            Submit
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
    <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    <script>
        $("#doctor").change(function(){
            $("#designation").removeClass("d-none");
            $("#institute").removeClass("d-none");
            $("#biography").removeClass("d-none");
            $("#degree").removeClass("d-none");
            $("#available_time").removeClass("d-none");
            $("#doc_info_category").removeClass("d-none");




        });
        $("#patient").change(function(){
            $("#designation").addClass("d-none");
            $("#institute").addClass("d-none");
            $("#biography").addClass("d-none");
            $("#degree").addClass("d-none");
            $("#available_time").addClass("d-none");
            $("#doc_info_category").addClass("d-none");



        });


        $('.timepicker').timepicker({
            timeFormat: 'H:mm',
            interval: 15,
            minTime: '00',
            maxTime: '11:45pm',
            defaultTime: '11',
            startTime: '00:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });


        var child = $('#dynamic_field .form-row').length;
        //console.log('number of child'+child);
        var i = child;

        $('#add').click(function(){
            i++;
            var countchild = $('#dynamic_field .form-row').length;
            var maxlen = '12';
            console.log(maxlen);
            if(countchild < maxlen){

            var innerText= '<div id="row'+i+'" class="form-row">' +
                '<div class="form-group col-md-2">' +
                    '<select name="day['+i+']" id="day" class="form-control">' +
                    '<option value="">---</option>' +
                    '<option value="sat">Sat</option>' +
                    '<option value="sun">Sun</option>' +
                    '<option value="mon">Mon</option>' +
                    '<option value="tue">Tue</option>' +
                    '<option value="wed">Wed</option>' +
                    '<option value="thu">Thu</option>' +
                    '<option value="fri">Fri</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group col-md-4">' +
                    '<input type="text" id="timepicker_start'+i+'" class="form-control" onfocus="renderTimePicker(this)" name="start_time['+i+']" >' +
                    '<small class="form-text text-danger" id="start_time_'+i+'_err"></small>' +
                    '</div>' +
                    '<div class="form-group col-md-4"> ' +
                    '<input type="text" id="timepicker_end'+i+'" class="form-control" onfocus="renderTimePicker(this)" name="end_time['+i+']" >' +
                    '<small class="form-text text-danger" id="end_time_'+i+'_err"></small>' +
                    '</div>'+
                    '<div class="form-group col-md-2"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove"><i class="fa fa-trash" aria-hidden="true"></i></button></div>' +
                    '</div>';
                $('#dynamic_field').append(innerText);
            }
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

        function renderTimePicker(data) {
            $('#'+data.id).timepicker({
                timeFormat: 'H:mm',
                interval: 15,
                minTime: '00',
                maxTime: '11:45pm',
                defaultTime: '11',
                startTime: '00:00',
                dynamic: true,
                dropdown: true,
                scrollbar: true
            });


        }


    </script>
@endsection