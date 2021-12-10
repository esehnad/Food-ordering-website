<?php include('partials/menu.php'); ?>

<div class = "main-content">
    <div class = "wrapper">
        <h1>Add Food</h1>

        <br><br>

      <form action="" method= "POST" enctype = "multipart/form-data">
      <table class = "tbl-30">
          <tr>
              <td>Title:</td>
              <td>
                  <input type="text" name = "title" placeholder = "Title of the food">
              </td>
          </tr>

          <tr>
              <td>Description:</td>
              <td>
                  <textarea name="description" cols="30" rows="5" placeholder = "Descriton of the food"></textarea>
              </td>
          </tr>

          <tr>
              <td>Price:</td>
              <td>
                  <input type="number" name="price" >
              </td>
          </tr>

            <tr>
                <td>Category:</td>
                <td>
                    <select name="category">


                     <?php 
                              //create code to display categories from database
                             // create sql to get all active categorueds
                             //display on d

                             $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                             $res = mysqli_query($conn,$sql);
                             //check whether we have categories or not
                             $count = mysqli_num_rows($res);
                             if($count>0)
                             {
                                  //we have categories
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
                    </select>
                </td>
            </tr>

          <tr>
              <td>Featured:</td>
              <td>
                      <input type="radio" name="featured" value = "Yes">Yes
                      <input type="radio" name="featured" value = "No">No

              </td>
          </tr>

          <tr>
              <td>Active:</td>
              <td>
                      <input type="radio" name="active" value = "Yes">Yes
                      <input type="radio" name="active" value = "No">No

              </td>
          </tr>
          
          <tr>
          <td colspan = "2">
              <input type="submit" name="submit" value="Add Food" class = "btn-secondary">
          </td>
        </tr>

      </table>


      </form>

      <?php
           
          //check whether the button is clicked or not
          if(isset($_POST['submit']))
          {
              //addd the food in databse
              //echo "clicked";
              //get data from form
              $title = $_POST['title'];
              $description = $_POST['description'];
              $price = $_POST['price'];
              $category = $_POST['category'];
              //check for radio buttons
              if(isset($_POST['featured']))
              {
                  $featured = $_POST['featured'];
              }
              else
              {
                  $featured = "No";
              }
              if(isset($_POST['active']))
              {
                  $active = $_POST['active'];
              }
              else
              {
                  $active = "No";
              //insert into database
              }
              //create a sql query to save 
              $sql2 = "INSERT INTO tbl_food SET
              title = '$title',
              description = '$description',
              price = $price,   
              category_id = '$category',
              featured = '$featured',
              active = '$active'
              ";
             $res2 = mysqli_query($conn,$sql2);
             if($res2==TRUE)
             {
                 //data inserted successfullt
                 $_SESSION['add'] = "<div class = 'success'> Food Added successfully.</div>";
                 header('location:'.SITEURL.'admin/manage-food.php');
             }
             else
             {
                $_SESSION['add'] = "<div class = 'error'> Food failed to add </div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                 //
             }
              //redirect with msg manage food page
          }
        
      ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>