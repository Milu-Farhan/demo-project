<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION ["email"];
    $response = array("result" => false);
    $newPassword =trim($_POST['new_password']);
    $confirmPassword =trim($_POST['confirm_password']);
    $hashPassword = password_hash($confirmPassword,PASSWORD_DEFAULT);
    if ($newPassword != $confirmPassword) {
        die(json_encode($response));
    }

    if ($newPassword == $confirmPassword) 
    { 
        $response["result"] = true;
        $sql = "UPDATE user_info SET Password='$hashPassword' WHERE email='$email' ";
        $result = $conn->query($sql);
    }
};
 echo(json_encode($response));
?>