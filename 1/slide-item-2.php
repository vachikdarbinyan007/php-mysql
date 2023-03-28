 <a class="carousel-item">
    <div class="card">
    <div class="card-image">
    <img src="<?php echo $row["img"]?>" class="responsive-image" style="max-height:200px;">
    </div>
    <div class="card-content">
    <span class="card-title"><?php echo $row["title"]?></span>
    <p><?php echo $row["price"]?>&euro; <br>
    <form action="delete.php" method="post">
    <button class="btn" value="<?php echo $row["id"]?>" name="send">Delete</button>
    </form>
    </p>
    <p style="overflow:hidden; text-overflow: ellipsis; ">
        <?php
        echo $row["description"]?>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
    </p>
    </div>
    </div>
</a>