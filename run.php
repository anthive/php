<?php
header('Content-Type: application/json');

const ACTIONS = ["stay","move","eat","load","unload"];
const DIRECTIONS = ["up","down","right","left"];

//$payload = file_get_contents("php://input");
$payload = file_get_contents("payload.json");

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

// json format sample:
// {"1":{"act":"load","dir":"down"},"17":{"act":"load","dir":"up"}}
$response = new stdClass();
$response->orders = $orders;
echo json_encode($response);
?>