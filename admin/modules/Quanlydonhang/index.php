<?php
    $sql_order = "SELECT * FROM orders";
    $row_order = executeSelect($connect, $sql_order);
    const TRANG_THAI_DON_HANG = [
        0 => 0, // Trạng thái đặt hàng
        1 => 1, // TRạng thái người mua hủy đơn hàng khi người bán chưa xử lý đơn hàng
        2 => 2, // Xác nhận đơn hàng,
        3 => 3 // Đơn hàng thành công
    ];
?>
<div class="card">
    <div class="card-body">
        <h3 class="card-title fs-5 mb-0">Liệt kê đơn hàng</h3>
    </div>
</div>
<div class="card my-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="text-center">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>Mã dh</th>
                    <th>Tổng tiền</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                    <th>In hóa đơn</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                    if (isset($row_order)) {
                        foreach($row_order as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['id_dh']?></td>
                        <td><?php echo $row['ma_dh']?></td>
                        <td><?php echo number_format($row['tong_tien'], 0)?> đ</td>
                        <td><?php echo $row['created_at']?></td>
                        <td>
                            <?php
                                if ($row['status'] == TRANG_THAI_DON_HANG[0]) {
                                    echo "<span class='badge bg-warning text-dark p-2'>Chờ xác nhận</span>";
                                } elseif ($row['status'] == TRANG_THAI_DON_HANG[1]) {
                                    echo "<span class='badge bg-danger p-2'>Đã hủy</span>";
                                }  elseif ($row['status'] == TRANG_THAI_DON_HANG[2]) {
                                    echo "<span class='badge bg-primary p-2'>Đã xác nhận</span>";
                                } elseif ($row['status'] == TRANG_THAI_DON_HANG[3]) {
                                    echo "<span class='badge bg-success p-2'>Giao hàng thành công</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button onclick="show('<?php echo 'dropdown-menu-'. $row['id_dh']?>')" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Chọn
                                </button>
                                <ul id="<?php echo 'dropdown-menu-'. $row['id_dh']?>" class="dropdown-menu">
                                    <li><a class="dropdown-item" href="modules/quanlydonhang/xuly.php?action=xacnhandonhang&id_dh=<?php echo $row['id_dh']?>">Xác nhận</a></li>
                                    <li><a class="dropdown-item" href="modules/quanlydonhang/xuly.php?action=capnhatdonhang&id_dh=<?php echo $row['id_dh']?>">Cập nhật</a></li>
                                    <li><a class="dropdown-item" href="index?action=quanlydonhang&query=chitiet&ma_dh=<?php echo $row['ma_dh']?>">Xem</a></li>
                                    <li><a class="dropdown-item" href="#">Xóa</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <!-- <?php
                                // if ($row['status'] == TRANG_THAI_DON_HANG[3]) {
                            ?>
                             <a href="modules/quanlydonhang/inhoadon.php?ma_dh=<?php echo $row['ma_dh']?>" class="btn btn-primary">In hóa đơn</a>
                            <?php
                                // }
                            ?> -->
                            <a href="modules/quanlydonhang/inhoadon.php?ma_dh=<?php echo $row['ma_dh']?>" class="btn btn-primary">In hóa đơn</a>
                        </td>
                    </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
  function show(ele) {
    if ($(`#${ele}`).hasClass('d-block')) {
        $(`#${ele}`).removeClass('d-block');
    } else {
        $(`#${ele}`).addClass('d-block');
    }
  }
</script>