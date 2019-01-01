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


                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#appointmentModal">
                                            Set Appointment
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mx-3">
                                                    <div class="md-form mb-5">
                                                        <i class="fa fa-user prefix grey-text"></i>
                                                        <input type="text" id="orangeForm-name" class="form-control validate">
                                                        <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                                                    </div>
                                                    <div class="md-form mb-5">
                                                        <i class="fa fa-envelope prefix grey-text"></i>
                                                        <input type="email" id="orangeForm-email" class="form-control validate">
                                                        <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
                                                    </div>

                                                    <div class="md-form mb-4">
                                                        <i class="fa fa-lock prefix grey-text"></i>
                                                        <input type="password" id="orangeForm-pass" class="form-control validate">
                                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
                                                    </div>

                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button class="btn btn-deep-orange">Sign up</button>
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

