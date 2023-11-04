<?php
    $conn = mysqli_connect("localhost","root","","demo_db");
    $id_product = "";
    $sale = "";
    if(isset($_GET['btn'])) {
        $id_product = $_GET['id_product'];
        $sale = $_GET['sale'];
        $sql = "SELECT * FROM product WHERE id='$id_product'";
        $result = $conn->query($sql);
        $sql_add = "INSERT INTO voucher(id_product, sale) VALUES ('$id_product', '$sale')";
        if($id_product == "" || $sale == "")
            header('Location: ./product_sale.php?error=-1');
        else {
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $price = $row['price'];
                }
                $present = $price - $sale;
                if($present > 0) {
                    if($conn->query($sql_add))
                        header('Location: ./product_listing.php');
                } else {
                    header('Location: ./product_sale.php?error=-2');
                }
            }
        }
    }