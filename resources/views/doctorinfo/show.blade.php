@extends('layouts.master')

@section('content')
    <div class="data-show">
    </div>
@endsection



@section('javascript')
    <script type="text/javascript">


        $(document).ready(function(){

            var base_url = '<?php echo env('API_URL')  ?>';

            var url =base_url+"api/doctor-info";
            populateDoctorList(url);




        });



        function populateDoctorList(request){

            if(request=="") return;

            var base_url = '<?php echo env('API_URL')  ?>';



            var api_URL = base_url+'doctorinfo/getdoctors';

            var request_data = '{\"url\" :\"'+request+'\"}';

            $.ajax({
                headers: {
                    'Accept':'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type':'application/json' },
                method: "POST",
                url: api_URL,
                data: request_data,
                dataType : 'text',


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
