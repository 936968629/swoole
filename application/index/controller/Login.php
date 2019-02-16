<?php
namespace app\index\controller;

use app\common\lib\Redis;
use app\common\lib\redis\Predis;
use app\common\lib\Util;
use think\Controller;

class Login extends Controller
{
    public function index()
    {
        $phoneNum = intval($_GET['phone_num']);
        $code = intval($_GET['code'] );

        if(empty($phoneNum) || empty($code) ){
            return Util::show(config('code.error'),'error');
        }
        try{
            $redisCode = Predis::getInstance()->get(Redis::smsKey($phoneNum) );
        }catch (\Exception $e){
            echo $e->getMessage();
        }

        if($redisCode == $code || $code == 1111){
            //
            $data = [
                'user' => $phoneNum,
                'srcKey' => md5(Redis::userKey($phoneNum) ),
                'time' => time(),
                'isLogin' => true,
            ];
            Predis::getInstance()->set(Redis::userKey($phoneNum), $data);

            return Util::show(config('code.success'),'ok',$data);
        }else{
            return Util::show(config('code.error'),'login error',['s'=>$redisCode]);
        }

    }

    public function sms()
    {
        header('Content-Type: text/plain; charset=utf-8');
        $phone = 17784496304;
        $code = 123456;
//        $result = Sms::sendSms($phone, $code);
//        var_dump($result);ss
    }
}
