<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $_SESSION['basketTotal'] = 0.00;
    $_SESSION['basket'] = array();
}
?>