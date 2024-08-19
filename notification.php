<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "pindahmudah";

$conn = new mysqli($servername, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT * FROM customer WHERE status = 'confirmed'";
$result = $conn->query($sql);

$notifications = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $notifications[] = array(
            'id' => $row['id'],
            'status' => 'confirmed'
        );
    }
}

echo json_encode($notifications);

$conn->close();
?>