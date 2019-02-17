/**
 * Created by Administrator on 2018/7/29 0029.
 */
var wsUrl = 'ws://118.24.112.162:8811';
// var wsUrl = getWsUrl();

var websocket = new WebSocket(wsUrl);

websocket.onopen = function (evt) {
    console.log('connect-swoole-success');
}

websocket.onmessage = function (evt) {
    push(evt.data);
    console.log('ws-server-return-data:'+evt.data);
}

websocket.onclose = function (evt) {
    console.log('ws-connect close');
}

websocket.onerror = function (evt, e) {
    console.log('error:' + evt.data)
}

function push(data) {
    
}