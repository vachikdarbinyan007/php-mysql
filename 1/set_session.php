<?php
if(isset($_POST["sbm"])){
    $name= $_POST["title"];
    $password= $_POST["password"];
    $con=mysqli_connect("localhost","root","","mysqli_db1");
    $real_name=mysqli_real_escape_string($con,$name);
    $real_password=mysqli_real_escape_string($con,$password);
    $real_password=md5($real_password);
    $sql="SELECT * FROM users WHERE password='$real_password' and user_name='$real_name'";
    $sql2="SELECT * FROM admin WHERE password='$real_password' and name='$real_name'";
    $result=mysqli_query($con,$sql);
    $result2=mysqli_query($con,$sql2);
    if(mysqli_num_rows($result) > 0){
        session_start();
        while($row=mysqli_fetch_assoc($result)){
            $_SESSION["userid"]=$row['id'];
           header("Location:index.php");
        };
    }else if(mysqli_num_rows($result2)>0){
        header("Location:admin.php");
    }
    }else{
    header("Location:login.php");
    $_SESSION["userid"]="0";
    };
?>