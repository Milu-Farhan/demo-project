<?php

include('vendor/autoload.php');


$app_id = "1291910";
$app_key = "d1342b62982772246dd7";
$app_secret = "da1f2a93eec8ea9e1581";
$app_cluster = "ap2";

$pusher = new Pusher\Pusher( $app_key, $app_secret, $app_id, array('cluster' => $app_cluster) );

$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];
$senderName = $_POST['sender_name'];
$channel_id = $_POST["channel_id"];
$dp = $_POST["dp"];
$time= $_POST["sendTime"];
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['type'] == "text"){

$message = $_POST['message'];
$response= array ("message" => $message, "sender_name"=>$senderName);
$response["name"] = $senderName;

 $data['response'] = array(
    'type' => $_POST['type'],
    'name' => $senderName,
    'message' => $message,
    'dp' => $dp,
    'time' => $time 
);
$pusher->trigger($channel_id, 'message', $data);
$response["messageStatus"] = true;

} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['type'] == "mms") {
    $basename = basename($_FILES["file"]["name"]);
    $extension = strtolower(pathinfo($basename,PATHINFO_EXTENSION));
    $allowed = array('jpeg','jpg','png','gif','pdf');
    
    if (in_array($extension,$allowed)) {
        if ($extension != "pdf") {
            $newName = "Img".$senderName. time().rand(100000,999999).".".$extension;
        $targetFilePath = "../upload_data/image-files/".$newName;
        } else{
            $newName = $_FILES['file']['name'];
            $targetFilePath = "../upload_data/files/".$newName;}
        
    

        if (move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)) {
            $data['response'] = array(
                'type' => $_POST['type'],
                'name' => $senderName,
                'dp' => $dp,
                'fileName' => $newName,
                'time' => $time,
                'extension' => $extension);
                
            $pusher->trigger($channel_id, 'message', $data);
            $response["fileName"] = $newName;
            $response["messageStatus"] = true;
    }
    } else {
        $response["messageStatus"] = false;
    }} else {
        $response["messageStatus"] = false;
    }
echo (json_encode($response));
?>