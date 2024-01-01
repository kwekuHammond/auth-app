<?php

namespace App\Http\Websockets;

use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class WebSocketHandler implements MessageComponentInterface
{

    function onOpen(ConnectionInterface $conn)
    {
        // TODO: Implement onOpen() method.
        return $conn->httpRequest;
    }

    function onClose(ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    public function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        // TODO: Implement onMessage() method.
    }

}
