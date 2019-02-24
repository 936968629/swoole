ThinkPHP5.1 + swoole
===============

必须在linux服务器上使用

 + php版本：7.0以上
 + mysql版本：5.7以上
 + 必须安装swoole和redis
 + 安装对应的php扩展

## 启动服务

在script/bin/server目录下启动服务：  php ws2.php

重启服务： sh reload.sh

### 访问项目
*   直播页面：主机ip:8811/live/detail.html
*   直播员页面：主机ip:8811/admin/live.html
