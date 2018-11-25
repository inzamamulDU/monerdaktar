<div class="container">
    <section class="py-3">

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

        @else
            <h4 class="alert alert-info">No data</h4>
        @endif
    </section>

    @if($results->links)
        <div class="row mt-2">
            <div class="col-md-6 offset-md-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->first}}')" >First</a></li>
                        <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->prev}}')">Previous</a></li>
                        <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->next}}')" >Next</a></li>
                        <li class="page-item"><a class="page-link" onclick="populateDoctorList('{{$results->links->last}}')">Last</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    @endif

</div>