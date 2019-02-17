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
            $result = $this->redis->connect('127.0.0.1', 6379, 60*60*24*10 );
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
        return $this->redis->sAdd($key, $value);
    }

    public function sRem($key, $value)
    {
        return $this->redis->sRem($key, $value);
    }

    public function sMembers($key)
    {
        return $this->redis->sMembers($key);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        return $this->redis->$name(...$arguments);
    }
}