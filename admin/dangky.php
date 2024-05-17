<?php
  include('config/config.php');
  if(isset($_POST['dangky'])){
        $taikhoan=$_POST['username'];
        $matkhau=$_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh = time().''.$hinhanh;
        $trangthai = 1;
        $sql_insert = "INSERT INTO tbl_admin( username, matkhau, email, phone, hinhanh, admin_status) VALUES ('$taikhoan','$matkhau','$email','$phone','$hinhanh','$trangthai')";
        $query = mysqli_query($connect,$sql_insert);
        $folder = "img/".$hinhanh;
        move_uploaded_file($hinhanh_tmp,$folder);
        if($query){
            header('location:login.php');
      }else{
        echo 'upload thất bại';
      }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng nhập Admincp</title>
	<style type="text/css">
		body{
			background: #f2f2f2;
		}
		.wrapper-login{
			width: 20%;
			margin: 0 auto;

		}
		table.table-login{
			width: 100%;
		}
		table.table-login tr td{
			padding: 5px;
		}
	</style>
</head>
<body>
	<div class="wrapper-login">
		<form action="" autocomplete="off" method="POST" enctype="multipart/form-data">
		<table border="1" class="table-login" style="text-align: center;border-collapse: collapse;">
			<tr>
				<td colspan="2"><h3>Đăng ký</h3></td>
			</tr>
			<tr>
				<td>Tài khoản</td>
				<td><input type="text" name="username"></td>

			</tr>
			<tr>
				<td>Mật khẩu</td>
				<td><input type="password" name="password"></td>

			</tr>
            <tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>

			</tr>
            <tr>
				<td>Phone</td>
				<td><input type="text" name="phone"></td>

			</tr>
            <tr>
				<td>Avata</td>
				<td><input type="file" name="hinhanh"></td>

			</tr>
			<tr>
				<td colspan="2"> <input type="submit" name="dangky" value="Đăng ký"> <a href="login.php">Đăng nhập?</a></td>
                
			</tr>
		</table>
		</form>
	</div>
</body>
</html>
