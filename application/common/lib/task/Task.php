<?php
/**
 * swoole所有task异步任务
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/14 0014
 * Time: 15:23
 */
namespace app\common\lib\task;
use app\common\lib\ali\Sms;
use app\common\lib\Redis;
use app\common\lib\redis\Predis;

class Task{
    //异步发送短信
    public function sendSms($data){
        $phoneNum = $data['phone'];
        $code = $data['code'];
        try {
            $response = Sms::sendSms($data['phone'], $data['code']);
        }catch (\Exception $e) {
            // todo
            echo $e->getMessage();
            return false;
        }
        //保存验证码
        if($response->Code === "OK"){
            //redis保存
//            $redis = new \Swoole\Coroutine\Redis();
            /**
            $redis = new \Redis();
            $redis->connect(config('redis.host'), config('redis.port') );
            $redis->set(Redis::smsKey($phoneNum), $code, config('redis.out_time') );
            **/
            Predis::getInstance()->set(Redis::smsKey($phoneNum), $code, config('redis.out_time') );
            $res['ss'] = Predis::getInstance()->get(Redis::smsKey($phoneNum) );
        }else{
            return false;
        }
        return true;
    }

    /**
     * 发送赛况数据
     * @param $data
     */
    public function pushLive($data)
    {
        $clients = Predis::getInstance()->sMembers(config('redis.live_game_key'));

        foreach ($clients as $fd) {
            $_POST['http_server']->push($fd, json_encode($data));
        }
    }

}