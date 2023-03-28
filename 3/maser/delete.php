<?php
require("../conn.php");
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $sql="DELETE FROM food WHERE id='$id'";
    mysqli_query($con,$sql);
    header("Location:../admin.php");
}else{
    header("Location:../admin.php");
};

?>