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

// $demo = basename();
// echo $demo;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_SESSION["email"];
    $OTP = trim($_POST["otp"]);
    $response = array("result" => false);
    $sql = "SELECT * FROM user_info WHERE email='$email' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
      die(json_encode($response));
    } 
    if ($result->num_rows == 1){
        while ($row = $result->fetch_assoc()){
            if ($row["OTP"] == $OTP) {
                $response["result"] = true;
            }
        }   
    } 
}
die(json_encode($response));

?>