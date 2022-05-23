<?php
if (!isset($_POST)) {
    echo "failed";
    }
    include_once("dbconnect.php");
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $sqllogin = "SELECT * FROM mytutormobilr WHERE user_email = '$email' AND user_password = '$password'";
    $result = $conn->query($sqllogin);
    $numrow = $result->num_rows;
    if ($numrow > 0) {

        while ($row = $result->fetch_assoc()) {
            $user['id'] = $row['user_id'];
            $user['email'] = $row['user_email'];
            $user['name'] = $row['user_name'];
            $user['phone'] = $row['user_phone'];
            $user['address'] = $row['user_homeaddress'];
            $user['image'] = $row['user_image'];
            $user['gender'] = $row['user_gender'];
            $user['BOD'] = $row['user_BOD'];
        }
        $response = array('state'=>'success', 'data'=>$user);
        sendJasonResponse($response);
    }
    function sendJasonResponse($sendArray){
        header('Content-Type: application/json');
        echo json_encode($sendArray);
    }
            
       
?>