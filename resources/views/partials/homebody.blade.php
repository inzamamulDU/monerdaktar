<div class="services ">
    <h2 class="text-uppercase text-center py-2"><b>Our Services</b></h2>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <a class="no_decoration" href=""><h3>24/7 direct consultation to available Psychiatrists and Psychologists</h3></a>
            <ul class="text-justify">
                <li>Online Psychiatric Consultation: We provide the psychiatric consultation from the most reputed psychiatrist in the country having MD or FCPS and other advanced degrees.</li>
                <li>Online Psychotherapy and Counselling: Our expert Clinical Psychologists and Councilors provide evidence based services for our clients.</li>
            </ul>
        </div>
        <div class="col-md-5">
            <a class="no_decoration" href=""><h3>Self Assessment</h3></a>
            <ul class="text-justify">
                <li>Assess Depression</li>
                <li>Assess Your Personality Trait</li>
                <li>Assess overall your Stress, Anxiety, Depression, …</li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <a class="no_decoration" href=""><h3>Information related nearest mental health hospitals, mental health professionals and pharmacy</h3></a>
        </div>
    </div>
</div>

<div class="appointment text-white">
        <div class="row content">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h3 class="text-uppercase text-center"><b>Quick Appointment</b></h3>
                <form method="POST" action="{{ route('appoinment.store') }}" class=" appointment_form">
                    <div class="row">

                        <div class="form-group  col-md-6 {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">Appointment Title</label>
                            <input id="title" type="text" class="form-control" value="{{ old('title') }}" />
                            @if ($errors->has('title'))
                                <small class="form-text text-danger">{{ $errors->first('title') }}</small>
                            @endif
                        </div>

                        <div class="form-group col-md-6 {{ $errors->has('start_time') ? ' has-error' : '' }}">
                            <label for="start_time" class="">Start date and time</label>
                            <input id="start_time" type="datetime-local" class="form-control" name="start_time">
                            @if ($errors->has('start_time'))
                                <small class="form-text text-danger">{{ $errors->first('start_time') }}</small>
                            @endif
                        </div>

                    </div>
                    <div class="row">

                        <div class="form-group col-md-6 {{ $errors->has('host_id') ? ' has-error' : '' }}">
                            <label for="second_input">Doctors</label>
                            <select class="form-control" id="second_input" type="select">
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

                        <div class="form-group col-md-6 {{ $errors->has('end_time') ? ' has-error' : '' }}">
                            <label for="end_time" class="">End date and time</label>
                            <input id="end_time" type="datetime-local" class="form-control" name="end_time">
                            @if ($errors->has('end_time'))
                                <small class="form-text text-danger">{{ $errors->first('end_time') }}</small>
                            @endif
                        </div>

                    </div>
                    <div class="row">

                        <div class="form-group col-md-6 padding-top-20">
                            <label><input type="radio" name="type" value="consultation" checked  >  Consultation</label>
                            <label><input type="radio" name="type" value="psychotherapy" >  Psychotherapy</label>
                        </div>

                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" >Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
</div>

<div class="ourDoctors">
        <h2 class="text-center text-uppercase py-2"><b>Meet Our Doctors</b></h2>

        <!-- Marketing Icons Section -->
        <p class="text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

        <div class="row">
            @if($results)
                @foreach($results->data as $key=>$result)
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="h-100">
                            <a href="#"><img class="card-img-top" src="{{ asset($result->user->photo) }}" alt=""></a>
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
                            </div>
                        </div>
                    </div>
                @endforeach
                
            @else
                <h4 class="alert alert-info">No data</h4>
            @endif

        </div>

        <div class="row">
            <div class="col-lg-10 col-sm-9"></div>
            <div class="col-lg-2 col-sm-3">
                <button class="explore_more btn btn-dark" href="{{route('doctorinfo.index')}}">Explore Everyone <span>&#8594;</span></button>
            </div>
        </div>
        <br />
</div>
