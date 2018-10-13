@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-19 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">User List</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Photo</th>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Job Title</th>
                                    <th>Orgnization</th>
                                    <th>Role</th>
                                    <th>Active</th>


                                </tr>
                                </thead>
                                <tbody>
                                @if($results)


                                    @foreach($results->data as $key=>$result)
                                        <tr>
                                            <td>{{$result->id}}</td>
                                            <td>{{$result->name}}</td>
                                            <td>{{$result->email}}</td>
                                            <td>{{$result->phone}}</td>
                                            <td>{{$result->photo}}</td>
                                            <td>{{$result->address}}</td>
                                            <td>{{$result->postcode}}</td>
                                            <td>{{$result->city}}</td>
                                            <td>{{$result->country}}</td>
                                            <td>{{$result->job_title}}</td>
                                            <td>{{$result->orgnization}}</td>
                                            <td>{{$result->role_id}}</td>

                                            <td>{{$result->active}}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach


                                @else
                                    <h4 class="alert alert-info">No data</h4>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
