var sTransferNumber;
var oRingTone, oRingbackTone;
var oSipStack, oSipSessionRegister, oSipSessionCall, oSipSessionTransferCall;
var videoRemote, videoLocal, audioRemote;
var bFullScreen = false;
var oNotifICall;
var bDisableVideo = false;
var viewVideoLocal, viewVideoRemote; // <video> (webrtc) or <div> (webrtc4all)
var oConfigCall;
var oReadyStateTimer;


$(document).ready(function(){

    //audioRemote = document.getElementById("audio_remote");
    
    //var preInit = function() {
    //    // initialize SIPML5
    //    SIPml.init(postInit);
    //}

    audioRemote = document.getElementById("audio_remote");

    var preInit = function() {
        // initialize SIPML5
        SIPml.init(postInit);
    }

    oReadyStateTimer = setInterval(function () {
        if (document.readyState === "complete") {
            clearInterval(oReadyStateTimer);
            // initialize SIPML5
            preInit();
        }
    },
    500);

});

function postInit() {
        
        oConfigCall = {
            audio_remote: audioRemote,
            events_listener: { events: '*', listener: onSipEventSession },
            sip_caps: [
                            { name: '+g.oma.sip-im' },
                            { name: '+sip.ice' },
                            { name: 'language', value: '\"en,fr\"' }
                        ]
        };
}

// Callback function for SIP Stacks
function onSipEventStack(e) {
    switch (e.type) {
        case 'started':
            {
                // catch exception for IE (DOM not ready)
                try {
                    // LogIn (REGISTER) as soon as the stack finish starting
                    oSipSessionRegister = this.newSession('register', {
                        expires: 200,
                        events_listener: { events: '*', listener: onSipEventSession },
                        sip_caps: [
                                    { name: '+g.oma.sip-im', value: null },
                                    { name: '+audio', value: null },
                                    { name: 'language', value: '\"en,fr\"' }
                            ]
                    });
                    oSipSessionRegister.register();
                }
                catch (e) {
                    toastr.error("<b>1:" + e + "</b>");
                }
                break;
            }
        case 'stopping': case 'stopped': case 'failed_to_start': case 'failed_to_stop':
            {
                var bFailure = (e.type == 'failed_to_start') || (e.type == 'failed_to_stop');
                oSipStack = null;
                oSipSessionRegister = null;
                oSipSessionCall = null;
                toastr.warning(e)
                break;
            }

        case 'i_new_call':
            {
                if (oSipSessionCall) {
                    // do not accept the incoming call if we're already 'in call'
                    e.newSession.hangup(); // comment this line for multi-line support
                }
                else {
                    oSipSessionCall = e.newSession;
                    // start listening for events
                    oSipSessionCall.setConfiguration(oConfigCall);

                    //startRingTone();

                    toastr.info("<i>Incoming call from [<b>" + sRemoteNumber + "</b>]</i>");
                }
                break;
            }

        case 'm_permission_requested':
            {
                toastr.error("m_permission_requested");
                break;
            }
        case 'm_permission_accepted':
        case 'm_permission_refused':
            {
                if(e.type == 'm_permission_refused'){
                    toastr.error('Media stream permission denied');
                }
                break;
            }

        case 'starting': default: break;
    }
};

    // sends SIP REGISTER request to login
function sipRegister() {
    // catch exception for IE (DOM not ready)
    try {
        // create SIP stack
        oSipStack = new SIPml.Stack({
                realm: '194.50.85.118', // mandatory: domain name
                impi: 'WebRTCClient', // mandatory: authorization name (IMS Private Identity)
                impu: 'sip:WebRTCClient@194.50.85.118', // mandatory: valid SIP Uri (IMS Public Identity)
                password: '12345', // optional
                display_name: 'WebRTCClient', // optional
                websocket_proxy_url: 'ws://194.50.85.118:10060', // optional
                outbound_proxy_url: 'udp://194.50.85.118:5060', // optional
                enable_rtcweb_breaker: true, // optional
                //ice_servers: (window.localStorage ? window.localStorage.getItem('org.doubango.expert.ice_servers') : null),
                events_listener: { events: '*', listener: onSipEventStack },
                sip_headers: [
                        { name: 'User-Agent', value: 'IM-client/OMA1.0 sipML5-v1.2014.04.18' },
                        { name: 'Organization', value: 'Doubango Telecom' }
                ]
            }
        );
        if (oSipStack.start() != 0) {
            toastr.warning('<b>Failed to start the SIP stack</b>');
        }
        else return;
    }
    catch (e) {
        toastr.error("<b>2:" + e + "</b>");
    }
}

