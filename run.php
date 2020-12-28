<?php
// your bot respons should be json object
header('Content-Type: application/json');

// available actions and directions
const ACTIONS = ["stay","move","eat","take","put"];
const DIRECTIONS = ["up","down","right","left"];

$payload = file_get_contents("php://input");

// your bot respons should be json object
$hive = json_decode($payload,true);

$orders = array();
// loop through ants and give orders
foreach ($hive["ants"] as $ant){
    $order = new stdClass();
    $order->antId = $ant["id"];
    $order->act = ACTIONS[rand(0,4)]; // pick random action from array on line 6
    $order->dir = DIRECTIONS[rand(0,3)]; // pick random direction from array on line 7
    array_push($orders,$order); // add order to your response object from line 14
}

// json output format sample:
// {"orders": [
//	 {"antId":1,"act":"move","dir":"down"},
//	 {"antId":17,"act":"load","dir":"up"}
//	]}
$response = new stdClass();
$response->orders = $orders;
echo json_encode($response);

// this code available at https://github.com/anthive/php
// to test it localy, submit post request with payload.json using postman or curl
// curl -X 'POST' -d @payload.json http://localhost:7070

// have fun!

?>
