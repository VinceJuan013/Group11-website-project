<?php
session_start();
include "/xampp/htdocs/E-Commerce-GROUP11/database/dbconnect.php";

if (isset($_POST['useremail']) && isset($_POST['password'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$useremail = validate($_POST['useremail']);
	$password = validate($_POST['password']);
	echo "<script>console.log('$useremail');</script>";
	echo "<script>console.log('$password');</script>";

	if (empty($useremail)) {
		echo "<script>console.log('useremail is empty');</script>";
		header("Location: ../index.php?error=useremail is required");
		exit();
	} else if (empty($password)) {
		echo "<script>console.log('Password is empty');</script>";
		header("Location: ../index.php?error=Password is required");
		exit();
	} else {
		// hashing the password
		// $password = md5($password);

		$sql = "SELECT * FROM user WHERE useremail='$useremail' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['useremail'] === $useremail && $row['password'] === $password) {
				$_SESSION['useremail'] = $row['useremail'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['uid'] = $row['uid'];
				if ($row['role'] === 'admin') {
					header("Location: ../admin/index.php");
				} else if ($row['role'] === 'user') {
					header("Location: ../index.html");
				}
			} else {
	// $error = "user does not exist";
	echo "<script>console.log('User does not exist');</script>";
	header("Location: ../index.php?error=User does not exist");
	exit();
			}
		} else {
		
				// $error = "Incorrect useremail or password";
				echo "<script>console.log('Incorrect useremail or password');</script>";
				header("Location: ../index.php?error=Incorrect useremail or password");				exit();
		}
	}
} else {
	echo "<script>console.log('Youve been logged out');</script>";
	header("Location: index.php?error=You've been logged out");
	exit();
}


