<?php
	require_once 'conn.php';
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
        $role = $_POST['role'];

		$sql = "SELECT * FROM users WHERE username = '$username' ";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) == 0) {
			echo "success";
			$register = mysqli_query($conn, "INSERT INTO `users` VALUES('', '$name', '$role', '$username', '$password',NOW())") or die(mysqli_error());
		} else {
			echo 'error';
		}
	}

?>