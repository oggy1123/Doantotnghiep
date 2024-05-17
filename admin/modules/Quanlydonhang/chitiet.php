<?php
    // echo $_GET['ma_dh'];
    $ma_dh = $_GET['ma_dh'];
    $order_detail = executeSelect($connect, "SELECT * FROM order_detail WHERE ma_dh = $ma_dh");
?>
<div class="card">
    <div class="card-body">
        <h3 class="card-title fs-5">Chi tiết đơn hàng</h3>
    </div>
</div>
<div class="card my-3">
    <div class="card-body">
        <table class="table table-hover text-center">
            <thead class="text-center">
                <tr>
                    <th>Mã dh</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($order_detail)) {
                        foreach($order_detail as $row) {
                ?>
                   <tr>
                        <td><?php echo $row['ma_dh']?></td>
                        <td><?php echo $row['tensanpham']?></td>
                        <td>
                            <img src="modules/Quanlysanpham/uploads/<?php echo $row['hinhanh']?>" width="70px" height="70px" alt="">
                        </td>
                        <td><?php echo $row['soluong']?></td>
                        <td><?php echo number_format($row['dongia'], 0)?> đ</td>
                        <td><?php echo number_format($row['thanh_tien'], 0)?> đ</td>
                   </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>