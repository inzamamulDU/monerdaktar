@if(count($appointmentList->data) >0 )
    <section class="py-1">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <table class="table table-bordered">
                    <thead>
                    <tr>

                        <th scope="col">Meeting Title</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Patient</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appointmentList->data as $key=>$appointment)
                        <tr>

                            <td>{{$appointment->title}}</td>
                            <td>{{$appointment->doctor->name}}</td>
                            <td>{{$appointment->patient->name}}</td>
                            <td>{{$appointment->start_time}}</td>
                            <td>{{$appointment->end_time}}</td>
                            <td><a href="{{route('appoinment.ongoing',['id'=>$appointment->id])}}" class="btn btn-sm btn-info" >Start</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                @if($appointmentList->links)

                    <div class="col-md-6 offset-md-4">
                        <nav aria-label="Page navigation">
                            <ul class="pagination text-center">
                                <li class="page-item"><a class="page-link" onclick="populateAppointmentList('{{$appointmentList->links->first}}')" >First</a></li>
                                <li class="page-item"><a class="page-link" onclick="populateAppointmentList('{{$appointmentList->links->prev}}')">Previous</a></li>
                                <li class="page-item"><a class="page-link" onclick="populateAppointmentList('{{$appointmentList->links->next}}')" >Next</a></li>
                                <li class="page-item"><a class="page-link" onclick="populateAppointmentList('{{$appointmentList->links->last}}')">Last</a></li>
                            </ul>
                        </nav>
                    </div>

                @endif
            </div>


            </div>
        </div>
    </section>

@else
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center"><h4 class="alert alert-info">No data</h4></div>

        </div>

    </div>

@endif
