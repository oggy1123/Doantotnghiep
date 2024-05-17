<?php
    $id_sp = $_GET['id_sanpham'];
    $sql = "SELECT * FROM `product` WHERE id_sp = $id_sp";
    $data = executeSelect($connect, $sql, false);
?>
<div class="card">
    <div class="card-body">
        <h3>Sửa sản phẩm</h3>
    </div>
</div>
<div class="card my-3">
    <div class="card-body">
    <form method="POST" action="modules/Quanlysanpham/xuly.php?id_sp=<?php echo $id_sp?>" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data['tensanpham']?>" name="tensanpham">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data['giasp']?>" name="giasp">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Số lượng</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data['soluong']?>" name="soluong">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Bảo hành</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data['bao_hanh']?>" name="bao_hanh">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="hinhanh">
                    <img src="modules/Quanlysanpham/uploads/<?php echo $data['hinhanh']?>" width="50px" height="50px" class="my-3" alt="">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Thông số kỹ thuật</label>
                <div class="col-sm-10">
                <textarea rows="10" name="mota" width="100%" style="resize: none;"><?php echo $data['mota']?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nội dung</label>
                <div class="col-sm-10">
                    <textarea rows="10" name="noidung" width="100%" style="resize: none;"><?php echo $data['noidung']?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tình trạng</label>
                <div class="col-sm-10">
                    <select name="tinhtrang" class="form-control">
                            <?php
                                if($data['tinhtrang']== 1){
                                ?>
                                <option value="1" selected>Kích hoạt</option>
                                    <option value="0">Ân</option>
                                <?php } else{?>
                                    <option value="1" >Kích hoạt</option>
                                    <option value="0" selected>Ân</option>
                                <?php  }?>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" name="suasanpham" value="Sửa sản phẩm" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<!-- <?php
   $id = $_GET['id_sanpham'];
   $sql_sp = "SELECT * FROM product WHERE id_sp = '".$id."' LIMIT 1";
   $query_sp = mysqli_query($connect,$sql_sp);
   var_dump($query_sp);
?>
<div class="add">
    <p>Sửa sản phẩm</p>
        <table class="table" width="50%">
            <form method="post" action="modules/Quanlysanpham/xuly.php?id_sp=<?php echo $_GET['id_sanpham']?>" enctype="multipart/form-data">
                <tbody>
                    <?php 
                      if($query_sp){
                        while($row = mysqli_fetch_array($query_sp)){
                            
                            $masp = $row['ma_sp'];
                            $tensanpham = $row['tensanpham'];
                            $gia =$row['giasp'];
                            $soluong = $row['soluong'];
                            $hinhanh = $row['hinhanh'];
                            $kichthuoc = $row['kichthuoc'];
                            $mota = $row['mota'];
                            $noidung = $row['noidung'];
                            $tinhtrang = $row['tinhtrang'];
                            $id_danhmuc = $row['id_danhmuc'];
                    
                ?>
                    <tr>
                        <td>MaSP</td>
                        <td><input type="text" value="<?php echo $masp?>" name="masp"></td>
                    </tr>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td><input type="text" value="<?php echo $tensanpham?>" name="tensanpham"></td>
                    </tr>
                    <tr>
                        <td>Gía</td>
                        <td><input type="text" value="<?php echo $gia?>"  name="gia"></td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td><input type="text" value="<?php echo $soluong?>"  name="soluong"></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td><input type="file" name="hinhanh">
                            <img src="modules/Quanlysanpham/uploads/<?php echo $hinhanh?>" width="50px"></td>
                    </tr>
                    <tr>
                        <td>Kích thước</td>
                        <td><input type="text"value="<?php echo $kichthuoc?>" name="kichthuoc"></td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td><textarea rows="10" name="mota" width="100%" style="resize: none;"><?php echo $mota?></textarea></td>
                    </tr>
                    <tr>
                        <td>Nội dung</td>
                        <td><textarea rows="10"   name="noidung" width="100%" style="resize: none;"><?php echo $noidung?></textarea></td>
                    </tr>
                    <tr>
                        <td>Danh mục</td>
                        <td>
                            <select name="danhmuc">
                            <?php
                                $sql_danhmuc="SELECT * FROM category ORDER BY id_danhmuc DESC";
                                $query_danhmuc=mysqli_query($connect,$sql_danhmuc);
                                while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
                                if($row_danhmuc['id_danhmuc']==$id_danhmuc){
                            ?>
                            <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php  echo $row_danhmuc['tendanhmuc']  ?></option>
                            <?php
                        }else{
                            ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php  echo $row_danhmuc['tendanhmuc']  ?></option>
                            <?php
                        }
                            ?>
                            <?php
                                }
                            ?>
                            
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>Tình trạng</td>
                        <td>
                            <select name="tinhtrang">
                                 <?php
                                    if($tinhtrang == 1){
                                    ?>
                                       <option value="1" selected>Kích hoạt</option>
                                        <option value="0">Ân</option>
                                    <?php } else{?>
                                        <option value="1" >Kích hoạt</option>
                                        <option value="0" selected>Ân</option>
                                    <?php  }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm" class="btn btn-primary"></td>
                    </tr>
                    <?php }}?>
                 </tbody>
                 
            </form>
           
        </table>
</div> -->