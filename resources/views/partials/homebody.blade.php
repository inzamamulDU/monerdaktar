<h3 class="my-4 text-center text-uppercase py-2"><b>Meet Our Doctors</b></h3>

<!-- Marketing Icons Section -->
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

<div class="row">
    @if($results)
        @foreach($results->data as $key=>$result)
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="{{ asset('images/userphoto/'.$result->photo) }}" alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <span>{{$result->name}}</span>
                        </h5>
                        <p class="py-1 text-center">
                            <small class="doctor-info">
                                {{$result->orgnization}}
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


<!-- /.row -->

<!-- Portfolio Section -->

<!-- /.row -->

{{--
<!-- Features Section -->
<div class="row">
    <div class="col-lg-6">
        <h2>Modern Business Features</h2>
        <p>The Modern Business template by Start Bootstrap includes:</p>
        <ul>
            <li>
                <strong>Bootstrap v4</strong>
            </li>
            <li>jQuery</li>
            <li>Font Awesome</li>
            <li>Working contact form with validation</li>
            <li>Unstyled page elements for easy customization</li>
        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
    </div>
    <div class="col-lg-6">
        <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
    </div>
</div>
<!-- /.row -->

<hr>

<!-- Call to Action Section -->
<div class="row mb-4">
    <div class="col-md-8">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
    </div>
    <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
    </div>
</div>--}}
