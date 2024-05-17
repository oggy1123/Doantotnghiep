<?php
   // include('../../admin/config/config.php');
   // include('../../admin/helper/helper.php');
   include("banner.php");

?>
<?php
   $sql_pro = "SELECT product.* FROM product,category WHERE product.id_danhmuc=category.id_danhmuc ORDER BY product.id_sp DESC LIMIT 8";
   $query_pro = executeSelect($connect, $sql_pro);
?>
<div class="card" style="margin-top: 130px;">
   <div class="card-body">
      <h3 class="fs-4 fw-bold">Tất cả sản phẩm</h3>
      <div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
               <?php
                  if ($query_pro) {
                  foreach($query_pro as $row) {
                     $giasp = intval($row['giasp']);
               ?>

                  <div class="col-3 h-380">
                     <a class="d-block text-decoration-none h-100" style="color: #000;" href="index.php?quanly=sanpham&id=<?php echo $row['id_sp'] ?>">
                        <div class="card h-100 shadow-sm mb-5 bg-body rounded">
                           <img src="admin/modules/Quanlysanpham/uploads/<?php echo $row['hinhanh']?>" class="card-img-top" alt="...">
                           <div class="card-body">
                              <p class="card-title fs-6 fw-normal truncate-text"><?php echo $row['tensanpham']?></>
                              <p class="card-text" style="color: red;"><?php echo  number_format($giasp, 0)?> đ</p>
                           </div>
                        </div>
                     </a>
                  </div>
               <?php
                  }
               }
               ?>
            </div>
      </div>
   </div>
</div>
<?php
   $category = executeSelect($connect, "SELECT * FROM category ORDER BY category.id_danhmuc DESC");
?>

<?php
   if ($category) {
      foreach($category as $row) {
         $id_danhmuc = $row['id_danhmuc'];
?>
   <div class="card my-4">
      <div class="card-body">
         <h3 class="fs-4 fw-bold p-3 mb-0 card-title"><?php echo $row['tendanhmuc']?></h3>
         <div>
               <div class="row row-cols-1 row-cols-md-3 g-4">
                  <?php
                     $product = executeSelect($connect, "SELECT * FROM product WHERE id_danhmuc = $id_danhmuc LIMIT 8");
                     if ($product ) {
                     foreach($product as $row) {
                        $giasp = intval($row['giasp']);
                  ?>
                     <div class="col-3 h-380">
                        <a class="d-block text-decoration-none h-100" style="color: #000;" href="index.php?quanly=sanpham&id=<?php echo $row['id_sp'] ?>">
                           <div class="card h-100 shadow-sm mb-5 bg-body rounded">
                              <img src="admin/modules/Quanlysanpham/uploads/<?php echo $row['hinhanh']?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <p class="card-title fs-6 fw-normal truncate-text"><?php echo $row['tensanpham']?></>
                                 <p class="card-text" style="color: red;"><?php echo  number_format($giasp, 0)?> đ</p>
                              </div>
                           </div>
                        </a>
                     </div>
                  <?php
                     }
                  }
                  ?>
               </div>
         </div>
      </div>
   </div>
<?php
      }
   }
?>