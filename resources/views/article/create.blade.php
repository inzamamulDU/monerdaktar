@extends('layouts.master')

@section('content')
    <div class="container">
        <section class="py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-title alert alert-primary">

                                <h5>
                                    <span>Article</span>
                                    <button class="btn btn-primary btn-sm float-md-right" type="button" data-toggle="collapse" data-target="#article_create" aria-expanded="false" aria-controls="article_create">
                                        <i class="material-icons">
                                            border_color
                                        </i> Create
                                    </button>

                                </h5>

                        </div>


                            <div class="collapse" id="article_create">
                                <div class="card-body">

                                    <form class="form-horizontal" method="POST" action="{{ route('article.store') }}">
                                    {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="form-group col-md-12{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label for="title" class="control-label">Article title</label>
                                                <input id="title" type="title" class="form-control" name="title" value="{{ old('title') }}" autofocus>
                                                @if ($errors->has('title'))
                                                    <small class="form-text text-danger">{{ $errors->first('title') }}</small>
                                                @endif

                                            </div>
                                        </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12{{ $errors->has('host_id') ? ' has-error' : '' }}">
                                            <label for="article_category_id" class="">Article Category</label>
                                            <select name="article_category_id" class="form-control" id="article-category-dropdown">
                                                <option value="">--Choose one--</option>
                                                @if($results)
                                                    @foreach($results->data as $key=>$value)
                                                    <option value="{{ $value->id }}" >{{ $value->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                                @if($errors->has('article_category_id'))
                                                    <small class="form-text text-danger">{{ $errors->first('article_category_id') }}</small>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label for="article_content" class="control-label">Content</label>

                                            <textarea id="article_content" class="form-control" rows="5"  name="article_content" >{{ old('article_content') }}</textarea>

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Create
                                            </button>

                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </section>

        {{--@if($appointmentList)
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
                                <td><a href="{{route('appoinment.ongoing',['id'=>$appointment->id])}}" class="btn btn-sm btn-info disabled" >Start</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endif
--}}
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'article_content' );
        CKEDITOR.config.height = 200;
        CKEDITOR.config.width = 'auto';

    </script>

@endsection

@section('css')

@endsection