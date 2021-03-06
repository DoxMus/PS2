<?php
echo "gora";
set_time_limit(0);

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
require_once '../vendor/autoload.php';
echo "po usach";

class Chat implements MessageComponentInterface {
	protected $clients;
	protected $users;

	public function __construct() {
		$this->clients = new \SplObjectStorage;
		echo "konstruktor";
	}

	public function onOpen(ConnectionInterface $conn) {
		$this->clients->attach($conn);
		echo "onOpen";
		// $this->users[$conn->resourceId] = $conn;
	}

	public function onClose(ConnectionInterface $conn) {
		$this->clients->detach($conn);
		// unset($this->users[$conn->resourceId]);
	}

	public function onMessage(ConnectionInterface $from,  $data) {
		$from_id = $from->resourceId;
		$data = json_decode($data);
		$type = $data->type;
		switch ($type) {
			case 'chat':
				$user_id = $data->user_id;
				$chat_msg = $data->chat_msg;
				$response_from = "<span style='color:#999'><b>".$user_id.":</b> ".$chat_msg."</span><br><br>";
				$response_to = "<b>".$user_id."</b>: ".$chat_msg."<br><br>";
				// Output
				$from->send(json_encode(array("type"=>$type,"msg"=>$response_from)));
				foreach($this->clients as $client)
				{
					if($from!=$client)
					{
						$client->send(json_encode(array("type"=>$type,"msg"=>$response_to)));
					}
				}
				break;
		}
	}

	public function onError(ConnectionInterface $conn, \Exception $e) {
		echo $e;
		$conn->close();
	}
}
echo "echo";
$chat = new Chat();
echo 'chat';
$ws = new WsServer($chat);
echo 'ws';
$http = new HttpServer($ws);
echo 'http';
$server = IoServer::factory(
	$http, 8077);
	echo "serwer wystartował";
	
	$server->run();
?>