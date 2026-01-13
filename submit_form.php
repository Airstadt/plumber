<?php
// Show errors while testing
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Replace with your actual InfinityFree database credentials
$host = "sql106.infinityfree.com";  // Example host — check your panel
$username = Hyv"if0_39255803";
$password = "IwhYxA7au4vu";
$database = "if0_39255803_ServiceRequestDB"; // This must match your DB name
$table = "CustomerRequest"; // Replace with the actual table name

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and get the form data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$message = $conn->real_escape_string($_POST['message']);

// Insert data into the database
$sql = "INSERT INTO $table (Timeident, firstlastName, CustomerEmail, CustomerPhoneNumber, CustomerRequests)
        VALUES (NOW(), '$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Request submitted successfully! ;
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>
