<?php
if(isset($_POST["send"])){
    require "funcs.php";
    $id= $_POST["send"];
    $sql="DELETE FROM products WHERE id=$id";#
    mysqli_query($con,$sql);
    header("Location:index.php");
}

?>