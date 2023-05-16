<?php
 require_once "conn.php";
    

    $status = $_POST['action'];
    $id = $_POST['id'];

    if ( $status == 'accept') {
        $sql_query = mysqli_query($conn, "SELECT * FROM users WHERE status = 'accept'");
        // $result = $conn->query($sql_query);
        $num_rows = mysqli_num_rows($sql_query);
        //  var_dump($num_rows); die();
            if($num_rows == 0) {
                $reserve = mysqli_query($conn, "UPDATE users SET `status` = 'accept' WHERE user_id = '$id'");
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
        $done_reserve = mysqli_query($conn, "UPDATE users SET `status` = 'done' WHERE user_id = '$id'");
        if ($done_reserve) {
            # code...
            echo 'success';
        }else{
            echo 'error';
        }

    }
    if ($_POST['action'] == 'cancel') {
        # code...
        $cancel_reserve = mysqli_query($conn, "UPDATE users SET `status` = '' WHERE user_id = '$id'");
        if ($cancel_reserve) {
            # code...
            echo 'success';
        }else{
            echo 'error';
        }

    }
?>