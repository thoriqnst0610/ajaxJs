<?php
// Set the response header to indicate JSON content type
header('Content-Type: application/json');

// Check if the required data is received through POST
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Get the username and password from the POST request
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the response array
    $response = [
        'status' => 'success',
        'message' => 'Data received successfully',
        'username' => $username,
        'password' => $password // Please note: In production, never send back passwords
    ];
} else {
    // If the data is not received properly
    $response = [
        'status' => 'error',
        'message' => 'Invalid input data'
    ];
}

// Send the JSON response back to the client
echo json_encode($response);
