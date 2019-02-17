<?php
namespace app\admin\controller;

use app\common\lib\redis\Predis;

class Live
{
    /**
     * 管理员发送直播信息
     */
    public function push()
    {
        //赛况入库
        //push到直播页面  获取连接的用户
        $clients = Predis::getInstance()->sMembers(config('redis.live_game_key'));

        foreach ($clients as $fd) {
            $_POST['http_server']->push($fd, 'hello-push-data11');
        }


    }
}