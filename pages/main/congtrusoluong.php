<?php
    session_start();
    include("../../admin/config/config.php");
    include("../../admin/helper/helper.php");

    // cộng số lượng giỏ hàng
    //  print_r($_SESSION['cart']);
    
    if(isset($_GET['cong'])) {

        $id = $_GET['cong'];

        $sql_cart = "SELECT * FROM cart WHERE id =  $id LIMIT 1";

        $row_cart = executeSelect($connect, $sql_cart, false);

        if ($row_cart) {

            $so_luong_mua = $row_cart['soluongmua'] + 1;

            $sql_update = "UPDATE cart SET soluongmua='".$so_luong_mua."' WHERE id = '$id '";

            $query = mysqli_query($connect, $sql_update);

            if ($query) {
                header('location:../../index.php?quanly=giohang');
            } else {
                echo "Invalid request method.";
                return;
            }
        } else {
            echo "Invalid request method.";
            return;
        }
    }

    // Trừ số lượng gio hàng
    if(isset($_GET['tru'])) {

        $id = $_GET['tru'];
        
        $sql_cart = "SELECT * FROM cart WHERE id =  $id LIMIT 1";

        $row_cart = executeSelect($connect, $sql_cart, false);

        if ($row_cart) {

            $so_luong_mua = $row_cart['soluongmua'] - 1;

            $sql_update = "UPDATE cart SET soluongmua='".$so_luong_mua."' WHERE id = '$id '";

            $query = mysqli_query($connect, $sql_update);

            if ($query) {
                header('location:../../index.php?quanly=giohang');
            } else {
                echo "Invalid request method.";
                return;
            }
        } else {
            echo "Invalid request method.";
            return;
        }
    }
?>
