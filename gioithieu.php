

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

<!-- --------------------------------------------NOI DUNG GIOI THIEU------------------------------------- -->


<br>
<div class="imformation">
  <div id="top-imformation">
    <h3>GIỚI THIỆU CƠ KHÍ TÂN HOÀN HẢO</h3>
      <br>
        <br>
        <strong><p><h2>- Giới thiệu chung </h2></strong> <br>Cơ Khí Tân Hoàn Hảo. Sàn thương mại điện tử về cơ khí khởi nguồn từ Việt Nam, nơi mà khách hàng thỏa sức tìm hiểu về những sản phẩm ngành cơ khí, hơn nữa là sự an tâm về chất lượng cũng như giá cả và trải nghiệm mua sắm tuyệt vời cùng với chúng tôi.
        <br><br></p>
        <strong><p><h2>- Mục tiêu và sứ mệnh:</h2></strong><br> Mục tiêu của Cơ Khí Tân Hoàn Hảo là trở thành sàn thương mại trực tuyến về ngành cơ khí đầu tiên lớn nhất tại Việt Nam. Nhằm đem đến cho người tiêu dùng sản phẩm chất lượng, giá cả hợp lý, dịch vụ chăm sóc khách hàng tốt nhất.
        <br><br>Sứ mệnh của Cơ Khí Tân Hoàn Hảo đối với khách hàng là đem đến sự trải nghiệm mua sắm thú vị, thông minh, tiện lợi. Sự an tâm tuyệt đối từ khách hàng về chất lượng sản phẩm, chính sách đổi trả miễn phí đối với các mặt hàng không đúng chất lượng.<br><br>Về đối tác kinh doanh, sứ mệnh của Cơ Khí Tân Hoàn Hảo là thấu hiểu những nỗi đau mà đối tác gặp phải, luôn đặt vấn đề và giải quyết nhanh chóng theo các điều khoản của Cơ Khí Tân Hoàn Hảo, khắc phục những khó khăn của đối tác và phù hợp với khách hàng.<br></p>
        <br> 
        <img src="images/gioithieu.jpg" > 
      <br>          
  </div>
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
/*---------------------footer------------------------*/

body{
  font-family: arial;height: 100vh;
  margin: 50px auto;
  background-color:   #fff;
 /* background-image: url("images/main.jpg");*/
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  background-attachment: fixed; 
  margin: 0px auto;
  float: left;
  z-index: -1;
}                    
.container{
  width: 1100px;
  margin-left: 90px;
}
h1{
  text-align: center;
}
.product-items{
  padding: 30px;
}
.product-item{
  float: left;
  width: 23%;
  margin: 1%;
  padding: 10px;
  box-sizing: border-box;
  /*border: 1px solid #ccc;*/
  line-height: 26px;
  background-color: #fff;
}
.product-item:hover
{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);     
}
.product-item label{
  font-weight: bold;
}
.product-item p{
  margin: 0;
  line-height: 26px;
  max-height: 52px;
  overflow: hidden;
}
.product-price{
  color: red;
  font-weight: bold;
}
.product-img{
  margin-bottom: 5px;
}
.product-item img{
  width: 150px;
  height: 130px; 
  padding-left: 30px;
}
.product-item ul{
  margin: 0;
  padding: 0;
  border-right: 2px solid green;
}
.product-item ul li{
  float: left;
  width: 33.3333%;
  list-style: none;
  text-align: center;
  border: 1px solid green;
  border-right: 0;
  box-sizing: border-box;
}
.clear-both{
  clear: both;
}
a{
  text-decoration: none;
}
.buy-button{
  text-align: right;
  margin-top: 10px;
}
.buy-button a:hover
{
  background-color: #f3c110;
  color: #008000;
  font-size: 20px;
}
.buy-button a{
  background: green;
  padding: 5px;
  color: #fff;
}
#pagination{
  text-align: right;
  margin-top: 15px;
}
.page-item{
  border: 1px solid #ccc;
  padding: 5px 9px;
  color: #000;
}
.current-page{
  background: #000;
  color: #FFF;
}
#wrapper-product{
font-family: 'Bitter', serif;
font-family: 'Markazi Text', serif;
font-family: 'Merriweather', serif;
font-family: 'Source Sans Pro', sans-serif;
margin-bottom: 20px;
}
#product-search
{
  margin: 0 40px;
  padding-bottom: 20px;
  border-bottom: 1px solid #ccc;
}
#product-search input[type='submit']
{
  width: 150px;
  float: right;
}
  #product-search input[type='text']
{
  width: 710px;
}
.introduce{
  display: flex;
     width: 1100px;
  margin-left: 90px;
}
.left-container{
  width: 300px;
  height: 306px;
  margin-top: 10px;
  border: 1px solid #ccc;               
}
.left-container ul li 
{
text-decoration: none; 
list-style: none; font-family: 'Bitter', serif;
font-family: 'Markazi Text', serif;
font-family: 'Merriweather', serif;
font-family: 'Noto Sans', sans-serif;
font-family: 'Source Sans Pro', sans-serif;                    
}
.left-container #danhsach
{
  height: 53px;
  background-color: #4CAF50;
  line-height: 53px;
  text-align: center;
}
.left-container #danhsach p
{
  margin:auto;color: white;
}
#nd:hover
{
 background-color:  #F3C110;
 font-size: 25px;
 color: white;
}
.left-container #nd a
{
  color: #000;
}
 .left-container #nd a:hover
{
  color: #fff;
   font-size: 25px;
}
.left-container #nd
{
  height: 50px;
  padding-left: 10px;
  padding-bottom: -1px;
  line-height: 50px;
  border-bottom: 0.5px dotted #ccc;                    
}
.slideshow-container {
  width: 700px;
  position: relative;
  margin-top: -10px;
  margin-right: 50px;
  margin-bottom: 180px;
  margin-left: 20px;
  height: 150px;
}
.slideshow-container #tin-phoi-giong{
  width: 900px;
  min-height: 250px;
  padding: 10px 10px 10px 10px;
}
.slideshow-container #detail{
  background-color: lightgreen;
  height: 40px;
  color: #FFF;
  padding-left: 10px;
  line-height: 40px;
  width: 945px;
}
.slideshow-container #tin-phoi-giong #anh{
  float: left;
}
.slideshow-container #tin-phoi-giong #anh img{
  padding-top:  12px;             
  padding-left:   30px;
  width: 700px;
  height: 300px;
}
.slideshow-container #tin-phoi-giong #chi-tiet{
  width: 450px;
  min-height: 100px;
  padding-left: 15px;
  float: left;
}
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}
.numbertext {
  color: #f2f2f2;
  font-size: 14px;
  padding: 8px 12px 0px 390px;
  position: absolute;
  top: 0;
}
#dott
{
 margin:auto;
 margin-left: 200px;
 height: 30px;
}
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 8px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}
.active, .dot:hover {
  background-color: #717171;
}
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 0s;
  animation-name: fade;
  animation-duration: 0s;
}
@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</body>
</html>