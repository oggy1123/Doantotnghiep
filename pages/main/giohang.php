
<?php
    if (!isset($_SESSION['dangky'])) {
        echo "<script>window.location.href = 'index.php?quanly=dangnhap';</script>";
        exit;
    }
    $id_user = $_SESSION['id_khachhang'];
    $carts = "SELECT * FROM cart WHERE id_user =  $id_user AND status = 0";
    $data = executeSelect($connect, $carts);
?>
<p style="display:flex;align-items: baseline;">Welecom
    <?php
        if(isset($_SESSION['dangky'])) {
            echo ''.'<span style="color:red;display:flex;margin-left:5px;">'.':' .$_SESSION['dangky'].'</span>';
            
        } 
    ?>
</p>
<div class="card">
    <div class="card-body">
        <table class="table" >
            <thead>
                <tr>
                    <th>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onchange="chooseAllCart(this)" id="check_all">
                        </div>
                    </th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn Giá</th>
                    <th>Số Tiền</th>
                    <th>Xóa </th>
                </tr>
            </thead>
            <tbody id="tbody_cart">
                <?php
                    if(isset($data)) {
                        $tongtien = 0;
                        foreach($data as $cart_item) {
                            $tensanpham = $cart_item['tensanpham'];
                            $hinhanh = $cart_item['hinhanh'];
                            $soluong = $cart_item['soluongmua'];
                            $gia = $cart_item['dongia'];
                            $thanhtien = $soluong * $gia;
                            $tongtien = $tongtien + $thanhtien;
                            $id_cart = $cart_item['id'];  
                ?>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input check_cart" onchange="chooseOneCart(this)" data-total="<?php echo $thanhtien?>" type="checkbox" value="<?php echo $id_cart?>" id="input_check_id<?php echo $id_cart?>">
                            </div>
                        </td>
                        <td class="text-break"><?php echo $tensanpham?></td>
                        <td><img src="admin/modules/Quanlysanpham/uploads/<?php echo $hinhanh?>" alt="" width="50px"></td>
                        <td>
                            <a class="text-decoration-none fs-4 text-dark" href="pages/main/congtrusoluong.php?cong=<?php  echo $id_cart?>">+</a>
                            <span class="d-inline mx-2"><?php echo $soluong?> </span>
                            <a class="text-decoration-none fs-3 text-dark" href="pages/main/congtrusoluong.php?tru=<?php  echo $id_cart?>">-</a></td>
                        <td><?php echo  number_format($gia, 0)?> đ</td>
                        <td style="color: red;"><?php echo number_format($thanhtien, 0)?> đ</td>
                        <td><a href="pages/main/xoacart.php?xoa=<?php echo $id_cart?>">Xóa</a></td>
                    </tr>
                <?php
                        }
                    } else {
                ?>
                    <tr >
                        <td colspan=8><p>Hiện tại giỏ hàng còn trống</p></td>

                    </tr>
                <?php
                    }
                ?>
        </table>
        <div>
            <div class="row">
                <div class="col-9">
                    <h3 class="fs-5 fw-normal">Tổng thanh toán  <span class="d-inline ms-3" id="so_luong_ban">(0 Sản phẩm): 0 đ</span></h3>
                </div>
                <div class="col-3">
                    <input type="button" class="py-2 px-4 btn btn-danger" id="add_cart" onclick="purchase()" value="Mua Hàng">
                </div>
            </div>
        </div>
    </div>
</div>
<script>

   
    function formatMoney(number) {
        let formattedNumber = number.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        return formattedNumber;
    }

    function chooseAllCart(ele) {
        let check_cart = $('#tbody_cart .check_cart');

        if ($(ele).prop('checked')) {

            check_cart.prop('checked', true);

        } else {

            check_cart.prop('checked', false);
        }
        let tong_tien_don_hang = 0;
        let so_luong_san_pham_ban = 0
        check_cart.each((index, item) => {
            if ($(item).prop('checked')) {
                so_luong_san_pham_ban ++;
                tong_tien_don_hang += Number($(item).data('total'));
            }
        });
        $('#so_luong_ban').text(`(${so_luong_san_pham_ban} Sản phẩm): ${formatMoney(tong_tien_don_hang)}`);
    }

    function chooseOneCart (ele) {
        let check_cart = $('#tbody_cart .check_cart');
        let tong_tien_don_hang = 0;
        let so_luong_san_pham_ban = 0
        check_cart.each((index, item) => {
            if ($(item).prop('checked')) {
                so_luong_san_pham_ban ++;
                tong_tien_don_hang += Number($(item).data('total'));
            }
        });
        $('#so_luong_ban').text(`(${so_luong_san_pham_ban} Sản phẩm): ${formatMoney(tong_tien_don_hang)}`);
    }

    function purchase() {
        let check_cart = $('#tbody_cart .check_cart');
        let isChecked = false;
        let cartId = [];
        check_cart.each((index, item) => {
            if ($(item).prop('checked')) {
                isChecked = true;
                return false;
            }
        });
        if (!isChecked) {
            Swal.fire({
                html: "<p style='font-size: 22px;'>Bạn vẫn chưa chọn sản phẩm nào để mua</p>"
            });
        } else {
            check_cart.each((_, item) => {
                if ($(item).prop('checked')) { 
                    let id = $(item).val();
                    cartId.push({
                        id: id
                    })
                }
            })
            $.ajax({
                url: 'pages/main/ajaxxulycart.php',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ cartId: cartId }),
                cache : false,
                processData: false,
                contentType: false,
                success: function(response) {
                    window.location = "index.php?quanly=dathang";
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi nếu có
                    console.error('Lỗi khi gửi yêu cầu:', error);
                }
            });
        }
    }
</script>