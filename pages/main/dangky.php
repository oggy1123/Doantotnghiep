<?php
   if(isset($_POST['dangky'])) {
        $hinhanh = time().''.$_FILES['hinhanh']['name'];

        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

        $data = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'diachi' => $_POST['diachi'],
            'phone' => $_POST['phone'],
            'matkhau' => $_POST['matkhau'],
            'nhaplaimatkhau' => $_POST['nhaplaimatkhau'],
            'status_user' => 0,
            'hinhanh' => $hinhanh
        ];
       // đăng ký tài khoản người dùng
       if ($data['username'] == '' || $data['email'] == '') {
          echo '<p style="color:red;">Bạn hãy nhập đủ thông tin!</p>';
       } else if($data['matkhau'] != $data['nhaplaimatkhau']) {
            echo '<p style="color:red;">Bạn đã đăng ký thất bại</p>';
       } else {

            $query = insertData($connect, 'user', $data, 'pages/main/Avata', $hinhanh_tmp);

            if($query) {
                echo '<p style="color:red;">Bạn đã đăng ký thành công</p>';
                 $_SESSION['user'] = $data['username'];
                 $_SESSION['dangky'] = $data['username'];
                 $_SESSION['email'] = $data['email'];
                 $_SESSION['diachi'] = $data['diachi'];
                 $_SESSION['dienthoai'] = $data['phone'];;
                 $_SESSION['id_khachhang'] = mysqli_insert_id($connect);
                 echo "<script>window.location.href = 'index.php?quanly=trangchu';</script>";
            }
       }
      
   }
?>
<div class="card">
    <div class="card-body">
        <div class="col-8 mx-auto">
            <h3 class="card-title text-center">Đăng ký</h3>
            <p class="card-text text-center fs-4">Tạo tài khoản mới</p>
            <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div class="mb-3">
                    <span>Họ tên</span>
                    <input class="form-control" type="text" name="username">
                </div>
                <div class="mb-3">
                    <span>Email</span>
                    <input class="form-control" type="text" name="email">
                </div>
                <div class="mb-3">
                    <span>Địa chỉ</span>
                    <input class="form-control" type="text" name="diachi">
                </div>
                <div class="mb-3">
                    <span>Số điện thoại</span>
                    <input class="form-control" type="text" name="phone">
                </div>
                <div class="mb-3">
                    <span>Avatar</span>
                    <input class="form-control" type="file" name="hinhanh">
                </div>
                <div class="mb-3">
                    <span>Mật khẩu</span>
                    <input class="form-control" type="password" name="matkhau">
                </div>
                <div class="mb-3">
                    <span>Nhập lại mật khẩu</span>
                    <input class="form-control" type="password" name="nhaplaimatkhau">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" value="Đăng ký" name="dangky">
                </div>
                <p class="mt-3">Bạn đã có tài khoản? <a href="index.php?quanly=dangnhap">Đăng nhập</a></p>
            </form>
        </div>
    </div>
</div>