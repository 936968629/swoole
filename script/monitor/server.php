<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/2/23
 * Time: 14:52
 */

class Server {

    const PORT = 8811;

    public function port()
    {

        $shell = "netstat -anp 2>/dev/null | grep ".self::PORT. " LISTEN | wc -l";

        $result = shell_exec($shell);
        if ($result != 1) {
            //发送报警 短信、邮件
            echo date("Ymd H:i:s")."error".PHP_EOL;
        }
    }
}

(new Server())->port();