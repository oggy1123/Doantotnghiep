
<div class="card">
    <div class="card-body">
        <h3 class="card-title fs-5 mb-0">Thêm danh mục</h3>
    </div>
</div>
<div class="card my-4">
    <div class="card-body">
        <div class="col-7 mx-auto">
            <form method="POST" action="modules/Quanlydanhmucsanpham/xuly.php" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Tên danh mục</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tendanhmuc">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinhanh">
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" name="themdanhmucsp" value="Thêm danh mục" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>