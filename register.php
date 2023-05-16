<?php
	require_once 'conn.php';

	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
        $role = $_POST['role'];

		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($conn, $sql);
		// if (mysqli_num_rows($result) > 0) {
		// 	echo 'error';
		// } else {
		// 	$register = mysqli_query($conn, "INSERT INTO `users` VALUES('', '$name', '$role', '$username', '$password',NOW()), '0'") or die(mysqli_error());
		// 	if ($register) {
		// 		echo "success";
		// 	}else{
		// 		echo 'error';
		// 	}
		// }

		if (mysqli_num_rows($result) > 0) {
			var_dump(mysqli_num_rows($result));

		} else {
			// var_dump(mysqli_num_rows($result));
			$register = mysqli_query($conn, "INSERT INTO `users` VALUES('', '$name', '$role', '$username', '$password', NOW(), '0')") or die(mysqli_error($conn));

			if ($register) {
				echo "success";
			}else{
				echo 'error';
			}

		}
	}

?>