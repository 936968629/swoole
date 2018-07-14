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

class Task{
    //异步发送短信
    public function sendSms($data){

        try {
            $response = Sms::sendSms($data['phone'], $data['code']);
        }catch (\Exception $e) {
            // todo
            echo $e->getMessage();
        }
        print_r($response);
    }


}