<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    ?>
    <div class="main-content">
        <h1><?= !empty($_GET['id']) ? ((!empty($_GET['task']) && $_GET['task'] == "copy") ? "Copy thành viên" : "Sửa thành viên") : "Thêm thành viên" ?></h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['re_password']) && !empty($_POST['re_password'])) {
                    if (empty($_POST['username'])) {
                        $error = "Bạn phải nhập tên đăng nhập";
                    } elseif (empty($_POST['password'])) {
                        $error = "Bạn phải nhập mật khẩu";
                    } elseif (empty($_POST['re_password'])) {
                        $error = "Bạn phải nhập xác nhận mật khẩu";
                    } elseif ($_POST['password'] != $_POST['re_password']) {
                        $error = "Mật khẩu xác nhận không khớp";
                    }
                    if (!isset($error)) {
                        if ($_GET['action'] == 'edit' && !empty($_GET['id'])) {
                            $result = mysqli_query($con, "UPDATE `product` SET `name` = '" . $_POST['name'] . "',`image` =  '" . $image . "', `price` = " . str_replace('.', '', $_POST['price']) . ", `loai` = '" . $_POST['loai'] . "', `mieuta` = '" . $_POST['mieuta'] . "', `last_updated` = " . time() . " WHERE `product`.`id` = " . $_GET['id']);
                        } else { 
                            $checkExistUser =  mysqli_query($con, "SELECT * FROM `user` WHERE `username` = '".$_POST['username']."'");
                            if($checkExistUser->num_rows != 0){
                                $error = "Tên đăng nhập đã tồn tại. Bạn vui lòng chọn tên đăng nhập khác";
                            }else{                              
                                $result = mysqli_query($con, "INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `level`, `diachi`, `sdt`, `created_time`, `last_updated`) VALUES (NULL, '".$_POST['username']."', '".$_POST['fullname']."', MD5('".$_POST['password']."'), 'number', 'number', 'number', '".time()."', '".time()."');");
                            }
                        }
                        if (!$result) { 
                            $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                        } else { 
                            if (!empty($galleryImages)) {
                                $product_id = ($_GET['action'] == 'edit' && !empty($_GET['id'])) ? $_GET['id'] : $con->insert_id;
                                $insertValues = "";
                                foreach ($galleryImages as $path) {
                                    if (empty($insertValues)) {
                                        $insertValues = "(NULL, " . $product_id . ", '" . $path . "', " . time() . ", " . time() . ")";
                                    } else {
                                        $insertValues .= ",(NULL, " . $product_id . ", '" . $path . "', " . time() . ", " . time() . ")";
                                    }
                                }
                                $result = mysqli_query($con, "INSERT INTO `image_library` (`id`, `product_id`, `path`, `created_time`, `last_updated`) VALUES " . $insertValues . ";");
                            }
                        }
                    }
                } else {
                    $error = "Bạn chưa nhập thông tin thành viên.";
                }
                ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
                    <a href = "member_listing.php">Quay lại danh sách thành viên</a>
                </div>
                <?php
            } else {
                if (!empty($_GET['id'])) {
                    $result = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = " . $_GET['id']);
                    $product = $result->fetch_assoc();
                    $gallery = mysqli_query($con, "SELECT * FROM `image_library` WHERE `product_id` = " . $_GET['id']);
                    if (!empty($gallery) && !empty($gallery->num_rows)) {
                        while ($row = mysqli_fetch_array($gallery)) {
                            $product['gallery'][] = array(
                                'id' => $row['id'],
                                'path' => $row['path']
                            );
                        }
                    }
                }
                ?>
                <form id="editing-form" method="POST" action="<?= (!empty($product) && !isset($_GET['task'])) ? "?action=edit&id=" . $_GET['id'] : "?action=add" ?>"  enctype="multipart/form-data">
                    <input type="submit" title="Lưu thành viên" value="" />
                    <div class="clear-both"></div>

                    <div class="wrap-field">
                        <label>Tên đăng nhập: </label>
                        <input type="text" name="username" value="<?= (!empty($product) ? $product['username'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Tên thành viên: </label>
                        <input type="text" name="fullname" value="<?= (!empty($product) ? number_format($product['fulname'], 0, ",", ".") : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Mật khẩu: </label>
                        <input type="password" name="password" value="<?= (!empty($product) ? number_format($product['password'], 0, ",", ".") : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Nhập lại mật khẩu: </label>
                        <input type="password" name="re_password" value="<?= (!empty($product) ? number_format($product['re_password'], 0, ",", ".") : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Địa chỉ: </label>
                        <input type="text" name="diachi" value="<?= (!empty($product) ? number_format($product['diachi'], 0, ",", ".") : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                </form>
                <div class="clear-both"></div>
                <script>
                    CKEDITOR.replace('product-content');
                </script>
    <?php } ?>
        </div>
    </div>

    <?php
}

?>