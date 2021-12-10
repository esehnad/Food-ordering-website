<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
<br />

<?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];   //displaying session msg
                unset($_SESSION['add']); //removing session message
            }
       ?>

       
        <form action="" method="POST">


           <table class="tbl-30">
               <tr>
                   <td>Full Name: </td>
                   <td>
                       <input type="text" name = "full name" placeholder = "Enter your name">
                    </td>
               </tr>

               <tr>
                   <td>Username: </td>
                   <td>
                       <input type="text" name = "username" placeholder = "Your username">
                    </td>
               </tr>

               <tr>
                   <td>Password: </td>
                   <td>
                       <input type="password" name = "password" placeholder = "Your password"> 
                   </td>
               </tr>

               <tr>
                   <td colspan="2">
                       <input type="submit" name="submit"value="Add Admin" class="btn-secondary">

                   </td>
               </tr>
           </table>


        </form>
    </div>
</div>



<?php include('partials/footer.php'); ?>


<?php
 
 //process to check from form and save it in database
 //check whether the submit button is clicked or not

 if(isset($_POST['submit']))
 {
     //Button clicked
     //echo "Button clicked";

     //Get the data from form
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];
     $password = md5($_POST['password']);  //pswd encryption eith md5

     // sql query to save data into database
     $sql = "INSERT INTO tbl_admin SET
     full_name = '$full_name',
     username = '$username',
     password = '$password'
     ";
       //execute query and save data in database
     
     $res = mysqli_query($conn,$sql) or die(mysqli_error());
     //check whether the data is inserted or not and dsiplay appropraite message
     if($res==TRUE)
     {
         //echo "Data inserted";
         //create a session variable to display message
         $_SESSION['add'] = "Admin added successfully";
         //redirecting page
         header("location:".SITEURL.'admin/manage-admin.php');
     }
     else
     {
         //echo "Failed to insert";
         //create a session variable to display message
         $_SESSION['add'] = "Admin not added successfully";
         //redirecting page to add-admin
         header("location:".SITEURL.'admin/add-admin.php');
     }
 }

?>