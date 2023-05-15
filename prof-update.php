<?php
 require_once "conn.php";
//    var_dump($_SESSION); die();
   $name = $_POST['name'];
   $username = $_POST['username'];
   $id = $_POST['uuid'];

if(isset($_POST['page']) && $_POST['page'] == 'settings'){
    
    $update = mysqli_query($conn, "UPDATE users SET `name` = '$name', `username` = '$username' WHERE user_id = '$id' ") or die(mysqli_error());
    if ($update) {
       echo 'success';
    } else {
        echo 'error';
    }
    
}
?>