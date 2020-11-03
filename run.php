<?php
header('Content-Type: application/json');

const ACTIONS = ["stay","move","eat","take","put"];
const DIRECTIONS = ["up","down","right","left"];

$payload = file_get_contents("php://input");

//Hive object from request payload
$hive = json_decode($payload,true);

$orders = array();
//Loop through ants and give orders
foreach ($hive["ants"] as $ant){
    $order = new stdClass();
    $order->antId = $ant["id"];
    $order->act = ACTIONS[rand(0,4)];
    $order->dir = DIRECTIONS[rand(0,3)];
    array_push($orders,$order);
}

// json output format sample:
// {"orders": [
//	 {"antId":1,"act":"move","dir":"down"},
//	 {"antId":17,"act":"load","dir":"up"}
//	]}
$response = new stdClass();
$response->orders = $orders;
echo json_encode($response);
?>
