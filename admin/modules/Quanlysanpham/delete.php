<?php
    include("../../config/config.php");
     $id = $_GET['id_sanpham'];
     $sql = "SELECT * FROM product WHERE id_sp = $id";
     $query = mysqli_query($connect,$sql);
    while($row = mysqli_fetch_array($query)){
         unlink('uploads/'.$row['hinhanh']);
        }
    $sql_xoa = "DELETE FROM product WHERE id_sp = '".$id."'";
     mysqli_query($connect,$sql_xoa);
     header('Location:../../index.php?action=quanlysanpham&query=lietke');
?>