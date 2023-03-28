<a class="carousel-item">
    <div class="card">
    <div class="card-image">
    <img src="<?php echo $row["img"]?>" style="max-height:100px;">
    </div>
    <div class="card-content">
    <span class="card-title"><?php echo $row["title"]?></span>
    <p><?php echo $row["price"]?>&euro; <br>
        <button class="btn">Add to cart <i class="material-icons">add_shopping_cart</i></button>
    </p>
    <p style="overflow:hidden; text-overflow: ellipsis; ">
        <?php
        echo $row["description"]?>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
    </p>
    </div>
    </div>
</a>