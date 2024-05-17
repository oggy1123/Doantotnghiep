<div class="card">
   <div class="card-body">
      <h3 class="card-title fs-5">Chi tiết sản phẩm</h3>
   </div>
</div>

<?php
   $id = $_GET['id'];
   $sql = "SELECT product.*, category.tendanhmuc, origin.name, gallery.list_image FROM product, category, origin, gallery WHERE product.id_danhmuc = category.id_danhmuc AND product.id_origin = origin.id AND product.id_sp = '$id' LIMIT 1";
   $row = executeSelect($connect, $sql, false);
   $list_image = isset($row['list_image']) ? json_decode($row['list_image']) : null;
   $hinhanh = 'admin/modules/Quanlysanpham/uploads/'.$row['hinhanh'];
   $giasp = intval($row['giasp']);
   // $soluongban = executeSelect($connect, "SELECT COUNT(*) AS total FROM order_detail WHERE id_sp = $id AND status = 0", false);
   // var_dump((object) $soluongban);
   $so_luong_ban = $connect->query("SELECT COUNT(*) AS total FROM order_detail WHERE id_sp = $id AND status = 3");
   $soluongban= $so_luong_ban->fetch_assoc();
   $total = $soluongban['total'];
?>
   <div class="card my-3">
      <div class="row g-0">
         <div class="col-md-4">
            <div style="height:300px">
               <!-- <img src="admin/modules/Quanlysanpham/uploads/<?php echo $row['hinhanh']?>" class="img-fluid rounded-start" alt="..."> -->
               <img width="100%" height="100%" src="<?php echo $hinhanh?>" alt="">
            </div>
            <!-- <div class="slider-nav">
               <?php
                  if ($list_image) {
                     foreach ($list_image as $key => $image) {
               ?>
               <div>
                  <div class="p-2">
                     <img class="mx-2" src="admin/modules/gallery/uploads/<?php echo $image->name?>" width="80px" height="80px" alt="">
                  </div>
               </div>
               <?php
                     }
                  }
               ?>
            </div> -->
         </div>
         <div class="col-md-8">
            <div class="card-body">
               <form method="POST" action="pages/main/themgiohang.php?id_sp=<?php echo $id?>">
                  <input type="hidden" value="<?php echo $id?>" id="product_id">
                  <h5 class="card-title"><?php echo $row['tensanpham'] ?></h5>
                  <p class="card-text mb-2">Mã hàng: <?php echo $row['ma_sp']?></p>
                  <p class="card-text mb-2">Bảo hàng: <?php echo $row['bao_hanh']?> tháng</p>
                  <p class="card-text mb-2">Xuấ xứ: <?php echo $row['name']?></p>
                  <p class="card-text price"><?php echo  number_format($giasp, 0)?>  VND</p>
                  <div class="d-flex align-items-center">
                     <p class="card-text mb-0 " style="width:120px;">Số lượng</p>
                     <input type="number" class="form-control" id="soluong" value="1" style="width:80px;" name="soluong">
                     <span class="ms-3 pb-0"><?php echo $total?> đã bán</span>
                  </div>
                  <div class="row mt-4">
                     <div class="col-5">
                        <button id="add-cart" onclick="addCart()" type="button" class="py-2 px-4 btn btn-outline-danger w-100 fw-bolder">
                          Thêm vào giỏ hàng
                        </button>
                     </div>
                     <div class="col-4">
                           <input type="submit" class="py-2 px-4 btn btn-danger w-100 fw-bolder" name="mua_ngay" value="Mua ngay">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div>
   </div>
   <div class="card">
      <div class="card-body">
         <h4>Chi tiết sản phẩm</h4>
         <p><?php echo $row['mota']?></p>
      </div>
   </div>
  <div class="card">
      <div class="card-body">
         <h4>Mô tả sản phẩm</h4>
         <p><?php echo $row['noidung']?></p>
      </div>
   </div>
<script>

   function addCart() {
      const id_sp = $('#product_id').val();
      const so_luong = $('#soluong').val();
      const formData = new FormData();
      formData.append('id_sp', id_sp);
      formData.append('soluong', so_luong);
      formData.append('themgiohang', 'themgiohang');
      $.ajax({                                      
         url: 'pages/main/ajaxthemgiohang.php',
         type: "POST",                     
         data: formData,                                                      
         cache : false,
         processData: false,
         contentType: false,    
         success: function(data) {
            Swal.fire({
               position: "center",
               icon: "success",
               html: "<p style='font-size: 24px;'>Sản phẩm đã được thêm vào giỏ hàng</p>",
               showConfirmButton: false,
               timer: 1500,
            });
         } 
      });  
   }
</script>
