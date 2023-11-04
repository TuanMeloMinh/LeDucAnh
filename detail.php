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
        include './connect_db.php';
        $result = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = ".$_GET['id']);
        $product = mysqli_fetch_assoc($result);
        $imgLibrary = mysqli_query($con, "SELECT * FROM `image_library` WHERE `product_id` = ".$_GET['id']);
        $product['images'] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);

        $conn1 = mysqli_connect("localhost","root","","demo_db");
        $sale = 0;
        $sql = "SELECT * FROM voucher WHERE id_product='".$_GET['id']."'";
        $result1 = $conn1->query($sql);
        if($result1->num_rows > 0) {
          while($row = $result1->fetch_assoc()) {
            $sale = $row['sale'];
          }
        }
        $conn1->close();
        ?>
        <div class="container">
      
            <strong><p>Chi tiết sản phẩm</p></strong>
            <div id="product-detail">
                <div id="product-img">
                    <img src="<?=$product['image']?>" />
                </div>
                <?php if(!empty($product['images'])){ ?>
                    <div id="gallery">
                        <ul>
                            <?php foreach($product['images'] as $img) { ?>
                                <li><img src="<?=$img['path']?>" /></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                <div id="product-info">
                    <h1><?=$product['name']?></h1>
 
                    <div class="mt">
                      <?=$product['mieuta']?>
                    </div>
                    <div class="gia">
                      <label>Giá: </label><span class="product-price"><?= number_format($product['price']-$sale, 0, ",", ".") ?> VND</span><br/>
                      <label>Sale: </label><span class="product-price"><?php echo ($sale/$product['price'])*100; ?> %</span><br/>
                    </div>
                    <?php if($product['quantity'] > 0) { ?>
                      <div class="product-quantity">
                        <label>Tồn kho: </label><strong><?= $product['quantity']?></strong>
                      </div>
                    <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
                        <input type="text" value="1" name="quantity[<?=$product['id']?>]" size="2" />
                        <input type="submit" value="Thêm vào giỏ hàng" />
                    </form>

                    <?php } else { ?>
                        <span class="error">Hết hàng</span>
                    <?php } ?>  
                </div>
                <div class="clear-both"></div>
                <!-- <?=$product['content']?> -->
            </div>
        </div>




<?php
  
          ?>

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
      </ul>
    </div>
  </div>
  <div class=f3>
    <div class=f1>
      <ul>
        <li><a href="#" id="a">Thông Tin </a> </li>
        <li><a href="#">Cơ khí tân hoàn hảo</a><li>
        <li><a href="#" >Fanpage : Cơ Khí tân hoàn hảo</a></li>
      </ul>
    </div>
  </div>
</div>

<!-- -------------------------footer end------------------------------------------- -->



    </body>
</html>