<?php
  if(isset($_POST['dangnhap'])){
    $email = $_POST['email'];
    $matkhau = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email = '$email' AND matkhau = '$matkhau 'LIMIT 1";
    $query = mysqli_query($connect,$sql);
    $row = mysqli_num_rows($query);
    if ($row > 0) {
      $sql_data = mysqli_fetch_array($query);
      $_SESSION['id_khachhang'] = $sql_data['id_user'];
      $_SESSION['dangky'] = $sql_data['username'];
      $_SESSION['user'] = $sql_data['username'];
      $_SESSION['email'] = $sql_data['email'];
      $_SESSION['diachi'] = $sql_data['diachi'];
      $_SESSION['dienthoai'] = $sql_data['phone'];
    
      if (headers_sent()) {
        // die("Redirect failed. Please click on this link: <a href=index.php?quanly=trangchu>");
        echo "<script>window.location.href = 'index.php?quanly=trangchu';</script>";
        exit;
    } else {
        exit(header('location:index.php?quanly=trangchu'));
    }
    } else {
        echo'<p style="color:red;">Mật khẩu hoặc Email sai, vui lòng nhập lại.</p>';
    }
  }
?>
<div class="col-5 mx-auto">
  <div class="card">
    <div class="card-body">
      <div class="text-center">
          <h3 class="my-3">Đăng nhập</h3>
      </div>
      <form action="" method="POST">
        <div class="mb-3">
            <span>Email</span>
            <input class="form-control" placeholder="Email..." type="email" name="email">
        </div>
        <div class="mb-3">
            <span>Password</span>
            <input class="form-control" placeholder="Password..." type="password" name="password">
        </div>
        <div>
            <input type="submit" class="btn btn-primary" value="Đăng nhập" name="dangnhap">
        </div>
        <p class="mt-4">Bạn đã chưa có tài khoản? <a href="index.php?quanly=dangky">Đăng ký</a></p>
      </form>
    </div>
  </div>
</div>
