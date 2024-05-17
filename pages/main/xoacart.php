<?php
   session_start();
   // xóa san phẩm gio hàng
//    session_destroy();
  $product = $_SESSION['cart'];
    if(isset($_SESSION['cart'])&& ($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach($product as $cart_item){
            if($cart_item['id'] != $id){
                 $new_product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id']
                 ,'hinhanh'=>$cart_item['hinhanh'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'masp'=>$cart_item['masp']);
                 $_SESSION['cart'] = $new_product;
            }
        }
        // print_r($_SESSION['cart']);
    }

   header('location:../../index.php?quanly=giohang');
?>