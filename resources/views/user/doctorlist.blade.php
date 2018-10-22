@extends('layouts.master')

@section('content')
    <div class="container">
        <section class="py-3">

                @if($results)
                    @php ($index=0)
                    @foreach($results->data as $key=>$result)
                        <?php




                         if($index % 3 ==0 ) echo '<div class="row">'?>



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

                        <?php  $index++; if($index % 3 ==0 && $index!=0) echo '</div>';?>



                        @endforeach

                    @else
                        <h4 class="alert alert-info">No data</h4>
                @endif
            </section>
        @if($results->links)
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{doctorPaginationLink($results->links->first)}}">First</a></li>
            <li class="page-item"><a class="page-link" href="{{$results->links->prev}}">Previous</a></li>
            <li class="page-item"><a class="page-link" href="{{$results->links->next}}">Next</a></li>
            <li class="page-item"><a class="page-link" href="{{$results->links->last}}">Last</a></li>
        </ul>
        @endif


        </div>
    @endsection
