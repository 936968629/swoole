<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/22 0022
 * Time: 15:08
 */

namespace app\admin\controller;

class Image
{
    public function index()
    {

        $file = request()->file('file');
        $info = $file->move('../public/static/upload');
        var_dump($info);
    }
}