<?php session_start();   
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cơ khí tân hoàn hảo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css" >

         <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;600&family=Markazi+Text:wght@600&family=Merriweather:wght@300&family=Noto+Sans:wght@400;700&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;600&family=Markazi+Text:wght@600&family=Merriweather:wght@300&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="main">
          <div class="top">
            <img src="images/nen.png" style="width: 1300px;height: 270px;">
          </div>
          <div id="menu">
            <ul>
              <li>
                <a href="index.php"> Trang Chủ</a>
              </li>
              <li>
                <a href="#"> Sản Phẩm</a>
                <ul class="sub-menu">
                  <a href="./maykhoan.php">Máy khoan</a>
                  <a href="./maymai.php">Máy mài</a>
                  <a href="./nganhmoc,diy.php">Ngành mộc, DIY</a>
                  <a href="./mayhandientu.php">Máy hàn điện tử</a>
                  <a href="./mayphatdien.php">Máy phát điện</a>
                  <a href="./thietbidungpin.php">Thiết bị dùng pin</a>
                </ul>
              </li>
              <li>
                <a href="cart.php">Giỏ Hàng</a>
              </li>
              <li>
                <a href="gioithieu.php">Giới Thiệu</a>
              </li>
              <li>
                <a href="phuongthucthanhtoan.php">Phương thức thanh toán</a>
              </li>
              <li>
              <a href="./lienhe/index.html">Liên hệ</a>
              </li>
              <li>
                <!-- dang nhap -->
                <?php 
                if (!empty($_SESSION['current_user'])) {
                  echo '<a>Xin chào: ';
                  echo " " .$_SESSION['current_user'];
                  echo '<ul class="sub-menu">';
                  if (!empty($_SESSION['current_admin']) && $_SESSION['current_admin'] == 1) {
                    echo '<a href="admin/product_listing.php">Quản trị</a>';
                  }
                  ?>
                  <a href="#">Thông tin</a>
                  <a href="logout.php">Đăng xuất</a>   
                </ul>
                <?php
              }else{
               echo '<a href="Login-Form/index.html">'; 
               echo " Đăng nhập";
             }
             ?>
           </a>
         </li>
       </ul>
     </div>

        <?php
         if (empty($_SESSION['current_user'])) {
              echo '<a href="Login-Form/index.html">'; 
              echo "<script>alert('Bạn phải đăng nhập để dùng chức năng này!');
                location.href='Login-Form/index.html'</script>";
        }
        
        include './connect_db.php';
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();

            // $conn1 = mysqli_connect("localhost","root","","demo_db");
            // $sale = 0;
            // $sql = "SELECT * FROM voucher WHERE id_product='".$_GET['id']."'";
            // $result1 = $conn1->query($sql);
            // if($result1->num_rows > 0) {
            //   while($row = $result1->fetch_assoc()) {
            //     $sale = $row['sale'];
            //   }
            // }
            // $conn1->close();
        }


         $user_name = $_SESSION['current_user'];
         $user1 = mysqli_query($con, "SELECT * FROM `user` WHERE `username` = '$user_name'");
        $rowUser =  mysqli_fetch_array($user1);

        $GLOBALS['change_cart'] = false;
        $error = false;
        $success = false;
        if (isset($_GET['action'])) {

            function update_cart($con, $add = false) {
                foreach ($_POST['quantity'] as $id => $quantity) {
                    if ($quantity == 0) {
                        unset($_SESSION["cart"][$id]);
                    } else {
                        if (!isset ($_SESSION["cart"][$id])){
                            $_SESSION["cart"][$id] = 0;
                        }
                        if ($add) {
                            $_SESSION["cart"][$id] += $quantity;
                        } else {
                            $_SESSION["cart"][$id] = $quantity;
                        }
                        $addProduct = mysqli_query($con, "SELECT `quantity` FROM `product` WHERE `id` = ". $id);
                        $addProduct = mysqli_fetch_assoc($addProduct);
                        if ($_SESSION["cart"][$id] > $addProduct['quantity']) {
                            $_SESSION["cart"][$id] = $addProduct['quantity'];
                            $GLOBALS['change_cart'] = true;
                        }
                    }
                }
            }

            switch ($_GET['action']) {
                case "add":
                    update_cart($con, true);
                    if ( $GLOBALS['change_cart'] == false) {
                      header('Location: ./cart.php');
                    }
                  
                    break;
                case "delete":
                    if (isset($_GET['id'])) {
                        unset($_SESSION["cart"][$_GET['id']]);
                    }
                    header('Location: ./cart.php');
                    break;
                case "submit":
                    if (isset($_POST['update_click'])) { 
                        update_cart($con);
                        header('Location: ./cart.php');
                    } elseif ($_POST['order_click']) { 
                        if (empty($_POST['name'])) {
                            $error = "Bạn chưa nhập tên của người nhận";
                        } elseif (empty($_POST['phone'])) {
                            $error = "Bạn chưa nhập số điện thoại người nhận";
                        } elseif (empty($_POST['address'])) {
                            $error = "Bạn chưa nhập địa chỉ người nhận";
                        } elseif (empty($_POST['quantity'])) {
                            $error = "Giỏ hàng rỗng";
                        }
                        if ($error == false && !empty($_POST['quantity'])) { 
                            $products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                            $total = 0;
                            $orderProducts = array();
                            $updateString = "";
                          
                            while ($row = mysqli_fetch_array($products)) {
                                $orderProducts[] = $row;

                                //---------------------
                                // $conn1 = mysqli_connect("localhost","root","","demo_db");
                                // $sale = 0;
                                // $sql = "SELECT * FROM voucher WHERE id_product='".$row['id']."'";
                                // $result1 = $conn1->query($sql);
                                // if($result1->num_rows > 0) {
                                //   while($row = $result1->fetch_assoc()) {
                                //     $sale = $row['sale'];
                                //   }
                                // }
                                // $conn1->close();
                                //----------------------------------

                                if($_POST['quantity'][$row['id']] > $row['quantity']) {
                                   $_POST['quantity'][$row['id']] = $row['quantity'];
                                   $GLOBALS['change_cart'] = true;
                                } else {
                                  $total += $row['price'] * $_POST['quantity'][$row['id']];
                                  $updateString = " when id = ".$row['id']." then quantity - ".$_POST['quantity'][$row['id']] ;
                                }
                            }
                            if ($GLOBALS['change_cart'] == false){
                              $updateQuantity = mysqli_query($con, "UPDATE `product` SET quantity = CASE ".$updateString." END WHERE id in (" . implode(",", array_keys($_POST['quantity'])) . ")");
                              $insertOrder = mysqli_query($con, "INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['note'] . "', '" . $total . "', '" . time() . "', '" . time() . "');");
                              $orderID = $con->insert_id;
                              $insertString = "";
                              foreach ($orderProducts as $key => $product) {
                                  $insertString .= "(NULL, '" . $orderID . "', '" . $product['id'] . "', '" . $_POST['quantity'][$product['id']] . "', '" . $product['price'] . "', '" . time() . "', '" . time() . "')";
                                  if ($key != count($orderProducts) - 1) {
                                      $insertString .= ",";
                                  }
                              }
                              $insertOrder = mysqli_query($con, "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
                              $success = "Đặt hàng thành công";
                              unset($_SESSION['cart']);
                            }
                        }
                    }
                    break;
            }
        }
        if (!empty($_SESSION["cart"])) {
            $products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
        }
        ?>
        <div class="container">
            <?php if (!empty($error)) { ?> 
                <div id="notify-msg">
                    <?= $error ?>. <a href="javascript:history.back()">Quay lại</a>
                </div>
            <?php } elseif (!empty($success)) { ?>
                <div id="notify-msg">
                    <?= $success ?>. <a href="index.php">Tiếp tục mua hàng</a>
                </div>
            <?php } else { ?>
                <strong><p>Giỏ hàng</p></strong>
                <?php if( $GLOBALS['change_cart']) { ?>
                    <h3>Số lượng sản phẩm trong giỏ hàng đã thay đổi, do số lượng sản phẩm trong kho không đủ. Vui lòng <a href="cart.php"> tải lại</a>giỏ hàng</h3>
                <?php } else { ?>
                <form id="cart-form" action="cart.php?action=submit" method="POST">
                    <table>
                        <tr>
                            <th class="product-number">STT</th>
                            <th class="product-name">Tên sản phẩm</th>
                            <th class="product-img">Ảnh sản phẩm</th>
                            <th class="product-price">Đơn giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="total-money">Thành tiền</th>
                            <th class="product-delete">Xóa</th>
                        </tr>
                        <?php
                        if (!empty($products)) {
                            $total = 0;
                            $num = 1;
                            while ($row = mysqli_fetch_array($products)) {

                            //---------------------
                            $sale1 = 0;
                             $conn2 = mysqli_connect("localhost","root","","demo_db");
                            
                             $sql1 = "SELECT * FROM voucher WHERE id_product='".$row['id']."'";
                  
                             $result2 = $conn2->query($sql1);

                            if($result2->num_rows > 0) {
                              while($row1 = $result2->fetch_assoc()) {
                                $sale1 = $row1['sale'];
                              }
                            }
                            $conn2->close();
                            //----------------------------------
                                ?>
                                <tr>
                                    <td class="product-number"><?= $num++; ?></td>
                                    <td class="product-name"><?= $row['name'] ?></td>
                                    <td class="product-img"><img src="<?= $row['image'] ?>" /></td>
                                    <td class="product-price"><?= number_format($row['price'], 0, ",", ".") ?> đ </td>
                                    <td class="product-quantity"><input type="text" value="<?= $_SESSION["cart"][$row['id']] ?>" name="quantity[<?= $row['id'] ?>]" /></td>
                                    <td class="total-money"><?= number_format(($row['price']-$sale1) * $_SESSION["cart"][$row['id']], 0, ",", ".") ?> đ </td>
                                    <td class="product-delete"><a href="cart.php?action=delete&id=<?= $row['id'] ?>">Xóa</a></td>
                                </tr>
                                <?php
                                $total += $row['price'] * $_SESSION["cart"][$row['id']];
                                $num++;
                            }
                            ?>
                            <tr id="row-total">
                                <td class="product-number">&nbsp;</td>
                                <td class="product-name"><h2 style="color: red">Tổng tiền</h2></td>
                                <td class="product-img">&nbsp;</td>
                                <td class="product-price">&nbsp;</td>
                                <td class="product-quantity">&nbsp;</td>
                                <td class="total-money"><?= number_format($total, 0, ",", ".") ?> đ </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <div id="form-button">
                        <input type="submit" name="update_click" value="Cập nhật" />
                    </div>
                    <hr>
                    <!-- <form id="cart-form" action="xulythanhtoan.php?action=submit" method="POST">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <img src="images/tienmat.jpg" height="32px" width="32px">
                        <label class="form-check-labal" for="exampleRadios1">
                          Tiền mặt
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option1" checked>
                        <img src="images/momo.jpg" height="32px" width="32px">
                        <label class="form-check-labal" for="exampleRadios2">
                          MOMO
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option1" checked>
                        <img src="images/vnpay.jpg" height="32px" width="32px">
                        <label class="form-check-labal" for="exampleRadios3">
                          Vnpay
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option1" checked>
                        <img src="images/paypal.jpg" height="32px" width="32px">
                        <label class="form-check-labal" for="exampleRadios4">
                          PayPal
                        </label>
                      </div>
                    </form> -->
                    <div><strong><p>Thông Tin Người Nhận</p></strong></div>
                    <div><label>Người nhận: </label><input type="text" value='<?= $rowUser['fullname'] ?>' name="name" /></div>
                    <div><label>Điện thoại: </label><input type="text" value='<?= $rowUser['sdt'] ?>' name="phone" /></div>
                    <div><label>Địa chỉ: </label><input type="text" value='<?= $rowUser['diachi'] ?>' name="address" /></div>
                    <div><label>Ghi chú: </label><textarea name="note" cols="50" rows="7" ></textarea></div>             
                    <input id="order" type="submit" name="order_click" value="Đặt hàng"/>
              </form>
              <form id="cart-form" method ="POST" enctype="application/x-www-form-urlencoded" action="thanhtoanmomo.php?action=submit">              
                <input id="order" type="submit" name="order_momo" value="MOMO" >
                <input type="hidden" name ="total" value="<?php echo $total?>">           
              </form> 
              <?php } ?>   
            <?php } ?>
        </div>
<!-- -------------------------footer------------------------------------------- -->

<div class="footer">
  <div class=f1>
    <ul>
      <li><a href="#" id="a">Giờ Bán hàng</a> </li>
      <li><a href="#">Cơ khí tân hoàn hảo</a><li>
      <li><a href="#">Thứ 2 - Thứ 6: 8h sáng - 22h tối</a></li>
      <li><a href="#">Thứ 7: 10h sáng-21h tối(gọi khi cần gấp)</a></li>
      <li><a href="#">Chủ nhật: Đóng cửa</a></li><br>
    </ul>
  </div>
  <div class=f2>
    <div class=f1>
      <ul>
        <li><a href="#" id="a">Liên hệ mua hàng</a> </li>
        <li><a href="#">Địa chỉ: 233 Phan Văn trị - P11 - Bình Thạnh</a><li>
        <li><a href="#">SĐT: 0971876233</a></li>
        <li><a href="#">Email: pqt21092001@gmail.com<br></a></li>
      </ul>
    </div>
  </div>
  <div class=f3>
    <div class=f1>
      <ul>
        <li><a href="#" id="a">Thông Tin </a> </li>
        <li><a href="#">Cơ khí tân hoàn hảo</a><li>
        <li><a href="#">Email:Cokhitanhoanhao@gmail.com<br></a></li>
        <li><a href="#" >Fanpage : Cơ Khí tân hoàn hảo</a></li>
      </ul>
    </div>
  </div>
</div>

<!-- -------------------------footer end------------------------------------------- -->


</body>
</html>