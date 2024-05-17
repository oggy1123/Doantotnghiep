<?php
  $sql = "SELECT * FROM product ORDER BY giasp DESC";
  $data = executeSelect($connect, $sql);
?>
<div class="col-12">
  <div class="pagetitle">
    <div class="d-flex justify-content-between align-items-center">
      <h3>Liệt kê sản phẩm</h3>
      <a href="index.php?action=quanlysanpham&query=them" type="button" class="btn btn-primary">Thêm sản phẩm</a>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div>
        <table class="table table-hover">
          <thead class="text-center">
            <tr>
              <th>
                ID
              </th>
              <th>Mã sp</th>
              <th>Tên</th>
              <th>Gía</th>
              <th>Số lượng</th>
              <th>Hình ảnh</th>
              <th>Bảo hành</th>
              <th>Tình trạng</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
              if ($data) {
                foreach($data as $row) {
                  $giasp = intval($row['giasp']);
            ?>
              <tr>
                <td><?php echo $row['id_sp']?></td>
                <td><?php echo $row['ma_sp']?></td>
                <td class="text-break" style="width:500px;"><?php echo $row['tensanpham']?></td>
                <td><?php echo number_format($giasp ?? 0, 0,',', '.')." "."đ"?></td>
                <td><?php echo $row['soluong']?></td>
                <td><img src="modules/Quanlysanpham/uploads/<?php echo $row['hinhanh']?>" width="50px"></td>
                <td><?php echo $row['bao_hanh']." ".'tháng'?></td>
                <td><?php echo $row['tinhtrang'] == TINH_TRANG['1'] ? 'Kích hoạt' : 'Ẩn'?></td>
                <td>
                  <button class="btn btn-danger"><a href="modules/Quanlysanpham/delete.php?id_sanpham=<?php echo $row['id_sp']?>" class="text-light">Delete</a></button>
                  <button class="btn btn-primary"><a href="?action=quanlysanpham&query=sua&id_sanpham=<?php echo $row['id_sp']?>" class="text-light" >Update</a></button>
                </td>
              </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- <?php
    //  $sql = "SELECT * FROM product,category WHERE product.id_danhmuc = category.id_danhmuc ORDER BY id_sp DESC";
    //  $togle = mysqli_query($connect,$sql);
?>
<p>Liệt kê sản phẩm</p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">ma_sp</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Gía sp</th>
      <th scope="col">Số lượng </th>
      <th scope="col">Hình ảnh </th>
      <th scope="col">Kích thước </th>
      <th scope="col">Mô tả</th>
      <th scope="col">Nội dung</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Create_date</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    <?php
         if($togle)
         {
            while($row = mysqli_fetch_assoc($togle))
            {
                $id = $row['id_sp'];
                $ma_sp = $row['ma_sp'];
                $tensanpham = $row['tensanpham'];
                $danhmuc = $row['tendanhmuc'];
                $giasp = $row['giasp'];
                $soluong = $row['soluong'];
                $hinhanh = $row['hinhanh'];
                $kichthuoc = $row['kichthuoc'];
                $mota = $row['mota'];
                $noidung = $row['noidung'];
                $tinhtrang = $row['tinhtrang'];
                $create_date = $row['create_date'];
                
                
    ?>
            <tr>
                <th scope="row"><?php echo $id?></th>
                <td><?php echo $ma_sp?></td>
                <td><?php echo $tensanpham?></td>
                <td><?php echo $danhmuc?></td>
                <td><?php echo $giasp?></td>
                <td><?php echo $soluong?></td>
                <td><img src="modules/Quanlysanpham/uploads/<?php echo $hinhanh?>" width="50px"></td>
                <td><?php echo $kichthuoc?></td>
                <td><?php echo $mota?></td>
                <td><?php echo $noidung?></td>
                <td><?php 
                      if($tinhtrang == 1){
                        echo "Kích hoạt";
                      }else{
                        echo "Ẩn";
                      }
                ?></td>
                <td><?php echo $create_date?></td>
                <td>
                  <button class="btn btn-danger"><a href="modules/Quanlysanpham/delete.php?id_sanpham=<?php echo $id?>" class="text-light">Delete</a></button>
                  <button class="btn btn-primary"><a href="?action=quanlysanpham&query=sua&id_sanpham=<?php echo $id?>" class="text-light" >Update</a></button>
			     
                </td>
            </tr>
        <?php }}?>
  </tbody>
</table> -->
