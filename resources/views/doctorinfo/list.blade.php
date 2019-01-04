<section class="py-3">
    <div class="container">

            @if($results)
                <div class="row">
                @foreach($results->data as $key=>$result)

                        <div class="col-lg-4 col-sm-12 portfolio-item">
                            <div class="card">
                                <a href="#"><img class="card-img-top" src="{{ asset('images/userphoto/'.$result->user->photo) }}" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <span>{{$result->designation}} {{$result->user->name}}</span>
                                    </h5>

                                    <p class="py-0 text-center">
                                        <small class="doctor-info">
                                            {{$result->degree}}
                                        </small>
                                    </p>
                                    <p class="py-1 text-center">
                                        <small class="doctor-info">
                                            {{$result->institute}}
                                        </small>
                                    </p>
                                    <p class="card-text">{{$result->biography}}</p>

                                    @if (Auth::id() > 0)
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#appointmentModal">
                                            Set Appointment
                                        </button>
                                    </div>
                                    @endif
                                    <!-- Modal -->
                                    <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold">Appointment</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mx-3">
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
                                                                    <option value="{{$result->user->id}}">{{$result->user->name}}</option>

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
                                                                    Set Appointment
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if($results->links)

                            <div class="col-md-6 offset-md-4">

                                <nav aria-label="Page navigation ">
                                    <ul class="pagination text-center">
                                        <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->first}}')" >First</a></li>
                                        <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->prev}}')">Previous</a></li>
                                        <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->next}}')" >Next</a></li>
                                        <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->last}}')">Last</a></li>
                                    </ul>
                                </nav>
                            </div>

                    @endif

                </div>

                @else
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 text-center"><h4 class="alert alert-info">No data</h4></div>

                    </div>

                </div>

                @endif
    </div>
</section>


