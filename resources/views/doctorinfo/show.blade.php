@extends('layouts.master')

@section('content')
    <div class="data-show">

        @if($results)
            {!! $results !!}
        @endif

    </div>
@endsection



@section('javascript')
    <script type="text/javascript">


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

    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $('#start_time').datetimepicker();
        $('#end_time').datetimepicker();
    </script>



@endsection

@section('css')

@endsection
