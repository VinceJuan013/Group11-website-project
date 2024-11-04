<?php
session_start();
// The user is logged in, redirect to the home page
if (isset($_SESSION['uid']) && isset($_SESSION['role'])) {
	if ($_SESSION['role'] === "admin") {
		header("Location: ../admin/index.php");
		exit();
	} elseif ($_SESSION['role'] === "user") {
		header("Location: index.html");
		exit();
	}
	exit();
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Group 11 | E-COMMERCE </title>

	<!-- <link rel="stylesheet" type="text/css" href="resources/css/login-copy.css"> -->
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>


<body>
	<!-- <div class="background">
		<div class="blur"></div>
		<div class="img"></div>
	</div> -->
	<!-- Alert-messages -->
	<?php if (isset($_GET['success'])) { ?>
		<div class="success"><?php echo $_GET['success']; ?></div>
	<?php } ?>


	<div class="session">
		<div class="left">
			<div class="container"></div>

			<img draggable="false" src="./resources/images/henrichlogo.png" alt="henrich logo">
		</div>
		<div class="login-form">
			<div class="title">
				<h1>Welcome Back</h1>
				<p class="sub-title">Login to your account</p>
			</div>

			<?php if (isset($_GET['error'])) { ?>
				<div class="error">
					<?php echo $_GET['error']; ?>
				</div>
			<?php } ?>

			<form action="./login/login.php" method="post" class="log-in">

				<div class="input-group">
					<div class="icon">
						<i class="bx bx-envelope"></i>
					</div>
					<div class="wave-group">
						<input required="" type="text" type="useremail" name="useremail" class="input" >
						<span class="bar"></span>
						<label class="label">
							<span class="label-char" style="--index: 0">E</span>
							<span class="label-char" style="--index: 2">m</span>
							<span class="label-char" style="--index: 3">a</span>
							<span class="label-char" style="--index: 4">i</span>
							<span class="label-char" style="--index: 5">l</span>
						</label>
					</div>
				</div>

				<div class="input-group">
					<div class="icon">
						<i class="bx bx-lock"></i>
					</div>
					<div class="wave-group">
						<input required="" type="password" name="password" id="password" class="input">
						<span class="bar"></span>
						<label class="label">
							<span class="label-char" style="--index: 0">P</span>
							<span class="label-char" style="--index: 1">a</span>
							<span class="label-char" style="--index: 2">s</span>
							<span class="label-char" style="--index: 3">s</span>
							<span class="label-char" style="--index: 4">w</span>
							<span class="label-char" style="--index: 5">o</span>
							<span class="label-char" style="--index: 6">r</span>
							<span class="label-char" style="--index: 7">d</span>

						</label>
					</div>
					<div class="icon">
						<i class="bx bx-show" id="togglePassword"></i>
					</div>
				</div>

				<script>
					var togglePassword = document.getElementById("togglePassword");
					var password = document.getElementById("password");

					togglePassword.addEventListener('click', function() {
						if (password.type === "password") {
							password.type = "text";
							togglePassword.classList.add('bx-hide');
							togglePassword.classList.remove('bx-show');
						} else {
							password.type = "password";
							togglePassword.classList.add('bx-show');
							togglePassword.classList.remove('bx-hide');
						}
					});
				</script>

				<div class="bottom-form">
					<button type="submit" class="btn">Log in</button>

					<div class="forgot">
						<a href="./login/forgotpassword.php">Forgot Password?</a>
					</div>
				</div>
			</form>
		</div>

	</div>
</body>

</html>