<?php

$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "user_info";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $newPassword = trim($_POST["new_password"]);
    $confirmPassword = trim($_POST["confirm_password"]);
    $response = array("result" => false);
    $dp = "avatar.png";
    if ($first_name == "") {
        $response["message"] = 1;
        die(json_encode($response));
    }
    if ($last_name == "") {
        $response["message"] = 2;
        die(json_encode($response));
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["message"] = 3;
        die(json_encode($response));
    }

    $sql = "SELECT * FROM user_info WHERE email='$email' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $response["message"]= 4;
        die(json_encode($response));
    }

    if ($newPassword == "") {
        $response["message"] = 5;
        die(json_encode($response));
    } 
    
    if (strlen($newPassword) < 8) {
        $response["message"] = 6;
        die(json_encode($response));
    }

    if ($confirmPassword == "") {
        $response["message"] = 7;
        die(json_encode($response));
    }

    if (($confirmPassword) != ($newPassword)) {
        $response["message"] =  8;
        die(json_encode($response));
    }
    
    $hash = password_hash($confirmPassword , PASSWORD_DEFAULT);
    if (password_verify($confirmPassword,$hash)) {
        $response["123"] = "verified";
    } else { 
        $response["23"] = "not verified";
    } 
    $sql = "INSERT INTO `user_info` (`first_name`,`last_name`,`email`,`password`,`dp`) VALUES('$first_name','$last_name','$email','$hash','$dp')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        $response["result"]=true;
        $response["Uploaded"]="data created";
    } else {
        $response["result"]=false;
        $response["upload-error"]="upload error";
    }
    $conn->close();
}
die(json_encode($response));
?>