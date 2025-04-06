<?php
//创建Server对象，监听 127.0.0.1:9501 端口。
$server = new Swoole\Server('127.0.0.1', 9501);

$server->set([
    'worker_num' => 1,
    'task_worker_num' => 1,
]);

//监听连接进入事件。
$server->on('Connect', function ($server, $fd) {
    echo "Client: Connect.\n";
});

//监听数据接收事件。
$server->on('Receive', function ($server, $fd, $reactor_id, $data) {
    $server->send($fd, "aaaaaaaaaaaaaa");
    sleep(10);
    $server->send($fd, "Server: {$data}");
});

//监听连接关闭事件。
$server->on('Close', function ($server, $fd) {
    echo "Client: Close.\n";
});
//启动服务器
$server->start();