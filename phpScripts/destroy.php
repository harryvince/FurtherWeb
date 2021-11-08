<?php
// File to destory Session during testing
session_start();
session_destroy();
header("Location: http://".$_SERVER['HTTP_HOST']);
?>