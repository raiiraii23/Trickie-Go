<?php
	require_once('../conn.php');

    $uuid = $_POST['uuid'];
    $action = $_POST['page'];
    
    
    $sql = "SELECT * FROM directions WHERE id = '$uuid' ";
    $result = mysqli_query($conn, $sql);

   
    if ($action  == 'location') {
        $location = $_POST['location'];
        $role = $_POST['role'];
        if (mysqli_num_rows($result) == 0) {
            if ($role == 'passenger') {
                
                $add = mysqli_query($conn, "INSERT INTO directions VALUES('$uuid', '$location', '', '')") or die(mysqli_error());
                echo 'success';
                exit;
            }
            $add = mysqli_query($conn, "INSERT INTO directions VALUES('$uuid', '$location', '', '')") or die(mysqli_error());
            echo 'success';
    
        }elseif (mysqli_num_rows($result) != 0){

                $update = mysqli_query($conn, "UPDATE directions SET locations = '$location' WHERE id = '$uuid' ") or die(mysqli_error());
                echo 'success';
        }else{
            echo 'error';
        }
    }

    if ($action == 'destination') { // done
        $role = $_POST['role'];
        $destination = $_POST['destination'];
        if (mysqli_num_rows($result) == 0) {
            if ($role == 'passenger') {
                $p_count = $_POST['passenger-count'];
                $add = mysqli_query($conn, "INSERT INTO directions VALUES('$uuid', '', '$destination', '$p_count')") or die(mysqli_error());
                echo 'success';
                exit;
            }
            $add = mysqli_query($conn, "INSERT INTO directions VALUES('$uuid', '', '$destination', '')") or die(mysqli_error());
            echo 'success';
    
        }elseif (mysqli_num_rows($result) != 0){
            if ($role == 'passenger') {
                $p_count = $_POST['passenger-count'];
                $update = mysqli_query($conn, "UPDATE directions SET destination = '$destination', passenger = '$p_count' WHERE id = '$uuid' ") or die(mysqli_error());
                echo 'success';
                exit;
            }   
                $update = mysqli_query($conn, "UPDATE directions SET destination = '$destination' WHERE id = '$uuid' ") or die(mysqli_error());
                echo 'success';
            
        }else{
            echo 'error';
        }
    }
    


    

    
    
?>