<div class="card swiper-slide">
             <div class="image-content">
        <span class="overlay"></span>
        <div class="card-image">
            <img src="images/<?=$row["image"]?>" alt="" class="card-img">
        </div>
    </div>
    <div class="card-content">
        <h2 class="name"><?=$row["title"]?></h2>
        <p class="description"><?=$row["description"]?></p>
   <button class="button"><?=$row["price"]?></button>
    </div>
</div>