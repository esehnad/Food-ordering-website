<?php include('partials/menu.php'); ?>

<div class = "main content">
    <div class = "wrapper">
        <h1>Change Password</h1>
        <br><br>


        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        }
        ?>

        <form action="" method="POST">

         <table class = "tbl-30">
             <tr>
                 <td>Current password:</td>
                 <td>
                     <input type="password" name = "current_password" placeholder = "Current password">
                 </td>
             </tr>
             <tr>
                 <td>New Password: </td>
                 <td>
                     <input type="password" name = "new_password" placeholder = "New password">
                 </td>
             </tr>

             <tr>
                 <td>Confirm Password: </td>
                 <td>
                     <input type="password" name = "confirm_password" placeholder = "Current password">
                 </td>
             </tr>

             <tr>
                 <td colspam = "2">
                 <input type = "hidden"name = "id" value = "<?php echo $id; ?>">
                 <input type = "submit" name = "submit" value = "Change password" class="btn-secondary">
                 </td>
             </tr>
        </table>

        </form>
    </div>
</div>

<?php 
      if(isset($_POST['submit']))
      {
          //button clicked
          //get data from form
          $id = $_POST['id'];
          $current_password = md5($_POST['current_password']);
          $new_password = md5($_POST['new_password']);
          $confirm_password = md5($_POST['confirm_password']);
          //check whether the user with current id and current password exists or not

          $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'"; 
         
          //execute the query
          $res = mysqli_query($conn,$sql);
          if($res==true)
          {
              //CHECK whether data is available or not

              $count = mysqli_num_rows($res);
              if($count==1)
              {
                  //user exist
                  //echo "USER FOUND";
              }
              else
              {
                  //user does not 
                  $_SESSION['user-not-found'] = "<div class='error'> user not found. </div>";
                  header('location:'.SITEURL.'admin/manage-admin.php');
              }
          }
          //check whether new password and confirm password match or not

          if($new_password==$confirm_password)
          {
              //update the password
              $sql2 = "UPDATE tbl_admin SET
              password = '$new_password'
              WHERE id = $id
              ";

              $res2 = mysqli_query($conn, $sql2);

              if($res2==TRUE)
              {
                  //display success msg
                  $_SESSION['pwd-changed'] = "<div class='success'> Password changed successfully. </div>";
                  header('location:'.SITEURL.'admin/manage-admin.php');
              }
              else
              {
                  //error
                  $_SESSION['pwd-changed'] = "<div class='error'> Password not changed. </div>";
                  header('location:'.SITEURL.'admin/manage-admin.php');
              }
          }
          else
          {
              //redirect to the page
              $_SESSION['pwd-not-matched'] = "<div class='error'> Password not matched. </div>";
                  header('location:'.SITEURL.'admin/manage-admin.php');
          }

          // if above all true then exxecute


      }

?>

<?php include('partials/footer.php'); ?>