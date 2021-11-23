<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "user_info";

$conn = new mysqli($servername, $username, $password,$dbname);
$response = array();
$id = $_SESSION['id'];
$sql = "SELECT id,first_name,last_name,dp FROM user_info WHERE NOT id = '$id'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
    $response[]= $row;
};


echo (json_encode($response));
?>