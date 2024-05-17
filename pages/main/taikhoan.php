<?php
    $id_user = $_SESSION['id_khachhang'];
    $query = executeSelect($connect, "SELECT * FROM user WHERE id_user = $id_user ", false);
?>
<?php
    if (isset($_POST['capnhat'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $diachi = $_POST['diachi'];
        $update = mysqli_query($connect, "UPDATE user SET username = '$username', email = '$email', diachi = '$diachi', phone = '$phone' WHERE id_user = $id_user");
        if ($update) {
            echo "<script>alert('Cập nhật tài khoản thành công!')</script>";
        }
    }
?>
<div class="card">
    <div class="div car-body">
        <h3 class="p-3 fs-5 card-title">Tài khoản người dùng</h3>
    </div>
</div>
<div class="card my-3">
    <div class="card-body">
        <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="mb-3">
                <span>Họ tên</span>
                <input class="form-control" value="<?php echo $query['username']?>" type="text" name="username">
            </div>
            <div class="mb-3">
                <span>Email</span>
                <input class="form-control" value="<?php echo $query['email']?>" type="text" name="email">
            </div>
            <div class="mb-3">
                <span>Địa chỉ</span>
                <input class="form-control" value="<?php echo $query['diachi']?>" type="text" name="diachi">
            </div>
            <div class="mb-3">
                <span>Số điện thoại</span>
                <input class="form-control" value="<?php echo $query['phone']?>" type="text" name="phone">
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Cập nhật" name="capnhat">
            </div>
        </form>
    </div>
</div>