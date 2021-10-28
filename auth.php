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
// echo "Connected successfully";

// validation and processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = array("result" => false);
    $email =trim($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(json_encode($response));
    }
    $password =trim($_POST["password"]);
    $sql = "SELECT password,first_name,last_name FROM user_info WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
      die(json_encode($response));
    } 
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $name= $row["first_name"]." ". $row["last_name"];
        $db_password = $row["password"];
    
        if (password_verify($password , $db_password)) {
          $response["result"] = true;
          $_SESSION["name"] = $name;
      }}
    }}
    echo(json_encode($response));
?>