<!DOCTYPE html>
<html>
<head>
  <title>Cơ Khí tân hoàn hảo</title>
  <link rel="stylesheet" type="text/css" href="css/cokhi.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;600&family=Markazi+Text:wght@600&family=Merriweather:wght@300&family=Noto+Sans:wght@400;700&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;600&family=Markazi+Text:wght@600&family=Merriweather:wght@300&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">


</head>
<body>
  <?php
  session_start();
  $search = isset($_GET['name']) ? $_GET['name'] : "";
  if ($search) {
    $where = "WHERE `loai` LIKE '%" . $search . "%'";
  }
  include './connect_db.php';
  $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        if ($search) {
          $products = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%' ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
          $totalRecords = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%'");
        } else {
          $products = mysqli_query($con, "SELECT * FROM `product` where loai = 'MÁY HÀN ĐIỆN TỬ' ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
          $totalRecords = mysqli_query($con, "SELECT * FROM `product` where loai = 'MÁY HÀN ĐIỆN TỬ'");
        }
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        ?>
        
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
     <div class="introduce">
       <div class="left-container">
       <ul>
         <li id="danhmuc" ><strong><p>Danh mục<p></strong></li>
           <li id="nd"><a href="./dungcudienxang.php">Dụng cụ điện, xăng</a></li>
           <li id="nd"><a href="./thietbidungpin.php">Thiết bị dùng pin</a></li>
           <li id="nd"><a href="./nganhmoc,diy.php"> Ngành mộc, DIY</a></li>
           <li id="nd"><a href="./linhkien.php">Linh kiện, phụ tùng</a></li>
           <li id="nd"><a href="./thietbidogiadung.php">Thiết bị, đồ gia dụng</a></li>
         </ul>
       </div>
  <div class="slideshow-container">
     <div class="mySlides fade">
       <div id="banner">
         <div id="anh">
          <img src="images/banner.png" >
        </div>
      </div>
    </div>
 </div>
</div>
<br>
<br>

              


<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }

      var slideIndex = 0;
      showSlides();

      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
          slides[slideIndex-1].style.display = "block";
          setTimeout(showSlides, 2000); 
        }
      </script>
      <div id="wrapper-product" class="container">
        <h1>MÁY HÀN ĐIỆN TỬ </h1>
        <form id="product-search" method="GET">
          <label>Tìm kiếm sản phẩm</label>
          <input type="text" value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" name="name" />
          <input type="submit" value="Tìm kiếm" />
        </form>
        <div class="product-items">
          <?php
          while ($row = mysqli_fetch_array($products)) {
            ?>
            <div class="product-item">
              <div class="product-img">
                <a href="detail.php?id=<?= $row['id'] ?>"><img src="<?= $row['image'] ?>" title="<?= $row['name'] ?>" /></a>
              </div>
              <strong><a href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></strong><br/>
              <label>Giá: </label><span class="product-price"><?= number_format($row['price'], 0, ",", ".") ?> đ</span><br/>
              <p><?= $row['content'] ?></p>
              <div class="buy-button">
                <a href="detail.php?id=<?= $row['id'] ?>">Mua sản phẩm</a>
              </div>
            </div>
          <?php } ?>
          <div class="clear-both"></div>
          <?php
          include './pagination.php';
          ?>
          <div class="clear-both"></div>
        </div>
      </div>
<!-- -----------------------------San Pham Noi Bat------------------------- -->

                 

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

  </script>
</body>
</html>