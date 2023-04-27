<?php
 require_once "conn.php";
    $uuid =  $_POST['user-id'];
    $duid =  $_POST['driver-id'];

    $check_query = mysqli_query($conn, "SELECT * FROM users WHERE booked_by = '$uuid'") or die(mysqli_error());
    if(mysqli_num_rows($check_query) == 0) {
      echo "Error";
    } else {
      $booked = mysqli_query($conn, "UPDATE users SET booked_by = '$uuid' WHERE user_id = '$duid'") or die(mysqli_error());
      if ($booked) {
        echo "Success";
      } else {
        echo "Error";
      }
    }
      
      // Close the database connection
      $conn->close();
?>