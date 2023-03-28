<?php
require("config/con1.php");
$error=array(
    "name"=>"",
    "password"=>"",
);
    $name=mysqli_real_escape_string($con,$_POST["name"]);
    $password=mysqli_real_escape_string($con,$_POST["password"]);
    if(trim($name) == ''){
        $error["name"]="name is empty";
    }
    if(trim($password) == ''){
        $error["password"]="Password is empty";
    }
    $save_password=md5($password);
    if($error["name"]=="" && $error["password"]==""){
        $sql="SELECT * FROM admin_data WHERE admin_name='$name' and admin_password='$save_password'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            session_start();
            while($row=mysqli_fetch_assoc($result)){
                $_SESSION["user_id"]=$row["id"];
            };
        echo "true";
        die;
        }else{
            session_start();
            $_SESSION["user_id"]='';
            echo "false";
            die;
        }
    }else{
        echo  json_encode($error);
    }
?>