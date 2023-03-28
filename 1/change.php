<?php
    require "funcs.php";
    if(isset($_POST["sbm"])){
        $id=$_POST["id"];
        $price=$_POST["number"];
        $sql="UPDATE `products` SET price=$price WHERE id='$id'";
        mysqli_query($con,$sql);
        header("Location:index.php");
    };
?>