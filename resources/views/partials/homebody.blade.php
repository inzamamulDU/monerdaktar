<h3 class="my-4 text-center text-uppercase py-2"><b>Meet Our Doctors</b></h3>

<!-- Marketing Icons Section -->
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

<div class="row">
    @if($results)
        @foreach($results->data as $key=>$result)
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
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

