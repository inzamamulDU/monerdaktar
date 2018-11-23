@extends('layouts.master')

@section('content')
    <section class="py-3">
        <div class="row">
            <div class="data-show">
                @if($results)


                    @foreach($results->data as $key=>$result)
                        <div class="col-md-10 offset-md-1 p-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{$result->title}}</h4>
                                    <p>
                                        <small>
                                            Created by {{ $result->user->name}}
                                        </small>
                                    </p>

                                </div>

                                <div class="card-body">
                                    {!! str_limit($result->article_content,500,'...')!!}
                                </div>
                                <div class="card-footer"></div>
                            </div>

                        </div>


                    @endforeach

                @endif

                    <div class="container">
                        <div class="row mt-2">
                            <div class="col-md-6 offset-md-5">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link disabled" onclick="linkGenerate(this)" link-data="{{$articleObject->links->prev}}" >Previous</a></li>
                                        <li class="page-item"><a class="page-link"  onclick="linkGenerate(this)" link-data="{{$articleObject->links->first}}" >First</a></li>
                                        <li class="page-item"><a class="page-link" onclick="linkGenerate(this)" link-data="{{$articleObject->links->next}}">Next</a></li>
                                        <li class="page-item"><a class="page-link" onclick="linkGenerate(this)" link-data="{{$articleObject->links->last}}">Last</a></li>
                                    </ul>
                                </nav>


                            </div>
                        </div>

                    </div>

            </div>

        </div>


    </section>






@endsection

@section('javascript')
    <script type="text/javascript">

        var article_object = '<?php echo json_encode($articleObject) ?>';

        var article_data= JSON.parse(article_object);
        //console.log(article_data);

        function linkGenerate(data){

            var api_URL = data.getAttribute('link-data');
          //  console.log(lanValue);

            $.ajax({
                url: api_URL,
                headers: {
                    'Accept':'application/json',
                    'Content-Type':'application/json' },
                method: 'GET',
                dataType: 'json',

                success: function(data){
                    $('.data-show').html("");

                    if(data){

                        console.log(data);

                        var result = data.data;
                        var result_links = data.links;
                        var htmlContent= "";

                        for(var i=0; i < result.length; i++) {

                            htmlContent +="<div class='col-md-10 offset-md-1'>"+
                                "<div class='card'>"+
                                "<div class='card-header'>"+
                                "<h4>"+result[i].title+"</h4>"+
                                "<p><small>Created by "+result[i].user.name +"</small></p>"+
                                "</div>"+
                                "<div class='card-body'>"+
                                result[i].article_content+
                                "</div>"+
                                "<div class='card-footer'></div>"+
                                "</div>"+
                                "</div>";


                        }

                        htmlContent +="<div class='container'>" +
                            "<div class='row mt-2'>" +
                            "<div class='col-md-6 offset-md-5'>" +
                            "<nav aria-label='Page navigation example'>" +
                            "<ul class='pagination'>" +
                            "<li class='page-item'><a class='page-link ' onclick='linkGenerate(this)' link-data="+result_links.prev +" >Previous</a></li>" +
                            "<li class='page-item'><a class='page-link ' onclick='linkGenerate(this)' link-data="+result_links.first +" >First</a></li>" +
                            "<li class='page-item'><a class='page-link ' onclick='linkGenerate(this)' link-data="+result_links.next +" >Next</a></li>" +
                            "<li class='page-item'><a class='page-link ' onclick='linkGenerate(this)' link-data="+result_links.last +" >Last</a></li>" +
                            "</ul></nav></div></div></div>"
                    }

                    $('.data-show').append(htmlContent);



                   // console.log(htmlContent);
                }
            });

        }

    </script>

@endsection

@section('css')

@endsection