
<!doctype html>
<html lang="en">
<head>
	<title>Đăng nhập vào trang admincp</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
	<section class="ftco-section">
		<div class="login-header">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 col-lg-5">
						<div class="login-wrap p-4 p-md-5">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-user-o"></span>
							</div>
							<h3 class="text-center mb-4">Sign In</h3>
							<form id="form" action="../admin/service/login.php" method="POST" class="login-form">
								<div class="form-group">
									<input type="text" class="form-control rounded-left" name="username" id="username" placeholder="Username" required>
								</div>
								<div class="form-group d-flex">
									<input type="password" class="form-control rounded-left" name="password" id="password" placeholder="Password" required>
								</div>
								<div class="form-group">
									<input type="submit" id="login" name="login" class="form-control btn btn-primary rounded submit px-3" value="Login">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="../assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/common.js"></script>
</body>
</html>
<style>
	body {
		font-family: "Lato", Arial, sans-serif;
		font-size: 16px;
		line-height: 1.8;
		font-weight: normal;
		background: #f8f9fd;
		color: gray;
	}
	.login-header {
		position:absolute;
		top:50%;
		left:50%;
		transform:translate(-50%,-50%);
		width: 100%;
	}
	.login-wrap .icon {
		width: 80px;
		height: 80px;
		background: #1089ff;
		border-radius: 50%;
		font-size: 30px;
		margin: 0 auto;
		margin-bottom: 10px;
	}

	.login-wrap .icon span {
		color: #fff;
	}

	.login-wrap {
		position: relative;
		background: #fff;
		border-radius: 10px;
		-webkit-box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
		-moz-box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
		box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
	}
	.form-group {
		margin-bottom: 1rem;
	}

	.form-control {
		height: 52px !important;
		background: #fff;
		color: #000;
		font-size: 16px;
		border-radius: 5px;
		-webkit-box-shadow: none;
		box-shadow: none;
		border: 1px solid rgba(0, 0, 0, 0.1);
	}

	.btn.btn-primary {
		background: #1089ff !important;
		border: 1px solid #1089ff !important;
		color: #fff !important;
	}

	.btn.btn-primary:hover {
		border: 1px solid #1089ff;
		background: transparent;
		color: #1089ff;
	}
</style>