<?php
session_start();
 require_once "conn.php";
    

    $status = $_POST['action'];
    $id = $_POST['id'];
    $did = $_SESSION['user_id'];

    // var_dump($_SESSION); die();
    

    if ( $status == 'accept') {
        $sql_query = mysqli_query($conn, "SELECT * FROM users WHERE status = 'accept'");
        // $result = $conn->query($sql_query);
        $num_rows = mysqli_num_rows($sql_query);
        //  var_dump($num_rows); die(); UPDATE demo_table SET AGE=30 ,CITY='PUNJAB'
            if($num_rows == 0) {
                $reserve = mysqli_query($conn, "UPDATE users SET `booked_by` = $id ,`status` = 'accept' WHERE user_id = '$id'");
                if ($reserve) {
                   echo 'success';
                }else{
                    echo 'error';
                }
            }else{
             echo 'error';
            }
    }
    if ($_POST['action'] == 'done') {
        # code...
        $done_reserve = mysqli_query($conn, "UPDATE users SET `booked_by` = '1' ,`status` = 'done' WHERE user_id = '$id'");
        if ($done_reserve) {
            # code...
            echo 'success';
        }else{
            echo 'error';
        }

    }
    if ($_POST['action'] == 'cancel') {
        # code...
        $cancel_reserve = mysqli_query($conn, "UPDATE users SET `booked_by` = '0' ,`status` = '' WHERE user_id = '$id'");
        if ($cancel_reserve) {
            # code...
            echo 'success';
        }else{
            echo 'error';
        }

    }
?>