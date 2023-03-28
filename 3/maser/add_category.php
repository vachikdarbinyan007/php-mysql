<?php
require("../conn.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title=$_POST["title"];
    $file=$_POST["file"];
    $features=$_POST["features"];
    $active=$_POST["active"];
    $save_title=mysqli_real_escape_string($con,$title);
    $save_file=mysqli_real_escape_string($con,$file);
    $save_features=mysqli_real_escape_string($con,$features);
    $save_active=mysqli_real_escape_string($con,$active);
    $sql="INSERT INTO category(title,img_name,features,active) VALUES('$save_title','$save_file','$save_features','$save_active')";
    mysqli_query($con,$sql);
    header("Location:../admin.php");
};
?>