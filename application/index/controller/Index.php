<?php
namespace app\index\controller;

use app\common\lib\redis\Predis;

class Index
{
    public function index()
    {

        print_r($_GET);
        echo "hello word";
    }

    public function hello($name = 'ThinkPHP5')
    {
        echo  'hello,' . $name;
    }

    public function login()
    {

        $redis = new \Redis();
        $result = $redis->connect(config('redis.host'), config('redis.port'), config('redis.out_time') );
        var_dump($result);
//        var_dump( Predis::getInstance()->set('wen','ww',120) );
//        var_dump(Predis::getInstance()->get('wen') );
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
