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
    #menu{
        position: absolute;
        left: 90%;
        top: 100%;
    }
    @media screen and (max-width: 900px) {
        #menu {
        top:120%;
        }
    }
</style>
<body class="black white-text">
    <h3>Adminpanel:</h3>
    <table>
        <tr>
            <th>Doctor</th>
            <th>Patients Number:</th>
        </tr>
        <?php
        $sql="SELECT d.name, COUNT(d.doctor_id) FROM doctors d INNER JOIN users u WHERE d.doctor_id = u.doctor_id GROUP BY d.name;";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row["name"]."</td><td>".$row["COUNT(d.doctor_id)"]."</td></tr>";
        }
        ?>
    </table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!--SELECT doctors.name,doctors.doctor_id,users.name FROM doctors,users WHERE doctors.doctor_id=users.doctor_id;
SELECT d.name, COUNT(d.doctor_id) FROM doctors d INNER JOIN users u WHERE d.doctor_id = u.doctor_id GROUP BY d.name; -->
</body>
</html>