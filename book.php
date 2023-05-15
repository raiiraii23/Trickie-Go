<?php
 require_once "conn.php";
    // var_dump($_POST); die();

if (isset($_POST['action']) == 'book') {
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

    $sql_query = mysqli_query($conn, "SELECT * FROM users WHERE `booked_by` = '$uuid' ");
    // var_dump(mysqli_num_rows($sql_query)); die();
    if (mysqli_num_rows($sql_query) == 0) {
      $booked = mysqli_query($conn, "UPDATE users SET booked_by = '$uuid' WHERE user_id = '$duid'");
        echo 'success';
    }else{
      echo 'error';
    }
    
    }

    if (isset($_GET['action']) && $_GET['action'] == 'cancel') {
      $id = $_GET['id'];
      $cancel_booked = mysqli_query($conn, "UPDATE users SET booked_by = '0' WHERE user_id = '$id'");
      // var_dump($cancel_booked); die();
      if ($cancel_booked) {
        header('location: available.php');
      }
    }

      $conn->close();
?>