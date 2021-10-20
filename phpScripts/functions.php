<?php

function sanitize($data) {
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getTime(){
    $date = date("H:i:s");
    return $date;
}

?>