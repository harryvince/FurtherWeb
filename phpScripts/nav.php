<nav class="navbar navbar-dark bg-dark justify-content-between">
    <div class="navbar-nav mr-auto flex-row">
        <a class="navbar-brand" style="margin-left:20px;">Vince Shops</a>
        <?php require('navbarItems.php'); ?>
    </div>
    <span class="navbar-text" style="margin-right:10px;">
        <a style="margin-right:10px;">£ <?php
        if ($_SESSION['basketTotal'] == 0){
            echo "0.00";
        } else {
         echo $_SESSION['basketTotal'];
        }
         ?></a>
        <?php require('basket.php')?>
        <button class="btn btn-outline-success" style="margin-right:2px">
            <?php
                if (isset($_SESSION['username'])){
                    echo"<a href='phpScripts/logout.php'>";
                    echo "Hello, ".$_SESSION['username'];
                    echo "</a>";
                } else {
                    echo"<a href='loginPage.php'>";
                    echo "Login";
                    echo"</a>";
                }
            ?>
        </button>
        <?php
            if(!isset($_SESSION['username'])){
                echo"
                <button class='btn btn-outline-success' style='margin-right:2px'>
                <a href='RegisterPage.php'>
                Register
                </a>
                </button>
                ";
            }
        ?>
    </span>
</nav>