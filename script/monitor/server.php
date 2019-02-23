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

        $shell = "netstat -anp | grep ".self::PORT;

        $result = shell_exec($shell);
        echo $result;
    }
}

(new Server())->port();