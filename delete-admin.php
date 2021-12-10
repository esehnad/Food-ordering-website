<?php

 include('config/constants.php');
//get the id of admin to be deleted

 $id = $_GET['id'];

 $sql = "DELETE FROM tbl_admin WHERE  id=$id";

 //execute the query
$res = mysqli_query($conn,$sql);

//check whether the query executed successfully 

if($res==TRUE)
{
    //query executed successfully and admin deleted
    //echo "admin deleted";
    $_SESSION['delete'] = "<div class = 'success'>Admin deleted.</div>";
    header('location:' .SITEURL.'admin/manage-admin.php');
}
else
{
    //fail to delete admin
    //echo "failed to delete";
    $_SESSION['delete'] = "<div class = 'error'>Admin Failed deleted.</div>";
    header('location:' .SITEURL. 'admin/manage-admin.php');
}
//create a sql to delete

?>
