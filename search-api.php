<?php
header('Content-Type: application/json');

// Get JSON input from Axios
$data = json_decode(file_get_contents('php://input'), true);

// Simulate a response based on the search keyword
$keyword = isset($data['keyword']) ? trim($data['keyword']) : '';

// Example response
$response = [
    'message' => "You searched for '{$keyword}'",
    'results' => [
        // Normally you'd query a database here
        ['id' => 1, 'name' => 'Call of Duty', 'price' => 59],
        ['id' => 2, 'name' => 'FIFA 24', 'price' => 49]
    ]
];

// Return JSON
echo json_encode($response);
exit;
?>
