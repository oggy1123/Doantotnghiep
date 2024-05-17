<?php
    $sql = "SELECT * FROM `category`";
    $result = executeSelect($connect, $sql);
?>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title fs-5 mb-0">Liệt kê danh mục</h3>
            <a href="index.php?action=quanlydanhmucsanpham&query=them" class="btn btn-primary py-2 px-4">Thêm danh mục</a>
        </div>
    </div>
</div>
<div class="card my-3">
    <div class="card-body">
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Tên danh mục sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($result)) {
                        foreach($result as $row) {
                    
                ?>
                    <tr>
                        <td><?php echo $row['id_danhmuc']?></td>
                        <td><?php echo $row['tendanhmuc']?></td>
                        <td><img src="modules/Quanlydanhmucsanpham/uploads/<?php echo $row['hinhanh']?>" width="70px" height="70px"></td>
                        <td>
                            <!-- <button class="btn btn-danger"><a href="modules/Quanlydanhsanpham/delete.php?id_sanpham=<?php echo $row['id_sp']?>" class="text-light">Delete</a></button> -->
                            <button class="btn btn-primary"><a href="?action=quanlydanhsanpham&query=sua&id_danhmuc=<?php echo $row['id_danhmuc']?>" class="text-light" >Update</a></button>
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