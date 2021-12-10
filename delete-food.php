<?php
 include('config/constants.php'); 

if(isset($_GET['id']))
{
    //delete
    //echo "process to delete"

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_food WHERE id = $id";

    $res = mysqli_query($conn,$sql);
    if($res==TRUE)
    {
          //food deleted
          $_SESSION['delete'] = "<div class = 'success'> Food deleted successfully</div>";
          header('location:'.SITEURL.'admin/manage-food.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class = 'error'> Food deleted unsuccessfully</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

}
else
{
     //echo "redirect"
     $_SESSION['unauthorized'] = "<div class='error'> unauthorized access</div>";
     header('location:'.SITEURL.'admin/manage-food.php');
}

?>