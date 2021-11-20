<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_info";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sender_id = $_POST["sender_id"];
$receiver_id = $_POST["receiver_id"];
$sender_Channel_id = $_POST["sender_Channel_id"];
$receiver_Channel_id = $_POST["receiver_Channel_id"];
$response=array();
$sql = "SELECT type,file_name,extension,chat,sender_id,receiver_id,time FROM chat WHERE sid='$sender_Channel_id' OR sid='$receiver_Channel_id'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()){
    $response[]=$row;
}

echo(json_encode($response));

?>