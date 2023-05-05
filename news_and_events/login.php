<?php
    session_start();
    if (isset($_SESSION['news_and_events_admin'])) {
      header('location: .');
    } else {
      // do nothing
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		.container {
			margin: 0 auto;
			width: 400px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
			padding: 20px;
			margin-top: 50px;
		}
		.container h1 {
			font-size: 24px;
			font-weight: normal;
			margin-bottom: 20px;
			text-align: center;
			color: #333;
		}
		.container label {
			display: block;
			font-size: 14px;
			font-weight: bold;
			margin-bottom: 5px;
			color: #666;
		}
		.container input[type="text"],
		.container input[type="password"] {
			width: calc(100% - 2 * 10px);
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin-bottom: 10px;
			font-size: 14px;
		}
		.container input[type="submit"] {
			background-color: #333;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			font-size: 14px;
            margin-top: 10px;
		}
		.container input[type="submit"]:hover {
			background-color: #555;
		}
		.forgot-password {
			text-align: center;
			margin-top: 20px;
		}
		.forgot-password a {
			color: #666;
			font-size: 12px;
			text-decoration: none;
		}
		.forgot-password a:hover {
			text-decoration: underline;
		}
		.footer {
			margin-top: 50px;
			text-align: center;
			color: #666;
			font-size: 12px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<form action="auth.php" method="POST">
			<label for="admin_id">Admin ID</label>
			<input type="text" id="admin_id" name="admin_id">
			<label for="password">Password</label>
			<input type="password" id="password" name="password">
			<input type="submit" value="Log In">
		</form>
		<div class="forgot-password">
			<a href="#">Forgot Password?</a>
		</div>
	</div>
	<div class="footer">
		&copy; <?=date('Y')?> News &amp; Events
	</div>
</body>
</html>
