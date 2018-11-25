
    <div class="container">
        <section class="py-3">

                @if($results)
                    @php ($index=0)
                    @foreach($results->data as $key=>$result)
                        <?php


                         if($index % 3 ==0 ) echo '<div class="row">'?>



                            <div class="col-lg-4 col-sm-6 portfolio-item">
                                <div class="card h-100">
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

                        <?php  $index++; if($index % 3 ==0 && $index!=0) echo '</div>';?>



                        @endforeach

                    @else
                        <h4 class="alert alert-info">No data</h4>
                @endif
            </section>
   @if($results->links)
            <div class="row mt-2">
                <div class="col-md-6 offset-md-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->first}}')" >First</a></li>
                            <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->prev}}')">Previous</a></li>
                            <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->next}}')" >Next</a></li>
                            <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->last}}')">Last</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        @endif
    </div>

