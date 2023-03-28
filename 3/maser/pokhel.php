<?php
require("../conn.php");
if(isset($_GET["submit"])){
    $title=$_GET["title"];
    $price=$_GET["price"];
    $description=$_GET["description"];
    $image=$_GET["img"];
    $id=$_GET["submit"];
    $sql="UPDATE food SET title='$title',price=$price,description='$description',image='$image' WHERE id='$id'";
    mysqli_query($con,$sql);
    header("Location:../admin.php");
}else{
    header("Location:admin.php");
};

?>