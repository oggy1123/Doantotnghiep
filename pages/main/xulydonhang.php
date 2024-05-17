<?php
    include("../../admin/config/config.php");
    include("../../admin/helper/helper.php");

    //$status = [0, 1, 2, 3, 4]
    $action = $_GET['action'];
    if ($action && $action == 'huydonhang') {
        $id_dh = $_GET['id_dh'];
        $status = 1 ;// Trang thai huy don hang;
        $update_dh = mysqli_query($connect, "UPDATE orders SET status = $status WHERE id_dh = $id_dh");
        if ($update_dh) {
            $order = executeSelect($connect, "SELECT * FROM orders WHERE id_dh = $id_dh", false);
            $ma_dh = $order['ma_dh'];
            mysqli_query($connect, "UPDATE order_detail SET status = $status WHERE ma_dh = $ma_dh");
            echo '<script>alert("Bạn đã gửi đơn hàng thành công.");</script>';
            header('location:../../index.php?quanly=donmua');
        }
    }
?>