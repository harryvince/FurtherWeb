<?php
if (session_status() === PHP_SESSION_NONE) {
    // Starting the Session
    session_start();

    // Checking the User Agent
    if(isset($_SESSION['HTTP_USER_AGENT'])){
        if($_SESSION['HTTP_USER_AGENT'] != $_SERVER['HTTP_USER_AGENT']){
            session_destroy();
        }
    } else {
        $_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
    }

    // Checking the Session Duration
    $session_duration = 3600; // Seconds of Duration - Currently set to an hour
    if(!isset($_SESSION['session_time'])){
        $_SESSION['session_time'] = time();
    }

    if(isset($_SESSION['session_time'])){
        if(((time() - $_SESSION['session_time']) > $session_duration)){
            session_destroy();
        }
    }
}
?>