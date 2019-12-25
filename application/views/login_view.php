<!DOCTYPE html>

<html>
	<head>
		<title>Log In</title>
	</head>
	<style>
		body {
			background: #343A40;
		}
		form {
			background: white;
			margin: 150px auto;
			padding: 3rem 2rem;
  
			border-radius: 10px;
			text-align: center;
			width: 400px;
		}
		label {
			font-family: sans-serif;
			font-weight: bold;
			font-size: 1.25rem;
			color: #3C8DBC;
		}
		.box {
			margin: 1rem;
		}
		[type="text"], [type="password"] {
			box-sizing: border-box;
			width: 100%;
			padding: 7px;
			border: 1px solid gray;
			border-radius: 3px;
		}
		[type="submit"] {
			width: 100%;
			cursor: pointer;
			background: #3C8DBC;
			border: none;
			border-radius: 3px;
			color: white;
			padding: 10px;
		}
	</style>
	<body>
		<form action="<?php echo site_url('examreg/index.php/log_controller/login') ?>" method="post">
			<label>LOGIN</label>
			<div class="box">
				<br>
				<input type="text" name="username" id="username" placeholder="Username">
				<br>
				<br>
				<input type="password" name="password" id="password" placeholder="Password">
				<br>
				<br>
				<?php if (! is_null($msg)) echo $msg ?>
				<br>
				<br>
				<input type="submit" value="LOGIN"/>
			</div>
		</form>
	</body>
</html>