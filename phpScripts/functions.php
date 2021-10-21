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

function generateCard($image, $title, $desc){
    echo"
    <div class='card text-center text-white bg-dark mb-3' style='width: 18rem; margin: 5px 5px 5px 5px'>
        <img class='card-img-top' src='images/$image' alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'>$title</h5>
          <p class='card-text'>$desc</p>
          <a href='#' class='btn btn-primary'>Add to cart</a>
          <p class='card-text'><small class='text-muted'>£9.99</small></p>
        </div>
    </div> ";
}

?>