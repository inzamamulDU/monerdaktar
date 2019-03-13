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
                <div class="container" id="online_doctors">

                </div>
            </div>
        </div>


    </section>
@endsection



@section('javascript')
    <script type="text/javascript">


        function populateDoctorList(request){

            if(request=="") return;





            var api_URL = '{{route('doctorinfo.getdoctors')}}';

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

    <script>
        $(function () {


            var socket = window.socket;
            var  userData = JSON.parse(window.userInfo);
            var userId= parseInt(userData.id);
            socket.on('allconnected',function (data){

            });
            // broadcast received for online users
            socket.on('broadcast',function (data){
                console.log(data);
                updateOnlineUser(data);

            });
            // broadcast received for online users
            socket.on('me',function (data){
                console.log(data);
                updateOnlineUser(data);
            });
            //broadcast received for appointment request

            socket.on('acceptedFeedback-to-patient-'+userId,function (data){
               appointmentAcceptedMessage(data);

            });

            socket.on('rejectedFeedback-to-patient-'+userId,function (data){
                console.log(data);

                appointmentRejectedMessage(data);
            });

            socket.on('to-doctor-'+userId,function (data){
                console.log(data);

                appointmentReqestSetup(data);
            });


            //console.log(navigator);
            $('form').submit(function(){
                console.log('form submitted ...');
                socket.emit('emit-chat', $('#send_msg').val());
                $('#send_msg').val('');
                return false;
            });
        });



        function updateOnlineUser(data) {

            var base_url = '<?php echo env('API_URL')  ?>';



            var api_URL = base_url+'doctorinfo/getOnlineDoctors';

            var online_users = [];


            for (key in data)
            {
                online_users.push(data[key]);
            }


            var request_data = '{"online_users": ['+online_users+']}';





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


                    $('#online_doctors').html(result);
                },
                error: function( jqXhr, textStatus, errorThrown ) {

                    console.log(jqXhr, textStatus.toString(), errorThrown.toString());
                }
            });


        }

        function requestForMeeting(data){


            var userData = JSON.parse(window.userInfo) ;
            var socket = window.socket;
            //console.log(userData);



            var dataObject = {
                name: userData.name,
                message: "set-appointment ",
                senderId: userData.id,
                receiverId: parseInt(data.id)
            }

            socket.emit('request-meeting',  { dataObject });

        }

        function appointmentRejectedMessage(data) {

            $('#modal_content_appointment').html("");
            var modal_content = '<div class="modal fade" id="appointmentRejectedMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title" id="exampleModalLabel">Appointment Rejected </h5>' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>' +
                '<div class="modal-body">Doctor is busy now. Kindly try again later.</div>' +
                '<div class="modal-footer">' +

                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';


            $('#modal_content_appointment').html(modal_content);
            $('#appointmentRejectedMessageModal').modal('show');
        }


        function appointmentAcceptedMessage(data) {
            console.log(data.data.appointmentUrl);
            window.open(data.data.appointmentUrl) ;
        }
        function appointmentReqestSetup (data) {


            var modal_content = '<div class="modal fade" id="appointmentRequestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title" id="exampleModalLabel">Appointment Request from: ' + data.callerInfo+  '</h5>' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>' +
                '<div class="modal-body">USER requested for an appointment. would you like to join?</div>' +
                '<div class="modal-footer">' +
                '<button type="button" onclick="appointment_rejected(\''+data.senderId+'\')" class="btn btn-danger btn-sm" data-dismiss="modal">Reject</button>' +
                '<button type="button" data-value="'+data+'" onclick="appointment_accepted(\'' + data.senderId + '\',\'' + data.meetingId + '\')" class="btn btn-info btn-sm" data-dismiss="modal">Accept</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';


            $('#modal_content_appointment').html(modal_content);
            $('#appointmentRequestModal').modal('show');
        }

        function appointment_rejected(data) {

            var socket = window.socket;

            var dataObject = {

                message: "appointment rejected ",
                senderId: data

            }

            socket.emit('request-rejected',  { dataObject });

        }

        function appointment_accepted(senderIdData, meetingIdData ) {
            console.log(senderIdData + " " + meetingIdData);

            var socket = window.socket;
            var appoint_url = '{{env("APPOINTMENT_URL")}}'+meetingIdData;
            var dataObject = {

                message: "appointment accpeted ",
                senderId: senderIdData,
                appointmentUrl: appoint_url

            }

            socket.emit('request-accepted',  { dataObject });


            window.open(appoint_url) ;
            return false;
        }


    </script>


@endsection

@section('css')

@endsection
