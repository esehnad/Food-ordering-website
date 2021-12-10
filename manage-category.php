<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /><br />

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
            unset($_SESSION['delete']);
        }
        ?>

<?php
        if(isset($_SESSION['no-category-found']))
        {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }
        ?>

<?php
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>




        <br><br>

<!-- button to add admin -->
<a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

<br /><br />

       <table class="tbl-full">
           <tr>
               <th>S.N</th>
               <th>Title</th>
               <th>Featured</th>
               <th>Active</th>
               <th>Actions</th>
           </tr>

           <?php
                    //query to get all admins
                     $sql = "SELECT * FROM tbl_category";
                     //execute query
                     $res = mysqli_query($conn, $sql);

                         //count rows to check whether we have data in database or not
                         $count = mysqli_num_rows($res);

                         $sn = 1; //create a variable and assign to it
                         if($count>0)
                        {
                             // we have data in database
                             while($rows=mysqli_fetch_assoc($res))
                             {
                                 //using while loop to get all the data from database
                                 //and it will run as long as it have data

                                 //get individual data
                                 $id = $rows['id'];
                                 $title =$rows['title'];
                                 $featured = $rows['featured'];
                                 $active = $rows['active'];
                                 
                                 //display the values in our table
                                 ?>

                                    <tr>
                                   <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                           <td><?php echo $featured; ?></td>
                                           <td><?php echo $active; ?></td>

                                             <td>
                                    
                                         <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                         <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>" class="btn-danger">Delete Category</a>
                                         
                                     </td>
                                  </tr>

                                   <?php


                             }
                        }
                        else
                        {
                            //we do not have data in database
                     }
              ?>

              <tr>
                  <td colspan = "6"><div class="error">No category added</div></td>
              </tr>

              
       </table>

        </div>
</div>


<?php include('partials/footer.php'); ?>