<?php
$server = new Swoole\Server('0.0.0.0', 9501);

$server->on('Connect', function ($server, $fd) {
    echo "Client: Connect.\n";
});

$server->on('Receive', function ($server, $fd, $reactor_id, $data) {
    sleep(10);
    $server->send($fd, "Server: {$data}");
});

$server->on('Close', function ($server, $fd) {
    echo "Client: Close.\n";
});

$server->start();