<?php
    session_start();

    include('../config/config.php');

    include('../helper/helper.php');

    // header('Content-Type: application/json');
	if (isset($_POST['login'])) {

		$username = $_POST['username'];

		$matkhau = $_POST['password'];

		$sql ="SELECT * FROM tbl_admin WHERE username='$username' AND matkhau='$matkhau' LIMIT 1";
		
        $data = executeSelect($connect, $sql);

        if (!$data) {
            echo '<script>alert("Tài khoản và mật khẩu không đúng, vui long nhập lại.");</script>';
			header('location:../login.php');
            return;
        }

        $_SESSION['dangnhap'] = $username;

        $_SESSION['avatar'] = 'https://xb646082.xbiz.jp/serve/upload/avatars/12/M95DJqxChdwS6Jb6PFyke3WMvj3CpsojN15qTF9M.jpg';

        header('location:../index.php');

        // echo json_encode(["success" => 'success']);
	}
?>