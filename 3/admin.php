<?php
session_start();
if(isset($_SESSION["adminid"])){
    require("conn.php");
    $sql="SELECT * FROM category";
    $result=mysqli_query($con,$sql);
    $sql="SELECT * FROM food";
    $food=mysqli_query($con,$sql);
}else{
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<nav>
    <div class="nav-wrapper">
    <a href="#" data-target="menu_mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <a href="#" class="brand-logo">Contact</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
      </ul>
      <ul class="sidenav grey  lighten-2" id="menu_mobile">
                <li><a href="index.php"><i class="material-icons">arrow_back</i>Home</a></li>
    </ul>
    </div>
  </nav>
    <div class="container">
        <h3>Add new Category</h3>
    <form action="maser/add_category.php" method="post">
        <div class="input-field">
            <input type="text" id="title" name="title"/>
            <label for="title">Title</label>
        </div>
        <div class="file-field input-field">
        <div class="btn indigo">
            <span>File</span>
            <input type="file" name="file">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
        <div class="input-field">
            <input type="text" id="features" name="features"/>
            <label for="features">Features</label>
        </div>
        <div class="input-field">
            <input type="text" id="active" name="active"/>
            <label for="Active">Active</label>
        </div>
        <div class="input-field">
            <button class="btn indigo">Submit</button>
        </div>
    </form>
    <h3>Add new Product</h3>
    <form action="maser/add_product.php" method="post">
        <div class="input-field">
            <input type="text" id="title" name="title"/>
            <label for="title">Title</label>
        </div>
        <div class="input-field">
                <textarea name="descr" id="descr" class="textarea"></textarea>
            <label for="descr">Descr.</label>
        </div>
        <div class="file-field input-field">
        <div class="btn indigo">
            <span>File</span>
            <input type="file" name="file">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
        <div class="input-field">
            <input type="number" id="price" name="price"/>
            <label for="price">Price</label>
        </div>
        <div class="input-field">
            <select name="select" id="select" style="display:block;">
                <?php
                while($row=mysqli_fetch_assoc($result)){
                    echo "<option value=".$row["id"].">".$row["title"]."</option>";
                };
                ?>
            </select>
        </div>
        <div class="input-field">
            <input type="text" id="features-" name="features"/>
            <label for="features-">Features</label>
        </div>
        <div class="input-field">
            <input type="text" id="active-" name="active"/>
            <label for="active-">Active</label>
        </div>
        <div class="input-field">
            <button class="btn indigo">Submit</button>
        </div>
    </form>
    </div>
    <div class="container">
        <h3>Delete Products</h3>
            <table>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>
                <?php while($row=mysqli_fetch_assoc($food)):?>
                    <tr>
                        <td><?=$row["title"]?></td>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["price"]?></td>
                        <td><img src="images/<?=$row["image"]?>" alt="" width="50px"></td>
                        <td><a href="maser/edit.php?id=<?=$row["id"]?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="maser/delete.php?id=<?=$row["id"]?>"><i class="material-icons">delete</i></a></td>
                    </tr>
                <?php endwhile; ?>
            </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
          document.addEventListener('DOMContentLoaded', function() {
            let elems = document.querySelectorAll('.sidenav');
            let instances = M.Sidenav.init(menu_mobile, open());
            });
    </script>
</body>
</html>