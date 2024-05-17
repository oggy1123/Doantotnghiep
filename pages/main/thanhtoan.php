
<?php
    // insert cart $carts[0]['id']
        $cart_info = $_SESSION['carts'];
        
    if (isset($cart_info)) {

        $id_khachhang = $_SESSION['id_khachhang'];
        $tenkhachhang = $_SESSION['dangky'];
        $email =  $_SESSION['email'] ;
        $diachi = $_SESSION['diachi'];
        $dienthoai = $_SESSION['dienthoai'];
        $tong_tien = 0;
        $status = 1;

        foreach($cart_info as $cart) {
            $id_cart = $cart['id'];
            $tong_tien += $cart['dongia'] * $cart['soluongmua'];
            $sql_update = "UPDATE cart SET status='".$status."' WHERE id = '$id_cart'";
            mysqli_query($connect, $sql_update);
        }
        $ma_dh = rand(0,999999);
        $data_order = [
            'ma_dh' => $ma_dh,
            'id_user' => $id_khachhang,
            'tong_tien' => $tong_tien,
            'status' => 0
        ];
        $insert_order = insertData($connect, 'orders', $data_order);
        if ($insert_order) {
            foreach($cart_info as $cart) {
                $id_sp = $cart['id_sp'];
                $tensanpham = $cart['tensanpham'];
                $hinhanh = $cart['hinhanh'];
                $dongia = $cart['dongia'];
                $soluong = $cart['soluongmua'];
                $thanhtien = $soluong * $dongia;
                $sql_insert = "INSERT INTO order_detail(id_sp, tensanpham, hinhanh, ma_dh, dongia, soluong, thanh_tien) 
                VALUES ('$id_sp','$tensanpham','$hinhanh','$ma_dh','$dongia', '$soluong', '$thanhtien')";
                mysqli_query($connect, $sql_insert);
            }
        }
        unset($_SESSION['carts']);
        echo "<script>window.location.href = 'index.php?quanly=donmua';</script>";
    }
?>