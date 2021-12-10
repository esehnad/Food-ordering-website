<?php
       include('partials/menu.php'); ?>

       <div class="main-content">
           <div class="wrapper">
               <h1>Update Category</h1>

               <br><br>

               <?php
               if(isset($_GET['id']))
               {
                     $id = $_GET['id'];
                     $sql = "SELECT * from tbl_category WHERE id= $id";
                     $res = mysqli_query($conn,$sql);

                     $count = mysqli_num_rows($res);

                     if($count==1)
                     {
                         //get all data
                         //$_SESSION
                         $row = mysqli_fetch_assoc($res);

                         $title = $row['title'];
                         $featured = $row['featured'];
                         $active = $row['active'];

                         }
                     else
                     {
                         //redirect
                         $_SESSION['no-category-found'] = "<div class = 'error'> Category not found.</div>";
                         header('location:'.SITEURL.'admin/manage-category.php');
                     }
               }
               else
               {
                   header('location:'.SITEURL.'admin/manage-category.php');
               }
               ?>
<form action="" method="POST" enctype = "multipart/form-data">
<table class=tbl_30>
       <tr>
           <td>Title:</td>
           <td>
               <input type="text" name="title" value="<?php echo $title; ?>">
           </td>
       </tr>

       <tr>
           <td>Featured:</td>
           <td>
               <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
               <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
           </td>
       </tr>

       <tr>
           <td>Active:</td>
           <td>
               <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
               <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
           </td>
       </tr>

       <tr>
           <td>
               <input type="hidden" name="id" value = "<?php echo $id; ?>">
               <input type="submit" name="submit" value="Update Category" class="btn-secondary">
           </td>
       </tr>
</table>
</form>

     <?php
             if(isset($_POST['submit']))
             {
                 //echo "clicked";
                 //get all values from form
                 $id = $_POST['id'];
                 $title = $_POST['title'];
                 $featurd = $_POST['featured'];
                 $active = $_POST['active'];

                 $sql2 = "UPDATE tbl_category SET 
                 title = '$title',
                 featured = '$featured',
                 active = '$active'
                 WHERE id = $id
                 ";
                
                $res2 = mysqli_query($conn,$sql2);

                if($res2==TRUE)
                {
                $_SESSION['update'] = "<div class = 'success' > Category updated successfully</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class = 'error' > Category updated unsuccessfully</div>";
                header('location"'.SITEURL.'admin/manage-category.php');
                }
                
                

             }
     ?>

              
           </div>
       </div>


<?php include('partials/footer.php'); ?>