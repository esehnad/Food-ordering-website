<?php include('partials/menu.php'); ?>

    <!-- Main content section starts -->
    <div class="main-content">
    <div class="wrapper">
       <h1>Manage Admin</h1>

       <br /><br />

       <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];   //displaying session msg
                unset($_SESSION['add']); //removing session message
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];   
                unset($_SESSION['delete']); 
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset ($_SESSION['user-not-found']);
            }
            if(isset($_SESSION['pwd-not-matched']))
            {
                echo $_SESSION['pwd-not-matched'];
                unset($_SESSION['pwd-not-matched']);
            }
            if(isset($_SESSION['pwd-changed']))
            {
                echo $_SESSION['pwd-changed'];
                unset($_SESSION['pwd-changed']);
            }
       ?>
       <br /><br /><br />

<!-- button to add admin -->
<a href="add-admin.php"class="btn-primary">Add Admin</a>

<br /><br />

       <table class="tbl-full">
           <tr>
               <th>S.N</th>
               <th>Full Name</th>
               <th>Username</th>
               <th>Actions</th>
           </tr>

              <?php
                    //query to get all admins
                     $sql = "SELECT * FROM tbl_admin";
                     //execute query
                     $res = mysqli_query($conn, $sql);

                     //check whether the query is executed or not

                     if($res==TRUE)
                     {
                         //count rows to check whether we have data in database or not
                         $count = mysqli_num_rows($res);
                         $sn = 1; //create a variable and assign to it
                         if($count>0)
                        {
                             // we have data in database
                             while($rows=mysqli_fetch_assoc($res))
                             {
                                 //using while loop to get all the data from database
                                 //and it will run as long as it have data

                                 //get individual data
                                 $id =$rows['id'];
                                 $full_name = $rows['full_name'];
                                 $username = $rows['username'];
                                 
                                 //display the values in our table
                                 ?>

                                    <tr>
                                   <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                           <td><?php echo $username; ?></td>
                                             <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class = "btn-primary"> Change Password</a>
                                         <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                          <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                     </td>
                                  </tr>

                                   <?php


                             }
                        }
                        else
                        {
                            //we do not have data in database
                        }
                     }
              ?>

           

       </table>

    </div>
</div>
    <!-- Main content section ends -->

    <?php include('partials/footer.php'); ?>