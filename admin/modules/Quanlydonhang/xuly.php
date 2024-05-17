<?php
     include("../../config/config.php");
      
     include("../../helper/helper.php");

     if ($_GET['action'] == 'xacnhandonhang') {
        $id_dh = $_GET['id_dh'];
        $status = 2; // Trạng thái xác nhận đơn hàng
        $update = mysqli_query($connect, "UPDATE orders SET status = $status WHERE id_dh = $id_dh");
        if ($update) {
            header('Location:../../index.php?action=quanlydonhang&query=lietke');
        }
     } elseif ($_GET['action'] == 'capnhatdonhang') {
        $id_dh = $_GET['id_dh'];
        $status = 3; // Trạng thái đơn hàng thành công
        $update = mysqli_query($connect, "UPDATE orders SET status = $status WHERE id_dh = $id_dh");
        if ($update) {
            $order = executeSelect($connect, "SELECT * FROM orders WHERE id_dh = $id_dh", false);
            $ma_dh = $order['ma_dh'];
            mysqli_query($connect, "UPDATE order_detail SET status = $status WHERE ma_dh = $ma_dh");
            header('Location:../../index.php?action=quanlydonhang&query=lietke');
        }
     }
?>