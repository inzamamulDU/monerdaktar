$(document).ready(function() {
    const myPeerId = $('#meeting_data').attr('data-peer-id');
    const targetId = $('#meeting_data').attr('data-target-id');
    console.log('My Peer Id: ', myPeerId);
    console.log('Target Peer Id: ', targetId);

    let localStream = null;
    let peer = null;
    let existingCall = null;
    let peerFinder = null;

    navigator.mediaDevices.getUserMedia({video: true, audio: true}).then(function (stream) {
        document.getElementById('my_cam').srcObject = stream;
        localStream = stream;
    }).catch(function (error) {
        console.error('mediaDevice.getUserMedia() error:', error);
        return;
    });

    peer = new Peer(myPeerId, {
        key: '3f964417-151f-4248-a306-0fad2e7692f6',
        debug: 3
    });

    peer.on('open', function(){
        $('#my_peer_id').text(peer.id);
        startConnectedPeerFinding();
    });

    peer.on('call', function(call){
        console.log('Incoming call....');
        $.confirm({
            title: 'Incoming Call!',
            content: 'Do you want to receive the call?',
            buttons: {
                confirm:  () => {
                    call.answer(localStream);
                    setupCallEventHandlers(call);
                },
                cancel: () => {
                    call.close();
                    $.alert('Denied!');
                }
            }
        });

    });

    peer.on('error', function(err){
        alert(err.message);
        stopConnectedPeerFinding();
    });

    peer.on('close', function(){
        console.log('On Call Closed....');
        stopConnectedPeerFinding();
    });

    peer.on('disconnected', function(){
        console.log('On Call disconnected....');
        stopConnectedPeerFinding();
    });

    $('#call_start').on('click', function(){
        const call = peer.call(targetId, localStream);
        setupCallingUI();
        setupCallEventHandlers(call);
    });

    $('#call_end').on('click', function () {
        if (existingCall) {
            existingCall.close();
            setupMakeCallUI();
        }
    });

    function setupCallEventHandlers(call){
        if (existingCall) {
            existingCall.close();
        };

        existingCall = call;

        call.on('stream', function(stream){
            addVideo(call, stream);
            setupEndCallUI();
        });

        call.on('close', function(){
            removeVideo();
            setupMakeCallUI();
        });
    }

    function addVideo(call, stream){
        document.getElementById('remote_cam').srcObject = stream;
    }

    function removeVideo(){
        document.getElementById('remote_cam').srcObject = undefined;
    }

    function setupCallingUI(){
        $('#call_start').text('Calling...');
        $('#call_start').prop('disabled', true);
        $('#call_end').prop('disabled', false);
    }

    function setupMakeCallUI(){
        $('#call_start').text('Call');
        $('#call_start').prop('disabled', false);
        $('#call_end').prop('disabled', true);
    }

    function setupEndCallUI() {
        $('#call_start').text('Call');
        $('#call_start').prop('disabled', true);
        $('#call_end').prop('disabled', false);
    }

    function startConnectedPeerFinding() {
        let peerFinderEvent = () => {
            peer.listAllPeers(peers => {
                console.log('Connected Peers: ', peers);
                if (peers.indexOf(targetId) !== -1) {
                    setupMakeCallUI();
                }
            });
        }
        peerFinderEvent();
        peerFinder = setInterval(() => {
            if (existingCall === null) {
                peerFinderEvent();
            }
        }, 1000 * 10);
    }

    function stopConnectedPeerFinding() {
        if (peerFinder !== null) {
            peerFinder.cancel();
        }
    }
});