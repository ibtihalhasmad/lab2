<?php
if (!isset($_POST)) {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
    die();
}
    include_once("dbconnect.php");
    $email =  $_POST['email'];
    $name = addcslashes($_POST['name']);
    $phone = $_POST['phone'];
    $homeaddress = $_POST['homeaddress'];
    $base64Image= $_POST['image'];
    $gender = $_POST['gender'];

$sqlinsert ="INSERT INTO `mytutormobile`(`user_email`, `user_name`, `user_phone`, `user_homeaddress`, `user_gender`)
 VALUES ('$email','$name','$phone','$homeaddress','$gender')";
    if ($conn->query($sqlinsert) === TRUE) {
        $response = array('status' =>'status','data' =>null);
        $filename = mysqli_insert_id($conn);
        $decoded_string = base64_decode($base64image);
        $path = '../assets/users/' . $filename . '.jpg';
        $is_written = file_put_contents($path, $decoded_string);
        sendJsonResponse($response);
    } else {
        $response = array('status' => 'failed', 'data' => null);
        sendJsonResponse($response);
    

    }
    function sendJsonResponse($sentArray)
{
    header('Content-Type: application/json');
    echo json_encode($sentArray);
}
?>