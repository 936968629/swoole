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
        try{
            $result = $this->redis->connect(config('redis.host'), config('redis.port'), config('redis.out_time') );
        }catch (\Exception $e){
            echo "redis connect fail";
        }

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
        if( is_array($value) ){
            $value = json_encode($value);
        }
        if(!$time){
            return $this->redis->set($key, $value);
        }
        $this->redis->setex($key, $time, $value);

        return $this->redis->setex($key, $time, $value);
    }

    public function get($key){
        if(!$key){
            return '';
        }
        return $this->redis->get($key);
    }

    public function sAdd($key, $value)
    {
        return $this->redis-$this->sAdd($key, $value);
    }


}