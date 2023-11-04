<!DOCTYPE html>
<html>
<head>
  <title>Cơ khí tân hoàn hảo</title>
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
    $where = "WHERE `name` LIKE '%" . $search . "%'";
  }
  include './connect_db.php';
  $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        if ($search) {
          $products = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%' ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
          $totalRecords = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%'");
        } else {
          $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
          $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
        }
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $products_noibat = mysqli_query($con, "SELECT * FROM `product` where noibat = '1' ORDER BY `id` ASC");
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

<!-- -----------------------------San Pham Noi Bat------------------------- -->

<div id="wrapper-product" class="container">
  <h1>Sản Phẩm Nổi Bật</h1>
  <div class="product-items">
    <?php
    while ($row = mysqli_fetch_array($products_noibat)) {
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
<!-- -----------------------------danh sách sản phẩm------------------------- -->
  <div id="wrapper-product" class="container">
    <h1>Danh sách sản phẩm</h1>
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
<!---------------------------- contact section ------------------------------------->

<section class="contact" id="contact">

<h1 class="heading"> <span>THÔNG TIN</span> </h1>

<div class="row">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15675.915738692087!2d106.686433183521!3d10.812923777350715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528ea394a7535%3A0x8ad6269b391d9af9!2zMjMzIMSQLiBQaGFuIFbEg24gVHLhu4ssIFBoxrDhu51uZyAxMSwgQsOsbmggVGjhuqFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1654182738974!5m2!1svi!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <form action="">
        <h3>THÔNG TIN CƠ KHÍ TÂN HOÀN HẢO</h3>
        <br>
        <form action="">
            <h2>TRẢI NGHIỆM MUA SẮM TRỰC TUYẾN AN TOÀN, TIN CẬY VÀ TIỆN LỢI</h2>
            <p>Quý khách có thể dễ dàng tìm kiếm sản phẩm hoặc thương hiệu, chọn địa điểm và giờ giao hàng theo ý muốn, thanh toán  an toàn trên cửa hàng trực tuyến của chúng tôi</p>
            <h2>ƯU ĐÃI HẤP DẪN KHI LÀ THÀNH VIÊN CỦA CỬA HÀNG</h2>
            <p>Là thành viên của của hàng không khó mà lại được ưu đãi lên tới 15% khi mua sắm trên ứng dụng . Đăng ký thành viên ngay hôm nay</p>
            <h2>DỊCH VỤ CHUYÊN NGHIỆP</h2>
            <p>Cửa hàng thể hiện sự chuyên nghiệp qua từng cử chỉ, lời nói của nhân viên, qua các hình thức mua hàng, thanh toán tiện lợi.</p>
        </form>
    </form>
</div>

</section>

<!---------------------------- contact section end ------------------------------>


<!-- -------------------------footer--------------------------------------------->

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

<style>  
/*--- contact ---*/
.contact .row{
    display: flex;
    background: white;
    flex-wrap: wrap;
    gap: 1rem;
    padding-left: 4rem;
    padding-right: 4rem;
    padding-bottom:4rem;
}

.contact h1{
  padding-top: 3rem;
  padding-bottom: 2rem;
}

.contact .row .map{
    flex: 1 1 35rem;
    width: 100%;
    object-fit: cover;
}

.contact .row form{
    flex:1 1 20rem ;
    padding: 3rem 2rem;

}

.contact .row form h3{
    text-transform: uppercase;
    font-size: 1.7rem;
    color: red;
    text-align: center;
    padding-bottom: 3rem;
}

.contact .row form h2{
    color: black;
    font-size: 1.3rem;
}

.contact .row form p{
    color: black;
    font-size: 1.1rem;
    padding:1rem 0;
    line-height: 1;
}
</style>
</body>
</html>