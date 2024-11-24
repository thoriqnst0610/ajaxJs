<?php
// Set header untuk JSON
header('Content-Type: application/json');

// Pastikan request adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data username dan password dari form
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Cek jika ada file yang diupload
    if (isset($_FILES['profile'])) {
        $file = $_FILES['profile'];

        // Tentukan folder tujuan untuk menyimpan file
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Jika folder belum ada, buat folder uploads
        }

        // Tentukan path file untuk menyimpan
        $filePath = $uploadDir . basename($file['name']);

        // Pindahkan file yang diupload ke folder uploads
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $fileStatus = "File uploaded successfully: " . $filePath;
        } else {
            $fileStatus = "Failed to upload file.";
        }
    } else {
        $fileStatus = "No file uploaded.";
    }

    // Kirimkan respons berupa JSON dengan data yang diterima
    $response = [
        'status' => 'success',
        'message' => 'Registration successful!',
        'username' => $username,
        'password' => $password,  // Jangan kirim password dalam aplikasi nyata
        'fileStatus' => $fileStatus
    ];

    // Kirimkan respons dalam format JSON
    echo json_encode($response);
} else {
    // Jika bukan POST request
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
}
