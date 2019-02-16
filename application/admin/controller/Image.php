<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/22 0022
 * Time: 15:08
 */

namespace app\admin\controller;

use app\common\lib\Util;

class Image
{
    public function index()
    {
        $file = request()->file('file');
        if (empty($file)) {
            return Util::show(config('code.error'), 'file object no found');
        }
        $info = $file->move('../public/static/upload');
        if ($info) {
            $data = [
                'image' => config('live.host')."/upload/".$info->getSaveName(),
            ];
            return Util::show(config('code.success'), 'OK', $data);
        } else {
            return Util::show(config('code.error'), 'error');
        }
    }
}