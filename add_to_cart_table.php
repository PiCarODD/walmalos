<?php 
    function add_to_cart_table($customer_id)
    {
        global $con;
        foreach ($_SESSION['cart_product_array'] as $key => $value) 
        {
          echo $value;
            $qty=$_SESSION['qty'][$key];
            $total=$_SESSION['total'][$key];
            $cart_query="INSERT INTO cart(cart_product_id, cart_customer_id, cart_date, cart_qty, cart_total_price) VALUES ($value, $customer_id, now(), $qty, $total)";
            $cart_result=mysqli_query($con,$cart_query);
            if (!$cart_result) 
            {
              die("Insert customer fail".mysqli_error($cart_result));
            }
            $product_query="SELECT * FROM product WHERE product_id=$value";
            $product_result=mysqli_query($con,$product_query);
            $product_row=mysqli_fetch_assoc($product_result);
            $product_qty=$product_row['product_qty'];

            if(($product_qty-$qty)>=0)
            {
                $remove_qty_query="UPDATE product SET product_qty=product_qty-$qty WHERE product_id=$value";
                $remove_qty_result=mysqli_query($con,$remove_qty_query);
                if (!$remove_qty_result) 
                {
                  die("Insert customer fail".mysqli_error($remove_qty_result));
                }
                if(($product_qty-$qty)==0)
                {
                  $product_delete_query="DELETE FROM product WHERE product_id=$value";
                  $product_delete_result=mysqli_query($con,$product_delete_query);
                  if (!$product_delete_result) 
                  {
                    die("Insert customer fail".mysqli_error($product_delete_result));
                  }
                  unset($_SESSION['cart_product_array'][$key]);
                  header("Location:cart_view.php");
                }
            }

            // $_SESSION['qty']=null;
            // $_SESSION['cart_product_array']=null;

            
        }

    }
 ?>