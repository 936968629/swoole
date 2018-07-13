<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/9 0009
 * Time: 22:46
 */
namespace app\common\lib\redis;
class Predis{
    /*
     * 单例模式
     */
    private static $_instance = '';

    public $redis = "";
    private function __construct()
    {
        $this->redis = new \Redis();
        $result = $this->redis->connect(config('redis.host'), config('redis.port'), config('redis.out_time') );
        if($result === false){
            throw new \Exception('redis connect fail');
        }
    }

    public static function getInstance(){
        if( empty(self::$_instance) ){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @param $key
     * @param $value
     * @param int $time
     * @return bool|string
     */
    public function set($key, $value, $time = 0){
        if(!$key){
            return '';
        }
        echo 'key';
        if( is_array($value) ){
            $va1ue = json_encode($value);
        }
        echo 'key2';
        if(!$time){
            return $this->redis->set($key, $va1ue);
        }
        echo 'key3';
        try{
            $this->redis->setex($key, $time, $va1ue);
        }catch (\Exception $e){
            var_dump($e);
        }
//        var_dump($this->redis->setex($key, $time, $va1ue) );
        return $this->redis->setex($key, $time, $va1ue);
    }

    public function get($key){
        if(!$key){
            return '';
        }
        return $this->redis->get($key);
    }
}