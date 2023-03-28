<?php
 require("../conn.php");
 if(isset($_GET["id"])){
    $id=$_GET["id"];
    $sql="SELECT * FROM food WHERE id='$id'";
    $result=mysqli_query($con,$sql);
 }else{
    header("Location:admin.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <?php while($row=mysqli_fetch_assoc($result)):?>

        <div class="food-menu-box">
                <form action="pokhel.php" method="get">
                <div class="food-menu-img">
                    <input type="file" name="img" value="<?=$row["image"]?>">
                </div>

                <div class="food-menu-desc">
                    <input type="text" name="title" value="<?=$row["title"]?>">
                    <input type="number" name="price" value="<?=$row["price"]?>" >
                    <input type="text" name="description" value="<?=$row["description"]?>">
                <button value="<?=$row["id"]?>" name="submit">Edit</button>
            </div>
                </form>
            </div>
    <?php endwhile; ?>
</body>
</html>