<?php
//swoole开启http服务
$http = new swoole_http_server("0.0.0.0",9507);

$http->set([
    'enable_static_handler' => true,
    'document_root' => '/data/www/swoole/public/static',
    'worker_num' => 5,
]);

$http->on('WorkerStart',function (swoole_server $server , $worker_id){
    // 定义应用目录
    define('APP_PATH', __DIR__ . '/../application/');
    // 加载框架引导文件
    require __DIR__ . '/../thinkphp/base.php';

//    require __DIR__ . '/../thinkphp/start.php';

});

$http->on('request', function ($request, $response) use($http){

//    $response->header("Content-Type", "text/html; charset=utf-8");

    if(isset($request->server) ){
        foreach ($request->server as $k => $v){
            $_SERVER[strtoupper($k)] = $v;
        }
    }
    if(isset($request->header) ){
        foreach ($request->header as $k => $v){
            $_SERVER[strtoupper($k)] = $v;
        }
    }
    $_GET = [];
    if(isset($request->get) ){
        foreach ($request->get as $k => $v){
            $_GET[$k] = $v;
        }
    }
    $_POST = [];
    if(isset($request->post) ){
        foreach ($request->post as $k => $v){
            $_POST[$k] = $v;
        }
    }
    ob_start();
    // 执行应用并响应

    try{
        think\Container::get('app', [defined('APP_PATH') ? APP_PATH : ''])
            ->run()
            ->send();
    }catch (\Exception $e){
        //todo
    }
//    echo "action:".request()->action().PHP_EOL;
//    echo "fd:".$request->fd;
    $res = ob_get_contents();
    ob_end_clean();
    $response->end($res);

});

$http->start();
