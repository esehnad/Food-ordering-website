<?php include('partials/menu.php'); ?>

    <!-- Main content section starts -->
    <div class="main-content">
    <div class="wrapper">
       <h1>Add Category</h1>


        <br><br>

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        ?>

        <?php
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }
        ?>

        <br><br>

        <!-- Add category form starts -->
        <form action="" method="POST" enctype="multipart/form data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder = "Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value = "Yes"> Yes
                        <input type="radio" name="featured" value = "No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value = "Yes"> Yes
                        <input type="radio" name="active" value = "No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name = "submit" value = "Add Category" class = "btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Add category form ends -->
<?php
        //check whether the submit button clicked
          if(isset($_POST['submit']))
          {
              //echo "button clicked";

              //get the value from form
              $title = $_POST['title'];
              //for radio input type we need to check whether the button is selected

              if(isset($_POST['featured']))
              {
                  //value from form 
                  $featured = $_POST['featured'];

              }
              else
              {
                  //set the default value
                  $featured = "No";
              }
              if(isset($_POST['active']))
              {
                  $active = $_POST['active'];

              }
              else
              {
                  $active = "No";
              }

              //check whether the image is selected or not and set the value for image name accordingly
              //print_r($_FILES['image']);

             // die(); //break the code

             if(isset($_FILES['image']['name']))
             {
                //upload the image
                //to uplaod image we need image name and source path and destination

                $image_name = $_FILES['image']['name'];
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "images/category".$image_name;

                //finally upload the image
                $upload = move_uploaded_file($source_path,$destination_path);

                //check whether image is upladed or not
                //and if the imahge is not upladed then we will stop the process and redirect with error message
                if($upload==FALSE)
                {
                 $_SESSION['uplaod'] = "<div class = 'error'> Failed to upload</div>";
                 header('location:'.SITEURL.'admin/add-category.php');
                  //stop the process
                  die();
                }
             }
             


              //create sql query to insert category into database
              $sql = "INSERT INTO tbl_category SET
              title = '$title',
              image_name = '$image_name',
              featured = '$featured',
              active = '$active'
              ";

              //execute the query and save in database
              $res = mysqli_query($conn, $sql);

              //checl whether the wuery i=executed or not 
              if($res==TRUE)
              {
                  //query executed and category aded
                  $_SESSION['add'] = "<div class = 'success'>Category added successfully.</div>";
                  header('location:'.SITEURL.'admin/manage-category.php');
              }
              else
              {
                  //failed to add category 
                  $_SESSION['add'] = "<div class = 'error'>Failed to add category.</div>";
                  header('location:'.SITEURL.'admin/add-category.php');
              }

          }

        ?>


    </div>
</div>


<?php include('partials/footer.php'); ?>