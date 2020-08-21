 <?php
          function check_out($cart_array)
          {
                global $con;
                global $count;
                $total=0;
                //print_r($cart_array);
                if($cart_array != null)
                {
                  foreach ($cart_array as $key => $value)
                  {
                      //echo $value." ";
                      $product_id=mysqli_real_escape_string($con,$value);
                      $stmt = $con->prepare("SELECT * FROM product WHERE product_id=?");
                      $stmt->bind_param("s",$product_id);
                      $stmt->execute();
                      $res = $stmt->get_result();                
                      while ($res != "" && $row=$res->fetch_assoc())
                      {
                            //echo $_SESSION['qty'][$key];
                            $product_id=$row['product_id'];
                            $product_cat_id=$row['product_cat_id'];
                            $product_title=$row['product_title'];
                            $product_image=$row['product_image'];
                            $product_content=$row['product_content'];
                            $product_price=$row['product_price'];
                            $product_qty=$row['product_qty'];
                            $product_seller_id=$row['product_seller_id'];

                            $seller_query=$con->prepare("SELECT * FROM user WHERE user_id=?");
                            $seller_query->bind_param("s",$product_seller_id);
                            $seller_query->execute();
                            $seller_result=$seller_query->get_result();
                            $seller_row=$seller_result->fetch_assoc();
                            $seller_name=$seller_row['username'];
                            $seller_email=$seller_row['user_email'];
                            $seller_phone_no=$seller_row['user_phone_no'];
                            
                        }
                        
                        ?>
                        <form method="post" action="">
                          <tr>
                            <td><?php echo $count+=1; ?></td>
                            <td><img width="100" class="img-responsive" src="images/<?php echo htmlspecialchars($product_image); ?>" alt=""></td>
                            <td><?php echo htmlspecialchars($seller_name); ?></td>
                            <td><?php echo htmlspecialchars($product_content); ?></td>
                            
                            <td>

                              <span class="shopBtn"><span class="icon-ok"></span></span> </td>
                            <td><?php echo htmlspecialchars($product_price); ?> MMK</td>
                            <td>
                              
                              <div class="input-append">
                                <a href="cart_view.php ? remove=<?php echo $key; ?>&&id=<?php echo htmlspecialchars($product_id); ?>"><input type="button" value="-"></a>
                                <input type="text" style="max-width:34px" size="16" name="tot_qty" value="<?php echo htmlspecialchars($_SESSION['qty'][$key]); ?>" min="1" max="<?php echo htmlspecialchars($product_qty); ?>">
                                <a href="cart_view.php?add=<?php echo $key; ?>&&id=<?php echo htmlspecialchars($product_id); ?>"><input type="button" value="+"></a>

                              </div>
                            </td>
                            <td> <?php echo $_SESSION['total'][$key]=$_SESSION['qty'][$key] * $product_price ?> MMK</td>
                            <td><a href="cart_view.php?delete=<?php echo htmlspecialchars($key); ?>">Delete</a></td>
                            
                          </tr>
                          
                        </form>
                        
                      <?php
                      $total+=$_SESSION['total'][$key];

                }
              }
              ?>
              <tr>
                            <td colspan="8" class="alignR" style="line-height: 30px"><b>Total price:</b> </td>
                            <td style="line-height: 30px;color:white;background-color: #F89406;"><b><?php echo htmlspecialchars($total) ?> MMK</b> <?php  ?></td>
                          </tr>  
              <?php             
          }
          
       ?>