<?php
/*
<?php include('partials/menu.php'); ?>

<div class = "main-content">
    <div class = "wrapper">
        <h1>Update Order</h1>
        <br><br>

        <?php
              if(isset($_GET['id']))
              {
                  //get order details
                  $id = $_GET['id'];

                  //get all details based on this is
                  $sql = "SELECT * FROM tbl_order where id = $id";
                  $res = mysqli_query($conn,$sql);
                  $count = mysqli_num_rows($res);
                  if($count==1)
                  {
                      //data available
                      while($row = mysqli_fetch_assoc($res))
                      {
                          $food = $row['food'];
                          $price = $row['price'];
                          $qty = $row['qty'];
                          $status = $row['status'];
                          $customer_name = $row['customer_name'];
                          $customer_contact = $row['customer_contact'];
                          $customer_email = $row['customer_email'];
                          $customer_address = $row['customer_address'];

                      }
                  }
                  else
                  {
                      //details nt available and get redirected
                      header('location:'.SITEURL.'admin/manage-order');
                  }

              }
              else
              {
                  //redirect
                  header('location:'.SITEURL.'admin/manage-order.php');
              }
        ?>

      <form action=""method="POST">
          <table class = "tbl-30">
              <tr>
                  <td>Food Name</td>
                  <td><b><?php echo $food; ?></b></td>
              </tr>

              <tr>
                  <td>Price</td>
                  <td>
                      <b><?php echo $price; ?></b>
                  </td>
              </tr>

              <tr>
                  <td>Qty</td>
                  <td>
                      <input type="number" name = "qty" value = "<?php echo $qty; ?>">
                  </td>
              </tr>

              <tr>
                  <td>Status</td>
                  <td>
                      <select name="status">
                      <option <?php if($status =="Ordered"){echo "Selected";}?> value="Ordered">Ordered</option>
                      <option <?php if($status =="On Delivery"){echo "Selected";}?> value="On Delivery">On Delivery</option>
                      <option <?php if($status =="Delivered"){echo "Selected";}?> value="Delivered">Delivered</option>
                      <option <?php if($status =="Cancelled"){echo "Selected";}?> value="Cancelled">Cancelled</option>
                      </select>
                  </td>
              </tr>

              <tr>
                  <td colspan = "2">
                  <input type="hidden" name="id" vlaue="<?php echo $id; ?>">
                  <input type="hidden" name="price" vlaue="<?php echo $id; ?>">    
                  
                      <input type="submit" name="submit" value="Update Order" class = "btn-secondary">
                  </td>

              </tr>

          </table>
      </form>

      <?php
           //check
           if(isset($_POST['submit']))
           {
               //echo "Clicked"
               //get all values from form
               //update the values and redirect with msg
               $id = $_POST['id'];
               $price = $_POST['price'];
               $qty = $_POST['qty'];
               $status = $_POST['status'];

               $sql2 = "UPDATE tbl_order SET
               qty = '$qty',
               status = '$status',
               where id=$id ";

               $res2 = mysqli_query($conn,$sql2);
               
               if($res2==TRUE)
               {
                   //updated
                   $_SESSION['update'] = "<div class = 'success'> Order updated successfully </div>";
                   header('location:'.SITEURL.'admin/manage-order.php');
               }
               else
               {
                $_SESSION['update'] = "<div class = 'error'> Failed to update order</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
               }
            


           }
      ?>

    </div>
</div>






<?php include('partials/footer.php'); ?>