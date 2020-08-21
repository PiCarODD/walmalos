<?php 
    function add_to_cart_table($customer_id)
    {
        global $con;
        foreach ($_SESSION['cart_product_array'] as $key => $value) 
        {
            echo $value;
            $qty=$_SESSION['qty'][$key];
            $total=$_SESSION['total'][$key];
            $cart_query=$con->prepare("INSERT INTO cart(cart_product_id, cart_customer_id, cart_date, cart_qty, cart_total_price) VALUES (?, ?, now(), ?, ?)");
            $cart_query->bind_param("iiii",$value,$customer_id,$qty,$total);
            $cart_query->execute();
            $cart_result=$cart_query->get_result();
            if (!$cart_result) 
            {
              die("Insert customer fail");
            }
            $product_query=$con->prepare("SELECT * FROM product WHERE product_id=?");
            $product_query->bind_param("s",$value);
            $product_query->execute();
            $product_result=$product_query->get_result();
            $product_row=$product_result->fetch_assoc();
            $product_qty=$product_row['product_qty'];

            if(($product_qty-$qty)>=0)
            {
                $remove_qty_query=$con->prepare("UPDATE product SET product_qty=product_qty-$qty WHERE product_id=?");
                $remove_qty_query->bind_param("i",$value);
                $remove_qty_query->execute();
                $remove_qty_result=$remove_qty_query->get_result();
                if(($product_qty-$qty)==0)
                {
                  $product_delete_query=$con->prepare("DELETE FROM product WHERE product_id=?");
                  $product_delete_query -> bind_param("i",$value);
                  $product_delete_query->execute();
                  unset($_SESSION['cart_product_array'][$key]);
                  header("Location:cart_view.php");
                }
            }

            // $_SESSION['qty']=null;
            // $_SESSION['cart_product_array']=null;

            
        }

    }
 ?>