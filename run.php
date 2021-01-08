<?php
// Your bot response should be json object
header('Content-Type: application/json');

// Available actions and directions
const ACTIONS = ['stay', 'move', 'eat', 'take', 'put'];
const DIRECTIONS = ['up', 'down', 'right', 'left'];

// Sim will make http post request to your bot
// with json payload that contains information
// about map and ants
$payload = file_get_contents('php://input');

// Hive object from request payload
$hive = json_decode($payload, true);

// As example, we give order to 'move' in random direction.
// Your bot will have to be more complex and change the strategy
// based on map information (payload.canvas).
// Payload example https://github.com/anthive/php/blob/master/payload.json
// More information https://anthive.io/rules/
$antStrategy = function ($ant) {
    return [
        'antId' => $ant['id'],
        'act' => 'move',
        'dir' => DIRECTIONS[rand(0, 3)],
    ];
};

// Loop through ants and give orders
$orders = array_map($antStrategy, $hive['ants']);

// Response json should look something like this:
// {'orders': [
//  {'antId':1,'act':'move','dir':'down'},
//  {'antId':17,'act':'load','dir':'up'}
// ]}

// Finish your json response 
echo json_encode([
    'orders' => $orders,
]);

// This code available at https://github.com/anthive/php
// to test it localy, submit post request with payload.json using postman or curl
// curl -X 'POST' -d @payload.json http://localhost/

// Have fun!

