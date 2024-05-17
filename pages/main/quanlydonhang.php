<?php
    $id_user = $_SESSION['id_khachhang'];
    // $sql_orders = "SELECT * FROM orders, order_detail WHERE id_user = $id_user AND orders.ma_dh = order_detail.ma_dh";
    // $sql_orders = "SELECT * FROM orders INNER JOIN order_detail ON orders.ma_dh = order_detail.ma_dh WHERE orders.id_user = $id_user";
    $sql_orders = "SELECT * FROM orders WHERE id_user = $id_user";
    $row_orders = executeSelect($connect, $sql_orders);
    const TRANG_THAI_DON_HANG = [
        0 => 0, // Trạng thái đặt hàng
        1 => 1, // TRạng thái người mua hủy đơn hàng khi người bán chưa xử lý đơn hàng
        2 => 2, // Đã xác nhận đơn hang và giao hàng
        3 => 3 // Giao hàng thành công
    ];
    
?>
<div class="card">
    <div class="card-body">
        <h3 class="fs-5">Quản lý đơn hàng</h3>
    </div>
</div>
<?php
    if (isset($row_orders)) {
        foreach($row_orders as $order) {
            $md_dh = $order['ma_dh'];
           
?>
<div class="card my-4">
    <div class="card-body">
        <div class="row my-2">
            <div class="col-4">
                <h3 class="fs-5">Mã đơn hàng:  <?php echo $order['ma_dh']?></h3>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
                <h3 class="fs-6 text-end">
                    <?php
                        if ($order['status'] == TRANG_THAI_DON_HANG[0]) {
                            echo "<span class='badge bg-warning text-dark p-2'>CHỜ XÁC NHẬN</span>";
                        } elseif ($order['status'] == TRANG_THAI_DON_HANG[1]) {
                            echo "<span class='badge bg-danger p-2'>ĐÃ HỦY</span>";
                        }  elseif ($order['status'] == TRANG_THAI_DON_HANG[2]) {
                            echo "<span class='badge bg-primary p-2'>ĐÃ XÁC NHẬN: ĐANG GIAO HÀNG</span>";
                        } elseif ($order['status'] == TRANG_THAI_DON_HANG[3]) {
                            echo "<span class='badge bg-success p-2'>GIAO HÀNG THÀNH CÔNG</span>";
                        }
                    ?>
                </h3>
            </div>
        </div>
        <?php
            $sql_order_detail = executeSelect($connect, "SELECT * FROM order_detail WHERE ma_dh = $md_dh");
            if (isset($sql_order_detail)) {
                foreach($sql_order_detail as $order_detail) {
        ?>
            <div>
                <div class="row">
                    <div class="col-1">
                        <div>
                            <img src="admin/modules/Quanlysanpham/uploads/<?php echo $order_detail['hinhanh']?>" width="100%" height="70px" alt="">
                        </div>
                    </div>
                    <div class="col-9 fs-6">
                        <p><?php echo $order_detail['tensanpham']?></p>
                        <p>X<?php echo $order_detail['soluong']?></p>
                    </div>
                    <div class="col-2">
                        <div style="color: red;" class="text-end">
                            <p><?php echo number_format($order_detail['thanh_tien'], 0)?> đ</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
                }
            }
        ?>
        <div>
            <div class="text-end fs-5">
                Thành tiền: <span class="d-inline ms-5" style="color: red;"><?php echo number_format($order['tong_tien'], 0)?> đ</span> 
            </div>
            <div class="text-end my-3">
                <?php
                    if ($order['status'] == TRANG_THAI_DON_HANG[0]) {
                ?>
                    <a href="pages/main/xulydonhang.php?action=huydonhang&id_dh=<?php echo $order['id_dh']?>" class="btn btn-outline-danger py-2 px4">Hủy Đơn Hàng</a>
                <?php
                    } else if ($order['status'] == TRANG_THAI_DON_HANG[1]) {

                ?>
                    <a href="pages/main/mualai.php?action=mualai&ma_dh=<?php echo $order['ma_dh']?>" class="btn btn-danger py-2 px4">Mua lại</a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
        }
    }
?>