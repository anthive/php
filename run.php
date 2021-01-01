<?php
// your bot response should be json object
header('Content-Type: application/json');

// available actions and directions
const ACTIONS = ['stay', 'move', 'eat', 'take', 'put'];
const DIRECTIONS = ['up', 'down', 'right', 'left'];

// Sim will make http post request to your bot
// with json payload that contains information
// about map and ants
$payload = file_get_contents('php://input');

// Hive object from request payload
$hive = json_decode($payload, true);

$orders = array();

// Loop through ants and give orders
// For each enat create order object (move to random direction)
foreach ($hive['ants'] as $ant){
    $order->antId = $ant['id'];
    $order->act = 'move';
    // pick random direction from array on line 6
    $order->dir = DIRECTIONS[rand(0,3)];
    array_push($orders,$order);
}

// response json should look something like this
// {'orders': [
//	 {'antId':1,'act':'move','dir':'down'},
//	 {'antId':17,'act':'load','dir':'up'}
// ]}

// finish your json response 
$response->orders = $orders;
echo json_encode($response);

// this code available at https://github.com/anthive/php
// to test it localy, submit post request with payload.json using postman or curl
// curl -X 'POST' -d @payload.json http://localhost:7070

// have fun!

?>