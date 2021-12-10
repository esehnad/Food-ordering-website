
<?php include('config/constants.php') ?>

<html>
    <head>
        <title>Login- Food Order system</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
         <div class = "Login">
             <h1 class="text-center">Login</h1> 
          <br><br>

             <?php
             if(isset($_SESSION['Login']))
             {
                 echo $_SESSION['Login'];
                 unset($_SESSION['Login']);
             }
             ?>

             <?php
             if(isset($_SESSION['no-login-message']))
             {
                 echo $_SESSION['no-login-message'];
                 unset($_SESSION['no-login-message']);
             }
             ?>


             <br><br>

             <!-- Login starts here -->
             <form action=""method="POST" class = text-center>
                 Username: <br>
                 <input type="text" name = "username" placeholder = "Enter Username"><br><br>
                 Password: <br>
                 <input type="password" name = "password" placeholder = "Enter password"><br><br>
                 
                 <input type="submit" name = "submit" value = "Login" class = "btn-secondary">
                 <br><br>
             </form>
              <!-- Login ends here -->

             <p class="text-center">Created by - <a href="www.grp6@gmail.com">Group-6</a></p>
         
        </div>


    </body>
</html>

<?php

  //whether the submit button clicked or not
  if(isset($_POST['submit']))
  {
      //process for login
      //get data from form

       $username = $_POST['username'];
       $password = md5($_POST['password']);
      
       //CHECK sql to check whether username and password exist or not
       $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

       $res = mysqli_query($conn,$sql);

       //count rows to check whether the user exists or not
       $count = mysqli_num_rows($res);
       if($count==1)
       {
           //user available and login succcess
           $_SESSION['Login'] = "<div class = 'success'> Login Successful.</div>";

           $_SESSION['user'] = $username;  //to check whether user is logged in or not and logout will unset it

           header('location:'.SITEURL. 'admin/');
       }
       else
       {
           //user not available
           $_SESSION['Login'] = "<div class = 'error text-center'> Username or password did not match.</div>";
           header('location:'.SITEURL. 'admin/login.php');
       }

  }
?>