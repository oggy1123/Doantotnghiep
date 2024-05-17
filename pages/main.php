<main class="container">
   <div class="row">
      <!-- <div class="col-3">
            <?php
            // include("sidebar/sidebar.php");
            ?>
         </div> -->
      <div class="col-12">
         <?php
         if (isset($_GET['quanly'])) {
            $tam = $_GET['quanly'];
         } else {
            $tam = '';
         }
         if ($tam == 'giohang') {
            include("main/giohang.php");
         } else if ($tam == 'tintuc') {
            include("main/tintuc.php");
         } else if ($tam == 'lienhe') {
            include("main/lienhe.php");
         } else if ($tam == 'danhmucsanpham') {
            include('main/danhmuc.php');
         } else if ($tam == 'thoitrangphunu') {
            include('main/danhmuc.php');
         } else if ($tam == 'thoitrangnam') {
            include('main/danhmuc.php');
         } else if ($tam == 'thoitrangtreem') {
            include('main/danhmuc.php');
         } else if ($tam == 'sanpham') {
            include('main/sanpham.php');
         } else if ($tam == 'trangchu') {
            include("main/index.php");
         } else if ($tam == 'dangky') {
            include("main/dangky.php");
         } else if ($tam == 'thanhtoan') {
            include("main/thanhtoan.php");
         } else if ($tam == 'dangnhap') {
            include("main/dangnhap.php");
         } else if ($tam == 'dathang') {
            include("main/dathang.php");
         } else if ($tam == 'donmua') {
            include("main/quanlydonhang.php");
         } elseif ($tam == 'taikhoannguoidung') {
            include("main/taikhoan.php");
         }
         else {
            include("main/index.php");
         }
         ?>
      </div>
   </div>
</main>