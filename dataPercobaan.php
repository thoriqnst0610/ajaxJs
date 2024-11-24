<?php
// Set the response header to indicate JSON content type
header('Content-Type: application/json');

// Create an associative array to hold the response data
$response = [
    'response' => 'Hello, World!' // The value to be sent as JSON
];

// Encode the array as JSON and send it to the client
echo json_encode($response);
