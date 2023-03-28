<div class="card">
    <div class="col s12 l6">
        <div class="card">
        <div class="card-image">
        <img src="<?php echo $row["img"]?>" alt="img" height="200px">
        <a class="btn-floating pink pulse halfway-fab">
            <i class="material-icons">favorite</i>
        </a>
    </div>
    <div class="card-content">
        <span class="card-title"><?php echo $row["title"]?></span>
        <p><?php echo $row["description"]?></p>
        <p> 
            <form action="change.php" method="post">
                <input type="number" value="<?php echo $row["price"]?>" name="number"/>
                <input type="hidden" value="<?php echo $row["id"]?>" name="id"/>
                <input type="submit" value="Send" class="btn" name="sbm">
            </form>
        </p>
        
    </div>
    <div class="card-action">
        <a href="#">More Details</a>
        <a href="#">View Ingredients</a>
    </div>
    </div>
        </div>
</div> 