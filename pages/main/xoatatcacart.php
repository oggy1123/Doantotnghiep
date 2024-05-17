<?php
   session_start();
   if(isset($_GET['xoatatca']) && ($_GET['xoatatca']==1)){
       unset($_SESSION['cart']);
   }
   header('location:../../index.php?quanly=giohang');
?>