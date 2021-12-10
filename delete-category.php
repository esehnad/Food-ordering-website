<?php

include('config/constants.php');
      //echo "Delete Page";
      
      if(isset($_GET['id']))
      {
          //get the value and delete
          //echo "get value and delete";
          $id  = $_GET['id'];

          $sql = "DELETE FROM tbl_category WHERE id = $id";
          $res = mysqli_query($conn,$sql);

          //w=check whether data is deleted

          if($res==TRUE)
          {
              $_SESSION['delete'] = "<div class='success'> Category Deleted successfully.</div>";
              header('location:'.SITEURL.'admin/manage-category.php');
          }
          else
          {
            $_SESSION['delete'] = "<div class='error'> Category Deleted unsuccessfully. </div>";
            header('location:'.SITEURL.'admin/manage-category.php');
          }

      }
      else
      {
          //redirect
          header('location:'.SITEURL.'admin/manage-category.php');
      }
?>