@extends('layouts.master')

@section('content')
    <div class="container">
        <section class="py-3">

            <div class="row" data-peer-id="{{$results['my_peer_id']}}" data-target-id="{{$results['remote_peer_id']}}" id="meeting_data">
                <div class="col-9  embed-responsive embed-responsive-21by9">
                    <video class="embed-responsive-item" autoplay="true" id="remote_cam"></video>
                </div>
                <div class="col-3 align-text-top">
                    <video height="250" autoplay="true" id="my_cam"></video>
                    <div class="row p-1">
                        <div class="col-12">
                            My Peer Id: <b><span id="my_peer_id"> Connecting... </span></b>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-12">
                            <div class="btn-group special" role="group">
                                <button class="btn btn-lg btn-success" id="call_start" disabled>Call</button>
                                <button class="btn btn-lg btn-danger" id="call_end" disabled>End</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ secure_asset('js/jquery-confirm.min.js')}}"></script>

    <script type="text/javascript" src="{{ secure_asset('js/skyway-latest.js')}}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/doctor.js')}}"></script>
@endsection
