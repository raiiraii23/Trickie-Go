<?php
	$conn = mysqli_connect("localhost", "root", "", "tg_database");
 
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

		
	
		if (!empty($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];
		$sql = "SELECT * FROM users WHERE user_id = $user_id" ;
	  
		$result = mysqli_query($conn, $sql);
		if (!$result) {
		  die("Query failed: " . mysqli_error($conn));
		}
		
		while ($row = mysqli_fetch_assoc($result)) {
		  $id = $row['user_id'];
		  $name = $row['name'];
		  $username = $row['username'];
		  $role = $row['role'];
		}
		}
	
	  
?>