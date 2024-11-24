<?php
// Set header untuk JSON
header('Content-Type: application/json');

// Ambil data dari query string
$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// Jika data tidak ditemukan, kirimkan pesan kesalahan
if (empty($search)) {
    $response = [
        'status' => 'error',
        'message' => 'Search query is required.'
    ];
} else {
    // Jika ada data, kirimkan respons yang sesuai
    $response = [
        'status' => 'success',
        'message' => 'Search results for your query.',
        'search' => $search,
        'filter' => $filter
    ];
}

// Kirimkan respons dalam format JSON
echo json_encode($response);
