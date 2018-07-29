<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/27 0027
 * Time: 23:05
 */

namespace app\index\controller;


class chart
{
    public function index()
    {
        //1指8812 0为8811
        foreach ($_POST['http_server']->posts[1]->connections as $fd) {
            $_POST['http_server']->push($fd,$fd)
        }
    }
}