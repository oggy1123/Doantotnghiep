
<?php
    $product = executeSelect($connect, "SELECT * FROM product");
?>
<div class="card">
    <div class="card-body">
        <div class="col-7 mx-auto">
            <form method="POST" action="modules/gallery/xuly.php" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Tên danh mục</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinh_anh_1">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinh_anh_2">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinh_anh_3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinh_anh_4">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinh_anh_5">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinh_anh_6">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Sản phẩm</label>
                    <?php
                        if ($product) {
                    ?>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_sp">
                            <?php
                                foreach($product as $row) {
                            ?>
                                <option value="<?php echo $row['id_sp']?>"><?php echo$row['tensanpham']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="text-center">
                    <input type="submit" name="them" value="Thêm" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>