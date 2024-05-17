<?php
    $sql_sua_danhmucsp="SELECT * FROM category WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmucsp=mysqli_query($connect,$sql_sua_danhmucsp);
    ?>

<p>Sửa danh mục sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <form method="post" action="modules/Quanlydanhmucsanpham/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
        <?php
            while($dong = mysqli_fetch_array($query_sua_danhmucsp)){
            ?>
            <tr>
            <td>Tên danh mục</td>
            <td><input type="text" name="tendanhmuc" value="<?php echo $dong['tendanhmuc']?>"></td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="text" name="thutu" value="<?php echo $dong['thutu']?>"></td>
        </tr>
        <tr>
        
            <td colspan="2"><input type="submit" name="suadanhmucsp" value="Sửa danh mục sản phẩm" class="btn btn-primary"></td>
        </tr>
            <?php
        }
            ?>
  </form>
    
</table>