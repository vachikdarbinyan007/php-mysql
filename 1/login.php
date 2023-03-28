<?php
session_start();
// require "funcs.php";
$con=mysqli_connect("localhost","root","","mysqli_db1");
$sql="SELECT * FROM products";
$result=mysqli_query($con,$sql);
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
            </ul>
            <ul class="sidenav grey  lighten-2" id="menu_mobile">
                <li><a href="sass.html">Home</a></li>
               
            </ul>
            </div>
        </nav>
    </div>
    <div class="card">
    <div class="card-content">
    <form class="col s12" action="set_session.php" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input type="text" class="validate" name="title" id="title">
          <label for="title">Name</label>
        </div>
        <div class="input-field col s6">
          <input type="text" class="validate" name="password" id="price">
          <label for="price">Password</label>
        </div>
      </div>
    </div>
    <div class="card-action">
        <button class="btn-large modal-close" name="sbm">SEND</button>       
    </div>
    </div>
    </form>
    </div>
</body>
</html>