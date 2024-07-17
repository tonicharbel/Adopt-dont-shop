<?php
header('Content-Type: application/json');

$markers =
 [
    ['lat' => 33.8938, 'lng' => 35.5018, 'name' => 'Beirut'],
    ['lat' => 34.4367, 'lng' => 35.8497, 'name' => 'Tripoli'],
    ['lat' => 34.1231, 'lng' => 35.6518, 'name' => 'Byblos'],
];

echo json_encode($markers);
?>
