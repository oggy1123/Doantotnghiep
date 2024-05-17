<?php
include("banner.php");

?>
<?php
$id = $_GET['id'];
$sql_pro = "SELECT product.*,category.id_danhmuc, category.tendanhmuc FROM product,category WHERE product.id_danhmuc = category.id_danhmuc AND product.id_danhmuc = '$id' ORDER BY id_sp DESC ";
$query_pro = mysqli_query($connect, $sql_pro);
// get tên danh muc
$sql_cate = "SELECT * FROM category WHERE category.id_danhmuc = '$id' LIMIT 1";
$query_cate = mysqli_query($connect, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<div class="card my-5">
   <div class="card-body">
      <div class="list-product">
         <h3><?php echo $row_title['tendanhmuc'] ?> </h3>
         <div class="list-item">
            <?php
            if ($query_pro) {
               while ($row = mysqli_fetch_array($query_pro)) {
                  $id_sanpham = $row['id_sp'];
                  $tendanhmuc = $row['tendanhmuc'];
                  $hinhanh = $row['hinhanh'];
                  $tensanpham = $row['tensanpham'];
                  $giasp = $row['giasp'];
            ?>
                  <div class="item">
                     <a href="index.php?quanly=sanpham&id=<?php echo $id_sanpham ?>" class="item-link">
                        <img src="admin/modules/Quanlysanpham/uploads/<?php echo $hinhanh ?>">
                     </a>
                     <div class="home-title">
                        <span class="style"><?php echo $tendanhmuc ?></span>
                        <a href="index.php?quanly=sanpham&id=<?php echo $id_sanpham ?>">
                           <h4><?php echo $tensanpham ?></h4>
                        </a>
                        <span class="price"><?php echo  number_format($giasp, 0) ?> VND</span>
                     </div>
                  </div>
            <?php
               }
            }
            ?>
         </div>
      </div>
   </div>
</div>