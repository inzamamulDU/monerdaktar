<section class="py-3">
    <div class="container">

        @if($results)
            <div class="row">
            @foreach($results->data as $key=>$result)
                <div class="col-md-10 offset-md-1 p-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{$result->id}} # {{$result->title}}</h4>
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
            @if($results->links)

                <div class="col-md-6 offset-md-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination text-center">
                            <li class="page-item"><a class="page-link" onclick="populateArticleList('{{$results->links->first}}')" >First</a></li>
                            <li class="page-item"><a class="page-link" onclick="populateArticleList('{{$results->links->prev}}')">Previous</a></li>
                            <li class="page-item"><a class="page-link" onclick="populateArticleList('{{$results->links->next}}')" >Next</a></li>
                            <li class="page-item"><a class="page-link" onclick="populateArticleList('{{$results->links->last}}')">Last</a></li>
                        </ul>
                    </nav>
                </div>

            @endif
            </div>

        @else
            <h4 class="alert alert-info">No data</h4>
        @endif
  



    </div>
</section>