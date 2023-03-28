<?php
if(isset($_POST["reg_submit"])){
    require("conn.php");
    $name=mysqli_real_escape_string($con,$_POST["name"]);
    $email=mysqli_real_escape_string($con,$_POST["email"]);
    $i_password=mysqli_real_escape_string($con,$_POST["password"]);
    $password=md5($i_password);
    $sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
    mysqli_query($con,$sql);
    header("Location:account.php");
}else{
    header("Location:account.php");
}