<?php
session_start();
require("conn.php");
if(isset($_COOKIE["password"]) or isset($_COOKIE["name"]) and $_COOKIE["name"]!=""){
    $sql="SELECT * FROM users WHERE name=".$_COOKIE["name"]."and password=".$_COOKIE["password"];
    $user=mysqli_query($con,$sql);
    echo "COOKIE NAME =". $_COOKIE["name"];
}else if(isset($_SESSION["user_id"])){
    $id=$_SESSION["user_id"];
    $sql="SELECT * FROM users WHERE id=$id";
    $user=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($user)){
        echo "Method= SESSION Name==".$row["name"];
    }
}else{
    echo "No Method";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/swiper@9.1.0/swiper-bundle.min.css" rel="stylesheet">
</head>
<style>
     .slide-container{
            max-width: 1120px;
            width: 100%;
            background:#fff;
            padding: 40px 0;
        }
        .slide-content{
          margin:0 40px;
           }
        .card{
           
            border-radius: 25px;
            background: white;
        }
        .image-content,
        .card-content{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 14px;
        }
        .image-content{
            position: relative;
            row-gap: 5px;
            padding: 25px 0;
        }
        .overlay{
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: #3e2bb9;
            border-radius: 25px 25px 0 25px;

        }
        .overlay::before,
        .overlay::after{
            content: "";
            position: absolute;
            right: 0;
            bottom: -40px;
            height: 40px;
            width: 40px;
            background: #3e2bb9;
        }
        .overlay::after{
            border-radius: 0 25px 0 0;
            background: #fff;
        }
        .card-image{
            position: relative;
            height: 150px;
            width: 150px;
            background: white;
            padding: 3px;
            border-radius: 50%;
        }
        .card-image .card-img{
            height: 100%;
            width: 100%;
            object-fit: cover;
            border: 4px solid gray;
            border-radius: 50%;
        }
        .name{
            font-size: 18px;
            font-weight: 500;
            color: #333;
        }
        .description{
            font-size: 18px;
            color: #222020;
            text-align:center;
           
  
        }
        .button{
            border:none;
            font-size: 16px;
            color: #fff;
            padding: 8px 16px;
            background: #3e2bb9;
            margin: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .button:hover{
            background: #241b58;
        }
</style>
<body>
   
    <?php include "header.php"; ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            $sql="SELECT * FROM category LIMIT 3";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                include("maser/category.php");
            };
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            $sql="SELECT * FROM food LIMIT 6";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                include "product.php";
            };
            ?>

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <div class="swiper slide-container ">
        <div class="slide-content">
           <div class="card-wrapper swiper-wrapper">   
           <?php 
            $sql="SELECT * FROM food";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                include "maser/slide.php";
            };
           ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        </div>
   
    <!-- fOOD Menu Section Ends Here -->

   <?php include "footer.php"; ?>
   <script src=" https://cdn.jsdelivr.net/npm/swiper@9.1.0/swiper-bundle.min.js"></script>
    <script>
         let swiper = new Swiper(".slide-content", {
          slidesPerView: 3,
          spaceBetween: 30,
          slidesPerGroup:3,
          loop:true,
          loopFillGroupWithBlank:true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
  },
        });
    </script>  
</body>
</html>