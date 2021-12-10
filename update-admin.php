<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
       <h1>Update Admin</h1>
<?php
       $id = $_GET['id'];
       $sql ="SELECT * FROM tbl_admin WHERE id=$id";
       $res = mysqli_query($conn,$sql);

       if($res==TRUE)
       {
           $count = mysqli_num_rows($res);
           if($count==1)
           {
               //fet details
               //echo "data available";
               $row = mysqli_fetch_assoc($res);
               $full_name = $row['full_name'];
               $username = $row['username'];
           }
           else
           {
               //do not get detials
               header('location:'.SITEURL.'admin/manage-admin.php');
           }

       }
       else
       {
           echo "data not available";
       }
    ?>
       <br><br>

       <form action="" method="POST">

       <table class="tbl-30">
               <tr>
                   <td>Full Name: </td>
                   <td>
                       <input type="text" name = "full name" value = "<?php echo $full_name; ?>">
                    </td>
               </tr>

               <tr>
                   <td>Username: </td>
                   <td>
                       <input type="text" name = "username" value = "<?php echo $full_name; ?>">
                    </td>
               </tr>

               <tr>
                   <td colspan="2">
                       <input type="hidden" name="id" value= "<?php echo $id; ?>">
                       <input type="submit" name="submit"value="Update Admin" class="btn-secondary">

                   </td>
               </tr>
           </table>


       </form>
    </div>
</div>

<?php
if(isset($_POST['submit']))
{
    //echo "button clicked";
    //get all the from form

     $id = $_POST['id'];
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];

     //create sql query to update

     $sql = "UPDATE tbl_admin SET
     full_name = '$full_name',
     username = '$username' 
     WHERE id = $id
     ";

     //execute the wuery

     $res = mysqli_query($conn, $sql);

     //check whether the wueyr 

     if($res == TRUE)
     {
         //query executed and admin updated
         $_SESSION['update'] = "<div class= 'success'> Admin updated successfully.</div>";
         header('location: '.SITEURL.'admin/manage-admin.php');
     }
     else
     {
         //failed to update
         $_SESSION['update'] = "<div class= 'success'> failed to update.</div>";
         header('location: '.SITEURL.'admin/manage-admin.php');
     }
}
?>

<?php include('partials/footer.php'); ?>