<?php
  
   if(isset($_GET['dangxuat'])&&($_GET['dangxuat']==1)){
     unset($_SESSION['dangnhap'],$_SESSION['avata']);
     header('location:login.php');
   }
?>                      
 <div class="sidebar p-3">
      <ul class="p-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=dashbord">Thống kê doanh thu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlydanhmucsanpham&query=lietke">Danh mục sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlysanpham&query=lietke">Sản phẩm</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="index.php?action=gallery&query=lietke">Gallery</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlydonhang&query=lietke">Đơn hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlynguoidung&query=lietke">Người dùng</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlydanhmucbaiviet&query=them">Danh mục bài viết</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlybaiviet&query=them">Bài viết</a>
            </li> -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="index.php?action=bai2&query=liet">Bài vi2</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?dangxuat=1">Đăng xuất</a>
            </li>        
    </ul>
 </div>
