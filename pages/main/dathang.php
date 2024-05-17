

<div class="card">
    <div class="card-body">
        <h3>Đặt hàng</h3>
        <div>
            <h4>Địa Chỉ Nhận Hàng</h4>
            <div class="row">
                <div class="col-5">
                    <h3 class="fs-4"><?php echo $_SESSION['dangky'] ?? ''?></h3>
                    <p class="fs-6 fw-bolder">(+84) <?php echo $_SESSION['dienthoai'] ?? ''?></p>
                </div>
                <div class="col-7">
                    <h3 class="fs-5 fw-normal"><?php echo $_SESSION['diachi'] ?? ''?></h3>
                </div>
            </div>
        </div>
        <table class="table my-4">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn Giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $tongtien = 0;
                    if (isset($_SESSION['carts'])) {
                        foreach($_SESSION['carts'] as $cart_item) {
                            $tensanpham = $cart_item['tensanpham'];
                            $hinhanh = $cart_item['hinhanh'];
                            $soluong = $cart_item['soluongmua'];
                            $gia = $cart_item['dongia'];
                            $thanhtien = $soluong * $gia;
                            $tongtien = $tongtien + $thanhtien;
                            $id_cart = $cart_item['id'];
                ?>
                    <tr>
                        <td class="text-break"><?php echo $tensanpham?></td>
                        <td><img src="admin/modules/Quanlysanpham/uploads/<?php echo $hinhanh?>" alt="" width="50px"></td>
                        <td><?php echo $soluong?></td>
                        <td><?php echo  number_format($gia, 0)?> đ</td>
                        <td style="color: red;"><?php echo number_format($thanhtien, 0)?> đ</td>
                    </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
        <div class="my-5">
            <div class="row">
                <div class="col-6">
                    <h5>Phương thức thanh toán</h5>
                </div>
                <div class="col-6">
                    <h5 class="text-end fs-4">Thanh toán khi nhận hàng</h5>
                    <div>
                        <div class="row mt-3">
                            <div class="col-5"></div>
                            <div class="col-4">Tổng tiền hàng</div>
                            <div class="col-3" style="color:red;"><?php echo  number_format($tongtien, 0)?> đ</div>
                        </div>
                        <div class="row my-3">
                            <div class="col-5"></div>
                            <div class="col-4">Tổng thanh toán</div>
                            <div class="col-3" style="color:red;"><?php echo  number_format($tongtien, 0)?> đ</div>
                        </div>
                        <div class="text-end">
                            <a type="button" href="index.php?quanly=thanhtoan" class="btn btn-danger py-2 px-5 fw-bolder">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>