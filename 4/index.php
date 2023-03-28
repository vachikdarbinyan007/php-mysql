<?php
error_reporting(-1);
ini_set("display_errors","on");
$username="shop";
$password="123";
$dsn="mysql:host=localhost;dbname:shop;charset:utf8";
$sql="SELECT id,title,description,price FROM products";
$db= new PDO($dsn,$username,$password);
$result=$db->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photography</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="nav-wrapper grey section">
            <a href="#" class="brand logo center">
                <h4 class="black-text" id="cap">Willkommen auf meinem Online Shop</h4>
            </a>
        </nav>
    </header>
        <div class="row">
            <div class="col s12 l3">
                <!--<?php  // while($row=$result->fetch()): ?>
                    <div class="col s12 l3">
                        <?php
                        include "card.php";
                        ?>
                    </div>
                <?php // endwhile;?> -->
            </div>
        </div>               
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>