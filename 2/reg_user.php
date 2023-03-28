<?php
require("config/con1.php");
$error=array(
    "name"=>"",
    "password"=>"",
    "illnes"=>"",
    "doctor_id"=>""
);
    $name=mysqli_real_escape_string($con,$_POST["name"]);
    $doctor_id=mysqli_real_escape_string($con,$_POST["doctor"]);
    $illnes=mysqli_real_escape_string($con,$_POST["illnes"]);
    $password=mysqli_real_escape_string($con,$_POST["password"]);
    if(trim($name) == ''){
        $error["name"]="name is empty";
    }
    if(trim($password) == ''){
        $error["password"]="Password is empty";
    }
    if(trim($illnes) == ''){
        $error["illnes"]="Illnes is empty";
    }
    if($doctor_id==""){
        $error["doctor_id"]="select is empty";
    }
    $save_password=md5($password);
    if($error["name"]=="" && $error["password"]=="" && $error["illnes"]=="" && $error["doctor_id"]==""){
        $sql="INSERT INTO users(name,password,illnes,doctor_id) VALUES('$name','$save_password','$illnes',$doctor_id)";
        mysqli_query($con,$sql);
        session_start();
        echo "tre";
    }else{
        echo  json_encode($error);
    }
?>