<?php include('partials-front/menu.php'); ?>

<?php
     //check whether id is passed or not
     if(isset($_GET['category_id']))
     {
         //category id is set and get the id
         $category_id = $_GET['category_id'];
         //get the category title based on 
         $sql = "SELECT title from tbl_category where id=$category_id";

         $res = mysqli_query($conn,$sql);
         $row = mysqli_fetch_assoc($res);
         //get the title
         $category_title = $row['title']; 
     }
     else
     { 
         //redirect to home page
         header('location:'.SITEURL);
     }

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                    $sql2 = "SELECT * FROM tbl_food where category_id=$category_id";

                    $res2 = mysqli_query($conn,$sql2);
                    $count2 = mysqli_num_rows($res2);
                    if($count2>0)
                    {
                        while($row2 = mysqli_fetch_assoc($res2))
                        {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
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
                        echo "<div class = 'error'> Food Not Available</div>";
                    }

?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>