// Callback function for SIP sessions (INVITE, REGISTER, MESSAGE...)
function onSipEventSession(e) {
    tsk_utils_log_info('==session event = ' + e.type);

    switch (e.type) {
        case 'connecting': case 'connected':
            {
                var bConnected = (e.type == 'connected');
                if (e.session == oSipSessionRegister) {
                    toastr.info("<i>" + e.description + "</i>");
                }
                else if (e.session == oSipSessionCall) {
                    toastr.info("<i>" + e.description + "</i>");
                }
                break;
            } // 'connecting' | 'connected'
        case 'terminating': case 'terminated':
            {
                if (e.session == oSipSessionRegister) {

                    oSipSessionCall = null;
                    oSipSessionRegister = null;

                    toastr.info("<i>" + e.description + "</i>");
                }
                else if (e.session == oSipSessionCall) {
                    toastr.info(e.description);
                }
                break;
            } // 'terminating' | 'terminated'

        case 'm_stream_audio_local_added':
        case 'm_stream_audio_local_removed':
        case 'm_stream_audio_remote_added':
        case 'm_stream_audio_remote_removed':
            {
                break;
            }

        case 'i_ao_request':
            {
                if(e.session == oSipSessionCall){
                    var iSipResponseCode = e.getSipResponseCode();
                    if (iSipResponseCode == 180 || iSipResponseCode == 183) {
                        toastr.info('<i>Remote ringing...</i>');
                    }
                }
                break;
            }

        case 'm_early_media':
            {
                if(e.session == oSipSessionCall){
                    toastr.info('<i>Early media started</i>');
                }
                break;
            }

        case 'm_local_hold_ok':
            {
                if(e.session == oSipSessionCall){
                    toastr.info('<i>Call placed on hold</i>');
                }
                break;
            }
        case 'm_local_hold_nok':
            {
                if(e.session == oSipSessionCall){
                    toastr.warning('<i>Failed to place remote party on hold</i>');
                }
                break;
            }
        case 'm_local_resume_ok':
            {
                if(e.session == oSipSessionCall){
                    toastr.info('<i>Call taken off hold</i>');
                }
                break;
            }
        case 'm_local_resume_nok':
            {
                if(e.session == oSipSessionCall){
                    toastr.warning('<i>Failed to unhold call</i>');
                }
                break;
            }
        case 'm_remote_hold':
            {
                if(e.session == oSipSessionCall){
                    toastr.info('<i>Placed on hold by remote party</i>');
                }
                break;
            }
        case 'm_remote_resume':
            {
                if(e.session == oSipSessionCall){
                    toastr.info('<i>Taken off hold by remote party</i>');
                }
                break;
            }

        case 'o_ect_trying':
            {
                if(e.session == oSipSessionCall){
                    toastr.info('<i>Call transfer in progress...</i>');
                }
                break;
            }
        case 'o_ect_accepted':
            {
                if(e.session == oSipSessionCall){
                    toastr.info('<i>Call transfer accepted</i>');
                }
                break;
            }
        case 'o_ect_completed':
        case 'i_ect_completed':
            {
                if(e.session == oSipSessionCall){
                    toastr.info('<i>Call transfer completed</i>');
                }
                break;
            }
        case 'o_ect_failed':
        case 'i_ect_failed':
            {
                if(e.session == oSipSessionCall){
                    toastr.error('<i>Call transfer failed</i>');
                }
                break;
            }
        case 'o_ect_notify':
        case 'i_ect_notify':
            {
                if(e.session == oSipSessionCall){
                    toastr.info("<i>Call Transfer: <b>" + e.getSipResponseCode() + " " + e.description + "</b></i>");
                }
                break;
            }
        case 'i_ect_requested':
            {
                if(e.session == oSipSessionCall){                        
                    var s_message = "Do you accept call transfer to [" + e.getTransferDestinationFriendlyName() + "]?";//FIXME
                    if (confirm(s_message)) {
                        toastr.info("<i>Call transfer in progress...</i>");
                        break;
                    } else {
                        toastr.warning("Transfer is blocked");
                    }
                }
                break;
            }
    }
}

// sends SIP REGISTER (expires=0) to logout
function sipUnRegister() {
    if (oSipStack) {
        oSipStack.stop(); // shutdown all sessions
    }
}

// makes a call (SIP INVITE)
function sipCall(s_type) {
        oSipSessionCall = oSipStack.newSession(s_type, oConfigCall);
        // make call
        oSipSessionCall.call("*9");
}

function sipSendDTMF(c){
    if(oSipSessionCall && c){
        if(oSipSessionCall.dtmf(c) == 0){
            try { dtmfTone.play(); } catch(e){ }
        }
    }
}

function sipDTMFString(s) {
    var counter = 0;
    var startTimer = setInterval(function(){
        sipSendDTMF(s[counter]);
        if (counter == s.length) {
            clearInterval(startTimer);
        }
        counter++;
    }, 500);
    //for (var i=0; i < s.length; i++) {
      //  var str = s;
        //setTimeout(function(){ sipSendDTMF(s[i]); }, i*500);
        //setTimeout(function(){ alert(i); }, i*500);
        //alert(i);
    //}
}


/*
    SIPml.init(
        function(e){
            var stack =  new SIPml.Stack({
                 realm: '194.50.85.118', // mandatory: domain name
                 impi: 'WebRTCClient', // mandatory: authorization name (IMS Private Identity)
                 impu: 'sip:WebRTCClient@194.50.85.118', // mandatory: valid SIP Uri (IMS Public Identity)
                 password: '12345', // optional
                 display_name: 'WebRTCClient', // optional
                 websocket_proxy_url: 'ws://194.50.85.118:10060', // optional
                 outbound_proxy_url: 'udp://194.50.85.118:5060', // optional
                 enable_rtcweb_breaker: true, // optional
                 events_listener: { events: 'started', listener: function(e){
                                        //var callSession = stack.newSession('call-audio', {
                                        //        audio_remote: document.getElementById('audio-remote')
                                        //    });
                                        var callSession = stack.newSession('call-audio');
                                        callSession.call('2288');
                                        $("#my_a").click(function(){
                                            callSession.dtmf('161#161#');
                                        })
                                    } 
                 },
                 sip_headers: [ // optional
                         { name: 'User-Agent', value: 'IM-client/OMA1.0 sipML5-v1.0.0.0' },
                         { name: 'Organization', value: 'Doubango Telecom' }
                    ]
            });
            stack.start();
        }
    );
*/