@extends('layouts.master')

@section('content')
    <div class="container">
        <section class="py-3">

            <div class="data-show">
            </div>
        </section>
    </div>
@endsection



@section('javascript')
    <script type="text/javascript">


        $(document).ready(function(){

            var url ="api/article";
            populateArticleList(url);



        });



        function populateArticleList(request){

            if(request=="") return;

            var api_URL = 'http://localhost/article/get-articles';

            var request_data = '{\"url\" :\"'+request+'\"}';


            var json = JSON.parse(request_data);
            console.log(json);





            $.ajax({
                method: "GET",
                url: api_URL,
                data: request_data,
                success: function(result){
                    console.log("success");
                    $('.data-show').html(result);
                },
                error: function( jqXhr, textStatus, errorThrown ) {

                    console.log(jqXhr, textStatus.toString(), errorThrown.toString());
                }
            });




        }

    </script>

@endsection

@section('css')

@endsection
