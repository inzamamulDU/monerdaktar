@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if($results)


                                    @foreach($results->data as $key=>$result)
                                        <tr>
                                    <td>{{$result->id}}</td>
                                    <td>{{$result->name}}</td>
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

@section('javascript')
    <script>
        $("#doctor").change(function(){
            $("#job_title").removeClass("hidden");
            $("#orgnization").removeClass("hidden");


        });
        $("#patient").change(function(){
            $("#job_title").addClass("hidden");
            $("#orgnization").addClass("hidden");


        });
        /*$("#doctor").onclick(function(){

            $("#patient").removeAttr("checked")
        });*/
    </script>
@endsection
