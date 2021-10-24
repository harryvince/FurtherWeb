<?php
require('phpScripts/session.php');
    if(isset($_SESSION['checkout']) && $_SESSION['checkout'] != 1){
        header('Location: index.php');
    } elseif(!isset($_SESSION['checkout'])){
        header('Location: index.php');
    }
?>