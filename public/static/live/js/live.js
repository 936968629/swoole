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
    data = JSON.parse(data);


    var html = `<div class="frame">
					<h3 class="frame-header">
						<i class="icon iconfont icon-shijian"></i>第${data.type}节 02：30
					</h3>
					<div class="frame-item">
						<span class="frame-dot"></span>
						<div class="frame-item-author">`;
        if (data.logo) {
            html += `<img src="${data.logo}" width="20px" height="20px" /> ${data.title}`;
        } else {
            html += `${data.title}`;
        }
        html += `</div>
						<p>08:44 ${data.content}</p>`
        if (data.image) {
            html += `<p>
							<img src="${data.image}" width="40%" />
						</p>`
        }
        html += `
					</div>
				</div>`;
    $("#match-result").prepend(html);
}