<?php
// Set header untuk JSON
header('Content-Type: application/json');

// Periksa apakah ada data yang dikirim melalui POST
$data = json_decode(file_get_contents('php://input'), true);

// Cek apakah data yang dibutuhkan ada
if (isset($data['username']) && isset($data['password'])) {
    // Jika ada, kirimkan kembali dalam bentuk JSON
    $response = [
        'status' => 'success',
        'message' => 'Data received successfully',
        'username' => $data['username'],
        'password' => $data['password']  // Jangan pernah mengirim password asli dalam respons
    ];
} else {
    // Jika data tidak lengkap
    $response = [
        'status' => 'error',
        'message' => 'Invalid input data'
    ];
}

// Kirimkan respons dalam format JSON
echo json_encode($response);
