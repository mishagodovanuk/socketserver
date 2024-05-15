<?php
require __DIR__ . '/vendor/autoload.php';

use Socket\SocketChat\SocketChat;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Socket\SocketChat\Helpers\ArgumentHelper;
use Ratchet\WebSocket\WsServer;



$params = ArgumentHelper::getArgument($argv);

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new SocketChat()
        )
    ),
    array_key_exists('port', $params) ? $params['port'] : 80,
    array_key_exists('host', $params) ? $params['host'] : '0.0.0.0'
);

$server->run();