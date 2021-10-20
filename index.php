<?php 
require('phpScripts/functions.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $_SESSION['basketTotal'] = 0.00;
}
$_SESSION['username'] = "Harry";
?>

<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</header>

<body>
    <nav class="navbar navbar-dark bg-dark justify-content-between">
        <a class="navbar-brand" style="margin-left:20px;">Vince Shops</a>
        <span class="navbar-text" style="margin-right:10px;">
            <a style="margin-right:10px;">£ <?php
            if ($_SESSION['basketTotal'] == 0){
                echo "0.00";
            } else {
             echo $_SESSION['basketTotal'];
            }
             ?></a>
            <a href="#basket" style="margin-right:10px;"><img src="images/cart.png" style="height:30px;width:40px;"></a>
            <button class="btn btn-outline-success" style="margin-right:2px">
                <?php
                    $Currenttime = getTime();
                    $time = date('H:i:s',strtotime("12 PM"));
                    if (isset($_SESSION['username'])){
                        if($time > date('H:i:s')){
                            echo "Good morning, ".$_SESSION['username'];
                        } else {

                            echo "Good afternoon, ".$_SESSION['username'];
                        }
                    } else {
                        echo "Login";
                    }
                ?>
            </button>
        </span>
    </nav>
</body