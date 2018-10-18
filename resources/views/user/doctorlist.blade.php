@extends('layouts.master')

@section('content')
    <div class="container">
        <section class="py-3">
            <div class="row">
                <div class="col-md-12 offset-md-1">
                    <div class="card">
                        <div class="card-title">
                            <div class="alert alert-primary" role="alert">

                                <b>Doctor List </b>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>

                                    </thead>
                                    <tbody>


                                    @if($results)


                                        @foreach($results->data as $key=>$result)
                                            <tr>
                                                <td>
                                                    <div class="from-row">
                                                        <div class="form-group col-md-6 ">
                                                            <span class="mr-5"><img class="thumbnail" width="300" height="300" src="{{ asset('images/userphoto/'.$result->photo) }}"></span>
                                                        </div>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="from-row">
                                                        <div class="form-group col-md-6 ">
                                                            <label for="name" class="control-label">Name:{{$result->name}}</label>

                                                        </div>

                                                    </div>

                                                    <div class="from-row">
                                                        <div class="form-group col-md-6 ">
                                                            <label for="name" class="control-label">Job Title:{{$result->job_title}}</label>

                                                        </div>

                                                    </div>

                                                    <div class="from-row">
                                                        <div class="form-group col-md-6 ">
                                                            <label for="name" class="control-label">Organization:{{$result->orgnization}}</label>

                                                        </div>

                                                    </div>

                                                    <div class="from-row">
                                                        <div class="form-group col-md-6 ">
                                                            <label for="name" class="control-label">Addres:{{$result->address}}</label>

                                                        </div>

                                                    </div>
                                                    <div class="from-row">
                                                        <div class="form-group col-md-6 ">
                                                            <label for="name" class="control-label">Country:{{$result->country}}</label>

                                                        </div>

                                                    </div>

                                                    <div class="from-row">
                                                        <div class="form-group col-md-6 ">
                                                            <label for="name" class="control-label">City:{{$result->city}}</label>

                                                        </div>

                                                    </div>

                                                    <div class="from-row">
                                                        <div class="form-group col-md-6 ">
                                                            <label for="name" class="control-label">Phone:{{$result->phone}}</label>

                                                        </div>

                                                    </div>

                                                    <div class="from-row">
                                                        <div class="form-group col-md-6 ">
                                                            <label for="name" class="control-label">Email:{{$result->email}}</label>

                                                        </div>

                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <h4 class="alert alert-info">No data</h4>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
