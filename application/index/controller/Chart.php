<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/27 0027
 * Time: 23:05
 */

namespace app\index\controller;


class Chart
{
    public function index()
    {
        //判断是否登录

        if (empty($_POST['game_id'])) {
            return Util::show(config('code.error'), 'error');
        }

        if (empty($_POST['content'])) {
            return Util::show(config('code.error'), 'error');
        }

        $data = [
            'user' => "用户ss",
            'content' => $_POST['content'],
        ];
//1指8812 0为8811
        foreach ($_POST['http_server']->ports[1]->connections as $fd) {
            $_POST['http_server']->push($fd, json_encode($data));
        }

        return Util::show(config('code.success'), 'success', $data);
    }
}