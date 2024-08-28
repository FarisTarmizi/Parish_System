<?php
include 'db_config.php';

// Create a new record
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    // Extract data and perform an INSERT query
    // Example: INSERT INTO your_table (column1, column2) VALUES (?, ?)
}

// Read data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Implement queries to retrieve data
    // Example: SELECT * FROM your_table
}

// Update a record
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    // Extract data and perform an UPDATE query
    // Example: UPDATE your_table SET column1 = ?, column2 = ? WHERE id = ?
}

// Delete a record
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Extract the ID from the request and perform a DELETE query
    // Example: DELETE FROM your_table WHERE id = ?
}

// Close the database connection
$conn->close();
?>
