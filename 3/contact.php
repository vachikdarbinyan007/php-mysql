<?php
require("conn.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $password=$_POST["password"];
    $email=$_POST["email"];
    $save_name=mysqli_real_escape_string($con,$name);
    $save_password=mysqli_real_escape_string($con,$password);
    $save_email=mysqli_real_escape_string($con,$email);
    $md5_password=md5($save_password);
    $sql="SELECT * FROM admin WHERE password='$md5_password' and name='$save_name' and email='$save_email'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION["adminid"]=$row["id"];
        }
        header("Location:admin.php");
    };
};
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Contact</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
   <?php
   include "header.php";
   ?>

    <h2 class="text-center">Contacts</h2>
    <div class="container">
    <form action="" method="post">
        <div class="input-field">
            <input type="text" id="name" name="name"/>
            <label for="name">Name</label>
        </div>
        <div class="input-field">
            <input type="email" id="email" name="email"/>
            <label for="email">E-Mail</label>
        </div>
        <div class="input-field">
            <input type="password" id="password" name="password"/>
            <label for="password">Password</label>
        </div>
        <div class="input-field">
            <button class="btn indigo">Submit</button>
        </div>
    </form>
    </div>
   <?php
   include "footer.php";
   ?>
</body>
</html>