<?php
session_start();
if(isset($_SESSION["user_id"])){
    $id=$_SESSION["user_id"];
    require("config/con1.php");
    $sql="SELECT * FROM users WHERE id=$id";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
      
    }else{
     header("Location:index.php");
     die;
    }
}else{
    header("Location:index.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bjsihk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
    body{
        height: 100vh;
    }

</style>
<body class="grey lighten-2">
    <h3>Hello <?php
      while($row=mysqli_fetch_assoc($result)){
       echo $row["name"];      
      }
    ?></h3>
    <?php
    $sql="SELECT * FROM medicine WHERE user_id='$id'";
    $result=mysqli_query($con,$sql);
    ?>
    <table>
        <tr>
            <th>Date</th>
            <th>Medicine</th>
            <th>Doctor</th>
        </tr>
        <tr>
            <?php
            while($row=mysqli_fetch_assoc($result)){
                echo "<td>".$row["date"]."</td>";
                echo "<td>".$row["name"]."</td>";
                $sql="SELECT doctors.name,users.id FROM users,doctors WHERE doctors.doctor_id=users.doctor_id and users.id=$id";
                $ard=mysqli_query($con,$sql);
                while($togh=mysqli_fetch_assoc($ard)){
                    echo "<td>".$togh["name"]."</td>";
                }
            }      
            ?>
        </tr>
    </table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>