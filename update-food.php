<?php include('partials/menu.php'); ?>


<?php
     //check whether id exists or not
     if(isset($_GET['id']))
     {
          $id = $_GET['id'];
          $sql2 = "SELECT * FROM tbl_food where id = $id";
          $res2 = mysqli_query($conn,$sql2);
          $row2 = mysqli_fetch_assoc($res2);
          //getting indivdual data
          $title = $row2['title'];
          $description = $row2['description'];
          $price = $row2['price'];
          $category_id =$row2['category_id'];
          $featured = $row2['featured'];
          $active = $row2['active'];

     }
     else
     {
         header('locaiton:'.SITEURL.'admin/manage-food.php');
     }
?>

<div class="main-content">
           <div class="wrapper">
               <h1>Update Food</h1>

               <br><br>

               <form action=""method="POST" enctype = "multipart/form-data">
               <table class= "tbl_30">
                   <tr>
                       <td>Title:</td>
                       <td>
                           <input type="text" name = "title" value = "<?php echo $title; ?>">
                       </td>
                   </tr>

                   <tr>
                       <td>Description:</td>
                       <td>
                           <textarea name="description" cols="30" rows="5" ><?php echo $description; ?></textarea>
                       </td>
                   </tr>

                   <tr>
                       <td>Price:</td>
                       <td>
                           <input type="number" name="price" value = "<?php echo $price; ?>">
                       </td>
                   </tr>

                   <tr>
                       <td>Category:</td>
                       <td>
                           <select name="category">

                           <?php

                                 $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";
                                 $res = mysqli_query($conn,$sql);
                                 $count = mysqli_num_rows($res);
                                 //chwck whether category available or not

                                 if($count>0)
                                 {
                                     //category available
                                     while($row=mysqli_fetch_assoc($res))
                                     {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                         
                                         ?>
                                            <option value="<?php echo $id ?>"><?php echo $title; ?></option>
                                        <?php

                                     }

                                 }
                                 else
                                 {
                                     //we dont have categories
                                 ?>
                                 <option value="0">No category found</option>
                                 <?php 
                                 }

                           ?>
                       </td>
                   </tr>
 
                   <tr>
                       <td>Featured:</td>
                       <td>
                           <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                           <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name = "featured" value = "No"> No
                       </td>
                   </tr>

                   <tr>
                       <td>Active:</td>
                       <td>
                           <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                           <input <?php if($active=="No"){echo "checked";} ?> type="radio" name = "active" value = "No"> No
                       </td>
                   </tr>

                   <tr>
                       <td>
                           <input type="hidden" name="id" value ="<?php echo $id; ?>">
                           <input type="submit" name="submit" value = "Update Food" class = "btn-secondary">
                       </td>
                   </tr>

               </table>
                                
               </form>

               <?php
               
               if(isset($_POST['submit']))
               {
                   //echo "button clicked";
                   //get all details from form
                   $id = $_POST['id'];
                   $title = $_POST['title'];
                   $description = $_POST['description'];
                   $price = $_POST['price'];
                   $category_id = $_POST['category_id'];
                   $featured = $_POST['featured'];
                   $active = $_POST['active'];
                   

               $sql3 = "UPDATE tbl_food SET 
               title = '$title',
               description = '$description',
               price = $price,
               category_id = '$category_id',
               featured = '$featured',
               active = '$active'
               WHERE id = $id
               ";

               $res3 = mysqli_query($conn,$sql3);
               if($res3==TRUE)
               {
                   //query executed and food updated
                   $_SESSION['update'] = "<div class = 'success'> Food Updated Successfully.</div>";
                   header('location:'.SITEURL.'admin/manage-food.php');

               }
               else
               {
                $_SESSION['update'] = "<div class = 'error'> Food Updated unSuccessfully</div>";
                header('location:'.SITEURL.'admin/manage-food.php');

               }
            }

               ?>


            </div>
        </div>

<?php include('partials/footer.php'); ?>

