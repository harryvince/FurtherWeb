<?php
if(isset($_SESSION['userType'])){
    if ($_SESSION['userType'] == 1){
        echo"<a class='nav-item nav-link' href='#'>Admin</a>";
    }
}
?>