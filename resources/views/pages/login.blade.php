<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/login-bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/login-util.css">
	<link rel="stylesheet" type="text/css" href="/css/login-main.css">
<!--===============================================================================================-->
<style>
@font-face {
    font-family: 'IRANSansWeb';
    src: url("font/IRANSansWeb.woff") format("woff");
}
::placeholder {
	font-family: 'IRANSansWeb';
    src: url("font/IRANSansWeb.woff") format("woff");
    text-align: center;
}
</style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1" style="font-family:IRANSansWeb">
						ورود به پنل
					</span>
				</div>

				<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" style="margin-right:30px;" data-validate="Username is required">
						<input class="input100" type="text" name="username" placeholder="نام کاربری رو وارد کن">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" style="margin-right:30px;" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="رمز عبور رو وارد کن">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30" style="margin-left:70px;">
						<div>
							<a href="#" class="txt1" style="font-family:IRANSansWeb">
								رمز عبورت رو فراموش کردی؟
							</a>
							<hr>
							<img src="/pic/11.svg" alt="" srcset="" width="50" height="50">
							<img src="/pic/22.svg" alt="" srcset="" width="50" height="50">
							<img src="/pic/44.svg" alt="" srcset="" width="50" height="50">
						</div>
					</div>

					<div class="container-login100-form-btn" style="margin-left:70px;">
						<button class="login100-form-btn" style="font-family:IRANSansWeb">
							ورود
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/login-bootstrap.min.js"></script>
	<script src="js/login-main.js"></script>
</body>
</html>
