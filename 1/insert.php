<?php
    session_start();
    require "funcs.php";
    $title=$_POST["title"];
    $price=$_POST["price"];
    $description=$_POST["description"];
    $file=$_POST["image"];
    $result=evaluate($title,$file,$description,$price);
   
    if(!empty($result["desc"]) or !empty($result["price"]) or !empty($result["img"]) or !empty($result["title"])){
        $_SESSION["desc"]=$result["desc"];
        $_SESSION["price"]=$result["price"];
        $_SESSION["image"]=$result["img"];
        $_SESSION["title"]=$result["title"];
        header("Location:index.php");
    }else{
        $_SESSION["desc"]="";
        $_SESSION["price"]="";
        $_SESSION["image"]="";
        $_SESSION["title"]="";
        $sql="INSERT INTO products(title, price, img, description) VALUES ('$title', $price, '$file', '$description')";
        mysqli_query($con,$sql);
        header("Location:index.php");
        die;
    }
?>