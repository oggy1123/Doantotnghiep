
<div class="pagetitle col-10 mx-auto">
    <h3>Thêm sản phẩm</h3>
</div>
<div class="col-10 mx-auto">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="modules/Quanlysanpham/xuly.php" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tensanpham">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="gia">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Số lượng</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="soluong">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Bảo hành</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="baohanh">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinhanh">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Thông số kỹ thuật</label>
                    <div class="col-sm-10">
                    <textarea rows="10" name="mota" width="100%" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nội dung</label>
                    <div class="col-sm-10">
                        <textarea rows="10" name="noidung" width="100%" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Danh mục</label>
                    <div class="col-sm-10">
                        <select name="danhmuc" class="form-select">
                            <?php
                                $sql_cate = "SELECT * FROM category ORDER BY id_danhmuc DESC";
                                $category = executeSelect($connect, $sql_cate);
                                foreach($category as $row) {
                                    
                            ?>
                                <option value="<?php echo $row['id_danhmuc']?>"><?php echo $row['tendanhmuc']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Thương hiệu</label>
                    <div class="col-sm-10">
                        <select name="brand" class="form-select">
                            <?php
                                $sql_brand = "SELECT * FROM brand ORDER BY id DESC";
                                $brands = executeSelect($connect, $sql_brand);
                                foreach($brands as $row) {
                            ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                <?php
                                    }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Xuất xứ</label>
                    <div class="col-sm-10">
                        <select name="xuatxu" class="form-select">
                            <?php
                                $sql_origin = "SELECT * FROM origin ORDER BY id DESC";
                                $query_origin = executeSelect($connect, $sql_origin);
                                foreach($query_origin as $row) {
                            ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                <?php
                                    }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Tình trạng</label>
                    <div class="col-sm-10">
                        <select name="tinhtrang" class="form-select">
                            <option value="1">Kích hoạt</option>
                            <option value="0">Ân</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
