<?php include('partials-front/menu.php'); ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <br><br><br>

            <?php 
                   //dispay all categories
                    $sql = "SELECT * FROM tbl_category where active = 'Yes'";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);

                    //check whether categories available
                    if($count>0)
                    {
                        //categories available
                        while($row=mysqli_fetch_assoc($res))
                        {
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
                        //not available
                        echo "<div class='error'> Category not found.</div>";
                    }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>