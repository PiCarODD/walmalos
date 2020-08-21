<?php include_once "include/header.php"; ?>
<?php include_once "include/navigation.php"; ?>
<?php ob_start() ?>
<?php include "cart.php"//session_start() ?>
<?php include "cart_list.php" ?>
<?php include "add_to_cart_table.php" ?>
<!-- 
Body Section 
-->

  <div class="row">
  <div class="col-md-12">
    <ul class="breadcrumb">
    	<li><a href="index.php">Home</a> <span class="divider">/</span></li>
    	<li class="active">Check Out</li>
    </ul>
  <div class="well well-small">
  	<h1>Check Out </h1>
  <hr class="soften"/>	
<!-- <div  style="overflow: hidden;"> -->
  <table class="table table-bordered table-condensed" style="table-layout: fixed;">
    <thead style="overflow-y: hidden;">
      <tr>
      	<th style="width: 25px;">No</th>
        <th>Product</th>
        <th>Seller Name</th>
        <th>Description</th>
        <th>Avaliable</th>
        <th>Unit price</th>
        <th>Qty </th>
        <th>Total</th>
        <th>Delete</th>
        
  		</tr>
    </thead>
    <tbody>

      <?php
        
        if(isset($_GET['cart_product_id']))
        {
          $cart_product_id=$_GET['cart_product_id'];
          htmlspecialchars($cart_product_id);
          add_to_cart($cart_product_id);
        }
      ?>
      
      <?php 
          $count=0;
          
          $cart_array=@$_SESSION['cart_product_array'];
          
          check_out($cart_array);

      ?>

      <?php
        if (isset($_GET['add'])) 
        {
          $key=htmlspecialchars($_GET['add']);
          $add_product_id=htmlspecialchars($_GET['id']);
          qty_plus($add_product_id,$key);

          header("Location:cart_view.php");
          
        }
        if (isset($_GET['remove'])) 
        {
          $key=htmlspecialchars($_GET['remove']);
          if($_SESSION['qty'][$key] > 1)
          {
            $_SESSION['qty'][$key]-=1;
          }
          
          header("Location:cart_view.php");
          
        }    
      ?>

      <?php 
          if (isset($_GET['delete'])) 
          {
              $key=htmlspecialchars($_GET['delete']);
              unset($_SESSION['cart_product_array'][$key]);
              //unset($_SESSION['qty'][$key]);
              // $delete_product_id=$_GET['delete'];

              // foreach ($_SESSION['cart_product_array'] as $key => $value) 
              // {
              //     if($delete_product_id == $value)
              //     {
              //       unset($_SESSION['cart_product_array'][$key]);
                    
              //     }
              // }
              header('Location: cart_view.php');
          }
       ?>
    </tbody>
  </table>
  <!-- </div> -->
  <br/>
  	
  <a href="list_view.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
  <a class="shopBtn btn-large pull-right" onclick="check()">Check Out <span class="icon-arrow-right"></span></a>
  <div id="checkout" class="modal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Please Fill Address Detail</h3>
          <!-- <button class="" class="close" data-dismiss="modal"><span>&times;</span></button> -->
        </div>
        <?php 
            if (isset($_POST['buy'])) 
            {
              $customer_name=$_POST['name'];
              $customer_email=$_POST['email'];
              $customer_phone=$_POST['phone'];
              $customer_address=$_POST['address'];
              $stmt=$con->prepare("INSERT INTO customer(customer_name, customer_phone_no, customer_email, customer_address) VALUES (?, ?, ?, ?)");
              $stmt->bind_param("ssss",$customer_name,$customer_phone,$customer_email,$customer_address);
              $stmt->execute();
              $insert_result = $stmt->get_result();
              $stmt=$con->prepare("SELECT * FROM customer WHERE customer_phone_no=? AND customer_email=?");
              $stmt->bind_param("ss",$customer_phone,$customer_address);
              $stmt->execute();
              $select_result= $stmt->get_result();
              while ($select_row=$select_result->fetch_assoc()) 
              {
                $customer_id=$select_row['customer_id'];
              }
              echo htmlspecialchars($customer_id);
              add_to_cart_table($customer_id);

            }
         ?>

        <div class="modal-body">
          
          <form method="post" action="">
            <div class="form-group">
              <label for="name" class="control-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="email" class="control-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="form-group">
              <label for="ph" class="control-label">Phone</label>
              <input type="text" class="form-control" name="phone" id="ph" required>
            </div>
            <div class="form-group">
              <label for="address" class="control-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" required>
            </div>
             <div class="form-group">
              <input type="submit" class="btn btn-success" name="buy" value="Buy">
              <a class="btn btn-danger" href="">Cancel</a>
            </div>
          </form>
        </div>

        
        <div class="modal-footer">
          <p>Thanks for using our Web Application</p>
        </div>
      </div>  
    </div>
  </div>
</div>
</div>
</div>

<?php include_once "include/footer.php"; ?>
