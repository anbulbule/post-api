<?php
$con = new mysqli("localhost","id20032196_root","_W>d45b=r06kjZ++","id20032196_test") or die("Connection failed");
    
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-control-Allow-Origin: *');
    header('Access-control-Allow-header: Content-Type, Access-Control-Allow-Method, Access-control-Allow-header');

    // X-Requested-With - security purpose, its only allows ajax data;

    
    
    $data = json_decode(file_get_contents("php://input"),true);
    
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    if($data){
    $sname = $data['stu_name'];
    $semail = $data['email'];
    $spassword = $data['password'];
    $user_id = generateRandomString();

        $sql = "insert into student (stu_name,email,password,user_id) values('$sname','$semail','$spassword','$user_id')";

        if($result = $con->query($sql)){
            echo json_encode(array('message'=>'data inserted successfully','status'=>'true'));
        }
    }else{
        echo json_encode(array('message'=>'Please insert data','status'=>'false'));
    }
    


?>