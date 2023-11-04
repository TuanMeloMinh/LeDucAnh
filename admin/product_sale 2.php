<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sale</title>
</head>
<body>
    <form action='sale_handler.php' method='get'>
        <table border='1' style='margin: auto;'>
            <?php 
                if(isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if($error == -1) {
                        echo "<tr><td></td><td>không được để trống.</td></tr>";
                    }
                    if($error == -2) {
                        echo "<tr><td></td><td>có lỗi xảy ra.</td></tr>";
                    }
                }
            ?>
            <tr>
                <td>Id sản phẩm: </td>
                <td><input type='text' name='id_product'></td>
            </tr>
            <tr>
                <td>Số tiền giảm: </td>
                <td><input type='text' name='sale'></td>
            </tr>
            <tr>
                <td></td>
                <td><button name='btn'>Áp dụng</button></td>
            </tr>
        </table>
    </form>
</body>
</html>