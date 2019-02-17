<?php
namespace app\admin\controller;

class Live
{
    /**
     * 管理员发送直播信息
     */
    public function push()
    {
        //赛况入库
        //push到直播页面  获取连接的用户

        $_POST['http_server']->push(2, 'hello-push-data');

    }
}