<?php
namespace app\admin\controller;

class Chart
{
    public function index()
    {
        foreach ($_POST['http_server']->ports[1]->connections as $fd) {
            $_POST['http_server']->push($fd, $fd);
        }

    }
}