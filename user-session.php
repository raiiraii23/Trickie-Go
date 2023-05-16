<?php
  require_once "conn.php";
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $session_id = session_id();
        $timestamp = date('Y-m-d H:i:s');
        if ($_SESSION['role'] == 'driver') {
        

        $sql = "SELECT * FROM user_sessions WHERE user_id = '".$user_id."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sql = "UPDATE user_sessions SET `timestamp` = '".$timestamp."' WHERE user_id = '".$user_id."'";
        } else {
            $sql = "INSERT INTO user_sessions (user_id, session_id, timestamp) VALUES ('$user_id', '$session_id', '$timestamp')";
        }
        mysqli_query($conn, $sql);
        }
    }

    $sql = "SELECT users.*, user_sessions.* FROM users INNER JOIN user_sessions ON users.user_id = user_sessions.user_id ORDER BY `user_sessions`.`timestamp` ASC";
    
    // $sql = "SELECT users.*, user_sessions.*, directions.*
    // FROM users 
    // INNER JOIN user_sessions ON users.user_id = user_sessions.user_id 
    // INNER JOIN directions ON users.user_id = directions.id
    // WHERE users.role = 'driver'";

    $result = mysqli_query($conn, $sql);

    // if (mysqli_num_rows($result) > 0) {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //     echo '<pre>';
    //     var_dump($row);
    //     echo '</pre>';
    // }
    // }
    
    function time_elapsed_string($datetime, $full = false) {
        $now = time();
        $ago = strtotime($datetime);
        $elapsed = $now - $ago;
        $minute = 60;
        $hour = $minute * 60;
        $day = $hour * 24;
        $week = $day * 7;
        $month = $day * 30;
        $year = $day * 365;
    
        if ($elapsed < $minute) {
            $output = ($elapsed == 1) ? '1 second ago' : $elapsed . ' seconds ago';
        } else if ($elapsed < $hour) {
            $minutes = round($elapsed / $minute);
            $output = ($minutes == 1) ? '1 minute ago' : $minutes . ' minutes ago';
        } else if ($elapsed < $day) {
            $hours = round($elapsed / $hour);
            $output = ($hours == 1) ? '1 hour ago' : $hours . ' hours ago';
        } else if ($elapsed < $week) {
            $days = round($elapsed / $day);
            $output = ($days == 1) ? '1 day ago' : $days . ' days ago';
        } else if ($elapsed < $month) {
            $weeks = round($elapsed / $week);
            $output = ($weeks == 1) ? '1 week ago' : $weeks . ' weeks ago';
        } else if ($elapsed < $year) {
            $months = round($elapsed / $month);
            $output = ($months == 1) ? '1 month ago' : $months . ' months ago';
        } else {
            $years = round($elapsed / $year);
            $output = ($years == 1) ? '1 year ago' : $years . ' years ago';
        }
    
        return $output;
    }
    
    if(!ISSET($_SESSION['role'])){
		header('location: available.php');
	}
    

?>