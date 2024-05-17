<?php
    session_start();
    include("../../admin/config/config.php");
    include("../../admin/helper/helper.php");
    if (!isset($_SESSION['dangky'])) {
        header('location:../../index.php?quanly=dangnhap');
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['themgiohang'])) {

        $id_sp = $_POST['id_sp'];

        $status = 0;

        $product = "SELECT * FROM product WHERE id_sp = $id_sp LIMIT 1";

        $row = executeSelect($connect, $product, false);

        $id_user = $_SESSION['id_khachhang'];

        if ($row) {
            $sql_cart = "SELECT * FROM cart WHERE id_user =  $id_user AND id_sp = $id_sp AND status = $status LIMIT 1";

            $row_cart = executeSelect($connect, $sql_cart, false);

            if ($row_cart) {

                $id_cart = $row_cart['id'];

                $so_luong_mua = $row_cart['soluongmua'] + $_POST['soluong'];

                $sql_update = "UPDATE cart SET soluongmua='".$so_luong_mua."' WHERE id = '$id_cart'";

                $query = mysqli_query($connect, $sql_update);
                if ($query) {
                    echo json_encode(['success' => true]);
                    return;
                } else {
                    echo "Invalid request method.";
                    return;
                }
            } else {
                $data = [
                    'id_user' => $id_user,
                    'id_sp' => $id_sp,
                    'tensanpham' => $row['tensanpham'],
                    'hinhanh' => $row['hinhanh'],
                    'soluongmua' => $_POST['soluong'],
                    'dongia' => $row['giasp'],
                    'status' => 0
                ];
                $insert_cart = insertData($connect, 'cart', $data); 
                if ($insert_cart) {
                    echo json_encode(['success' => true]);
                    return;
                } else {
                    echo "Invalid request method.";
                    return;
                }
            }
        } 
        
    } else {
        // Nếu không phải là yêu cầu POST
        echo "Invalid request method.";
    }
?>