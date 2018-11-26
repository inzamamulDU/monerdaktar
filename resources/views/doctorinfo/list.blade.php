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

