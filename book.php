<?php
 require_once "conn.php";

 if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $cancel_booked = mysqli_query($conn, "UPDATE users SET booked_by = 0 WHERE user_id = '$id'");
  if ($cancel_booked) {
   echo 'success';
  }
}

 if (isset($_POST['user'])) {
    $uuid =  $_POST['user-id'];
    $duid =  $_POST['driver-id'];

    $sql = "SELECT *
    FROM directions
    JOIN users ON directions.id = users.user_id
    WHERE directions.id = $uuid;";
    $result = $conn->query($sql);

    while ($row = mysqli_fetch_assoc($result)) {

      $name = $row['name'];
      $locations = $row['locations'];
      $destination = $row['destination'];
      $passenger = $row['passenger'];

    }

    $sql_query = mysqli_query($conn, "SELECT * FROM users WHERE booked_by = '$uuid' ");
    $fetch = mysqli_fetch_array($sql_query);
		$count = mysqli_num_rows($sql_query);

        if ($count > 0) {
          echo 'error';
        }else{
          $booked = mysqli_query($conn, "UPDATE users SET booked_by = '$uuid' WHERE user_id = '$duid'");
          echo 'success';
        }
    }




    

// dito ready na yung code for booking pag binook ng user with id number 45 sya yung malalagay na naka book kay ganitong driver 
    // $check_query = mysqli_query($conn, "SELECT * FROM users WHERE booked_by = '$uuid'") or die(mysqli_error());// add small code for condition na isang driver lang pwede i book 
    // if(mysqli_num_rows($check_query) == 0) {
    //   echo "Error";
    // } else {
    //   $booked = mysqli_query($conn, "UPDATE users SET booked_by = '$uuid' WHERE user_id = '$duid'") or die(mysqli_error());
    //   if ($booked) {
    //     echo "Success";
    //   } else {
    //     echo "Error";
    //   }
    // }
      
      // Close the database connection
      $conn->close();
?>