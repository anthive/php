<?php

header('Content-Type: application/json');

const ACTIONS = ['stay', 'move', 'eat', 'take', 'put'];
const DIRECTIONS = ['up', 'down', 'right', 'left'];

$payload = file_get_contents('php://input');

// Hive object from request payload
$hive = json_decode($payload, true);

// Loop through ants and give orders
$orders = array_map(fn($ant) => [
    'antId' => $ant['id'],
    'act' => ACTIONS[rand(0, 4)],
    'dir' => DIRECTIONS[rand(0, 3)],
], $hive['ants']);

// Json output format sample:
// {'orders': [
//	 {'antId':1,'act':'move','dir':'down'},
//	 {'antId':17,'act':'load','dir':'up'}
// ]}
echo json_encode([
    'orders' => $orders,
]);