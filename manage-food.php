<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
     
        <br><br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }

?>

<?php
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
            }

?>

<?php
            if(isset($_SESSION['unauthorized']))
            {
                echo $_SESSION['unauthorized'];
                unset ($_SESSION['unauthorized']);
            }

?>

<?php
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }

?>

<br><br>

<!-- button to add admin -->
<a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

<br /><br />

       <table class="tbl-full">
           <tr>
               <th>S.N</th>
               <th>Title</th>
               <th>Price</th>
               <th>Featured</th>
               <th>Active</th>
               <th>Actions</th>
           </tr>

           <?php
                    $sql = "SELECT * FROM tbl_food";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);

                    $sn=1;  //create serial number as variable and set default as 1
                    if($count>0)
                    {
                               //get food from database and display
                               while($row=mysqli_fetch_assoc($res))
                               {
                                   //get value from individual columns
                                   $id = $row['id'];
                                   $title = $row['title'];
                                   $price = $row['price'];
                                   $featured = $row['featured'];
                                   $active = $row['active'];

                                   ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $title; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td><?php echo $featured; ?></td>
                                            <td><?php echo $active; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>"class="btn-secondary">Update Food</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>" class="btn-danger">Delete Food</a>
                                            </td>

                                        </tr>



                              
                                   <?php
                            }
                        }
                    else
                    {

                        //food not added in database
                        echo "<tr><td colsapn = '7' class = 'error'> Food not added yet.</td></tr>";
                    }

           ?>

           

       </table>

        </div>
</div>


<?php include('partials/footer.php'); ?>
