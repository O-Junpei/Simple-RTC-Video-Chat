"use strict";
const wsUrl = 'ws://localhost:3001/';
const ws = new WebSocket(wsUrl);
ws.onopen = (evt) => {
    console.log('ws open()');
};
ws.onerror = (err) => {
    console.error('ws onerror() ERR:', err);
};
ws.onmessage = (evt) => {
    console.log('ws onmessage() data:', evt.data);
    const message = JSON.parse(evt.data);
    switch(message.type){
        case 'offer': {
            console.log('Received offer ...');
            textToReceiveSdp.value = message.sdp;
            setOffer(message);
            break;
        }
        case 'answer': {
            console.log('Received answer ...');
            textToReceiveSdp.value = message.sdp;
            setAnswer(message);
            break;
        }
        case 'candidate': {
            console.log('Received ICE candidate ...');
            const candidate = new RTCIceCandidate(message.ice);
            console.log(candidate);
            addIceCandidate(candidate);
            break;
        }
        default: {
            console.log("Invalid message");
            break;
         }
    }
};
