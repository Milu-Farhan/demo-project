<?php
session_start();
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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $email = trim($_POST["email"]);
   $response = array("result" => false);
   $OTP = rand(100000,999999);
   $response["email"] = $email;
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["error"] = true;
        die(json_encode($response));
    }

    $sql = "SELECT * FROM user_info WHERE email='$email' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
        $response["error"]=  true;
        die(json_encode($response));
    } else {
         $to_email = "darelover16@gmail.com";
         $subject = "Password Reset";
         $body = "You are one time password is  ". $OTP ;
         $header = "from: testingpurpose1609@gmail.com";

         if (mail($to_email,$subject,$body,$header)) {
            $response["result"] = true;
            $_SESSION["email"]= $email;
            $DBsql = "UPDATE user_info SET OTP='$OTP' WHERE email='$email' ";
            $Dbresult = $conn->query($DBsql);
         } else
            $response["merror"] = true;
      } 
    }
    die(json_encode($response));
    ?>