/**
 * Created by Administrator on 2018/7/29 0029.
 */
var wsUrl = 'ws://118.24.112.162:8812';

var websocket = new WebSocket(wsUrl);

websocket.onopen = function (evt) {
    console.log('connect-swoole-success');
}

websocket.onmessage = function (evt) {
    push2(evt.data);
    console.log('ws-server-return-data:'+evt.data);
}

websocket.onclose = function (evt) {
    console.log('ws-connect close');
}

websocket.onerror = function (evt, e) {
    console.log('error:' + evt.data)
}

function push2(data) {
    var data = JSON.parse(data);
    var html = `<div class="comment">
					<span>${data.user}</span>
					<span>${data.content}</span>
				</div>`;
    $("#comments").prepend(html);
}