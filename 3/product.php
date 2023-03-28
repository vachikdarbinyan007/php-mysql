<div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/<?php echo $row["image"]; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $row["title"]; ?></h4>
                    <p class="food-price">$<?php echo $row["price"]; ?></p>
                    <p class="food-detail">
                        <?php echo $row["description"]; ?>
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
</div>