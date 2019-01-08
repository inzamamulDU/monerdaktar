
@if($results)
    <ul class="list-group">
        @foreach($results->data as $key=>$result)

                <li class="list-group-item">
                    <span>
                       <span class="online">
                           <i class="fa fa-circle" aria-hidden="true"></i>
                       </span>
                        <img class="rounded" width="30" height="30" src="{{ asset('images/userphoto/'.$result->user->photo) }}" alt="">
                    </span>
                    {{$result->user->name}}

                    <small>
                        <a class="btn btn-sm btn-info" href="#">Request for Appointment</a>
                    </small>
                </li>

        @endforeach
    </ul>
@endif
