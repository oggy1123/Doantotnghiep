<div class="card">
    <div class="card-body">
        <h3>Thống kê chi tiết</h3>
    </div>
</div>
<div class="card my-3">
    <div class="card-body">
        <div class="row">
            <?php
                $so_luong_sp = $connect->query("SELECT COUNT(*) AS total FROM product");
                $so_luong_san_pham= $so_luong_sp->fetch_assoc();
            ?>
            <div class="col-3">
                <div class="text-center my-3">
                    <div style="height: 150px; color: #fff;" class="bg-danger d-flex justify-content-center align-items-center fs-3">
                        <?php echo $so_luong_san_pham['total']?>
                    </div>
                    <h3 class="card-title fs-5 bg-light p-3">Sản phẩm</h3>
                </div>
            </div>
            <?php
                $so_luong_ban = $connect->query("SELECT COUNT(*) AS total FROM order_detail WHERE status = 3");
                $soluongban = $so_luong_ban->fetch_assoc();
            ?>
            <div class="col-3">
                <div class="text-center my-3">
                    <div style="height: 150px; color: #fff;" class="bg-success d-flex justify-content-center align-items-center fs-3">
                        <?php echo $soluongban['total']?>
                    </div>
                    <h3 class="card-title fs-5 bg-light p-3">Sản phẫm đã bán</h3>
                </div>
            </div>
            <?php
                $so_luong_nguoi_dung = $connect->query("SELECT COUNT(*) AS total FROM user");
                $total_so_luong_nguoi_dung = $so_luong_nguoi_dung->fetch_assoc();
            ?>
            <div class="col-3">
                <div class="text-center my-3">
                    <div style="height: 150px; color: #fff;" class="bg-warning d-flex justify-content-center align-items-center fs-3">
                        <?php echo $total_so_luong_nguoi_dung['total']?>
                    </div>
                    <h3 class="card-title fs-5 bg-light p-3">Khách hàng</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card my-3">
    <div class="card-body">
        <div>Thông kê đơn hàng: <span id="day">7 ngày</span></div>
        <div class="col-3 my-3">
            <select class="form-select" id="thong_ke" onchange="thong_ke()" aria-label="Default select example">
                <option value="1" selected>7 ngày qua</option>
                <option value="2">28 ngày qua</option>
                <option value="3">90 ngày qua</option>
                <option value="4">36 ngày qua</option>
            </select>
        </div>
        <div id="graph" style="height: 300px;">
            
        </div>
    </div>
</div>