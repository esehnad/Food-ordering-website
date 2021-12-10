<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
          if(isset($_SESSION['order']))
          {
              echo $_SESSION['order'];
              unset($_SESSION['order']);
          }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <br><br><br>

            <?php 
                    //create sql query to display categories from database
                    $sql = "SELECT * FROM tbl_category where active = 'Yes' and featured = 'Yes' LIMIT 3";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if($count>0)
                    {
                         //categories available
                         while($row=mysqli_fetch_assoc($res))
                         {
                             //get the values like title image and id
                             $id = $row['id'];
                             $title = $row['title'];

                             ?>
                                   <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                      <div class="box-3 float-container">
        
                        
                           <h3 class="float-text"><?php echo $title; ?></h3>
                         </div>
                         </a>
           
                             <?php
                         } 
                    }
                    else
                    {
                        //categories not available
                        echo "<div class = 'error'> Category not added.</div>";
                    }
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

            $sql2 = "SELECT * FROM tbl_food where active='Yes' and featured = 'Yes' LIMIT 6";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res);
            if($count2>0)
            {
                while($row = mysqli_fetch_assoc($res2))
                {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];

                ?>

                     <div class="food-menu-box">
                <div class="food-menu-img">
                    
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price"><?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                <?php
                }

            }
            else
            {
                echo "<div class='error'> Not available</div>";
            }

            ?>


      
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>