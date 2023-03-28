<?php
session_start();
if(isset($_SESSION["userid"])){
    $user=$_SESSION["userid"];
}else{
    $user="100";
}
$con=mysqli_connect("localhost","root","","mysqli_db1");
$sql_1="SELECT * FROM products";
$result=mysqli_query($con,$sql_1);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="grey lighten-1">
    <div>
        <nav class="nav-wrapper">
            <div class="container">
            <a href="#" data-target="menu_mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="#" class="brand-logo">
                MyLogo
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li class="row">
                    <div class="col s12">
                    <a href="login.php" class="row">
                    <div class="col s5">
                    Login 
                    </div>
                    <div class="col s3">
                    <i class="material-icons">login</i>
                    </div>
                    </a>
                    </div>
                </li>
            </ul>
            <ul class="sidenav grey  lighten-2" id="menu_mobile">
                <li><a href="sass.html">Home</a></li>
                <li>
                    <a href="login.php">
                        <i class="material-icons">login</i>Login
                    </a>
                </li>
            </ul>
            </div>
        </nav>
    </div>
    <?php
     $sql="SELECT * FROM users WHERE id=$user";
     $ard=mysqli_query($con,$sql);
     while($row=mysqli_fetch_assoc($ard)){
         if($row["status"] == "1"){
                 include "addbar.php";
         }else{
            
         }
     }
    ?>

    <div class="container">
        <div class="row">
            <div class="col red-text">
            <?php
            if(isset($_SESSION["desc"])){
                echo $_SESSION["desc"];
            };
            if(isset($_SESSION["title"])){
                echo $_SESSION["title"];
            };
            if(isset($_SESSION["image"])){
                echo $_SESSION["image"];
            };
            if(isset($_SESSION["price"])){
                echo $_SESSION["price"];
            };
            ?>
            </div>
        </div>
    </div>
    <div class="container section">
        <div class="row">
            <?php
            $sql="SELECT * FROM users WHERE id=$user";
            $ard=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($ard)){
                if($row["status"] == "1"){
                    while($row=mysqli_fetch_assoc($result)){
                        include "product.php";
                    }
                }else{
                    while($row=mysqli_fetch_assoc($result)){
                        include "product-user.php";
                    }
                }
            }
            ?>
        </div>
    </div>
    <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Insert Details</h4>
       <form class="col s12" action="insert.php" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" type="text" class="validate" name="title">
          <label for="title">Title</label>
        </div>
        <div class="input-field col s6">
          <input id="price" type="number" class="validate" name="price">
          <label for="price">Price</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
        <textarea id="desc" class="materialize-textarea" name="description"></textarea>
        <label for="desc">Description</label>
        </div>
      </div>
      <div class="row">
      <div class="file-field input-field">
      <div class="btn">
        <span>Choose Image</span>
        <input type="file" name="image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
      </div>
    </div>
    <div class="modal-footer">
        <button class="btn-large modal-close">Add to cart</button>
    </form>
    </div>
    </div>
        <h3 class=" grey lighten-3">Newest</h3>
        <div class="carousel">
         <?php
            $sql_2="SELECT * FROM products LIMIT 20";
            $a=mysqli_query($con,$sql_2);
            while($row=mysqli_fetch_assoc($a)){
                include "slide-item.php";
            };
         ?>
    </div>        
    <h3 class=" grey lighten-3">Oldest</h3>
        <div class="carousel">
         <?php
            $sql_3="SELECT * FROM products ORDER BY id  DESC LIMIT 20";
            $a=mysqli_query($con,$sql_3);
            while($row=mysqli_fetch_assoc($a)){
                include "slide-item.php";
            };
         ?>
    </div> 
    <div class="container">
    <h3 class=" grey lighten-3">Oldest</h3>
        <div class="carousel carousel-slider">
         <?php
            $sql_3="SELECT * FROM products ORDER BY id  DESC LIMIT 20";
            $a=mysqli_query($con,$sql_3);
            while($row=mysqli_fetch_assoc($a)){
                include "slide-item-2.php";
            };
         ?>
    </div> 
    </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
           document.addEventListener('DOMContentLoaded', function() {
            let elems = document.querySelectorAll('.sidenav');
            let instances = M.Sidenav.init(menu_mobile, open());
            });
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems, open());
            });
            document.addEventListener('DOMContentLoaded', function() {
            let elems = document.querySelectorAll('.carousel');
           let instances = M.Carousel.init(elems, open());
             });
             document.addEventListener('DOMContentLoaded', function() {
            let elems = document.querySelectorAll('.carousel-slider');
           let instances = M.Carousel.init(elems, open());
             });
    </script> 
</body>
</html>