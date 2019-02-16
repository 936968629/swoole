<?php
namespace app\index\controller;

use app\common\lib\ali\Sms;
use app\common\lib\Redis;
use app\common\lib\redis\Predis;
use app\common\lib\Util;

class Send
{
    /*
     * 发送验证码
     */
    public function login()
    {
//        $phoneNum = request()->get('phone_num',0,'intval');
        $phoneNum = intval($_GET['phone_num'] );
        if( empty($phoneNum) ){
            return Util::show(config('code.error'),'error');
        }

        //随机数
        $code = rand(1000,9999);

        $taskData = [
            'method' => 'sendSms',
            'data' => [
                'phone' => $phoneNum,
                'code' => $code
            ]

        ];

        $_POST['http_server']->task($taskData);
        return Util::show(config('code.success'),'ok',['code' => $code]);
//        try{
//            $result = Sms::sendSms($phoneNum, $code);
//        }catch (\Exception $e){
//            return Util::show(config('code.error'),'短信发送失败');
//        }

//        header('Content-Type: text/plain; charset=utf-8');

//        if($result->Code === "OK"){
//            //redis保存
////            $redis = new \Swoole\Coroutine\Redis();
//            /**
//            $redis = new \Redis();
//            $redis->connect(config('redis.host'), config('redis.port') );
//            $redis->set(Redis::smsKey($phoneNum), $code, config('redis.out_time') );
//            **/
//            Predis::getInstance()->set(Redis::smsKey($phoneNum), $code, config('redis.out_time') );
//            $res['ss'] = Predis::getInstance()->get(Redis::smsKey($phoneNum) );
//            return Util::show(config('code.success'),'ok',$res);
//        }else{
//            return Util::show(config('code.error'),'失败');
//        }
    }

    public function hello($name = 'ThinkPHP5')
    {
        $phoneNum = 177844;
        $code = 4578;
        $redis = new \Redis();
        $redis->connect(config('redis.host'), config('redis.port') );
        $redis->set(Redis::smsKey($phoneNum).$phoneNum, $code, config('redis.out_time') );
        $res['ss'] = $redis->get(Redis::smsKey($phoneNum).$phoneNum );
//        return Util::show(config('code.success'),'ok',$res);
    }

}
