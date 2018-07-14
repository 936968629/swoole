<?php
namespace app\index\controller;

use app\common\lib\redis\Predis;

class Index
{
    public function index()
    {
        return '';
    }

    public function hello($name = 'ThinkPHP5')
    {
        echo  'hello,' . $name;
    }

    public function login()
    {

    }

    public function sms()
    {
        header('Content-Type: text/plain; charset=utf-8');
        $phone = 17784496304;
        $code = 123456;
//        $result = Sms::sendSms($phone, $code);
//        var_dump($result);
    }
}
