@extends('layouts.master')

@section('content')
    <section class="py-3">
        <div class="row">
            <div class="col-lg-10">
                <div class="container">
                    <div class="data-show">

                        @if($results)
                            {!! $results !!}
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="container">
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>


    </section>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
    <script>
        $(function () {
            var usrId = "{{Auth::id()}}";
            var socket = io.connect('http://104.248.155.229:5000?token='+usrId);


            socket.on('allconnected',function (data){
                console.log(data);
        });
            socket.on('broadcast',function (data){
                //var connectedUsers = JSON.parse(data);
                console.log('broadcast received');
            console.log(data);
            //console.log(Object.keys(connectedUsers).length);
            // for(var i=0; i < connectedUsers.lenght;i++){
            //     console.log(connectedUsers[i]);
            // }

        });
            socket.on('me',function (data){
                console.log( data);
        });
            //broadcast received for all user except sender
            socket.on('to-others-'+1,function (msg){
                console.log('message from :'+msg);
        });

            //console.log(navigator);
            $('form').submit(function(){
                console.log('form submitted ...');
                socket.emit('emit-chat', $('#send_msg').val());
                $('#send_msg').val('');
                return false;
            });
        });
    </script>


@endsection

@section('css')

@endsection
