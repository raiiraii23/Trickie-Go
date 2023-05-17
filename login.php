<?php
//login backend
	session_start();
	require_once 'conn.php';
	if(ISSET($_POST['username'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM `users` WHERE `username`='$username' && `password`='$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$count = mysqli_num_rows($query);
 
		if($count > 0){
			$_SESSION['user_id'] = $fetch['user_id'];
			$_SESSION['role'] = $fetch['role'];
			$_SESSION['name'] = $fetch['name'];
			$_SESSION['booked_by'] = $fetch['booked_by'];
			echo 'success';
		}else{
			echo 'error';
		}
	}
?>
