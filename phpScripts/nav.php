<nav class="navbar navbar-dark bg-dark justify-content-between">
    <div class="navbar-nav mr-auto flex-row">
        <a class="navbar-brand" style="margin-left:20px;">Vince Shops</a>
        <?php require('navbarItems.php'); ?>
    </div>
    <span class="navbar-text" style="margin-right:10px;">
        <a style="margin-right:10px;">£ <?php
        echo sprintf("%0.2f",$_SESSION['basketTotal']);
         ?></a>
        <?php require('basket.php')?>
        <button class="btn btn-outline-success" style="margin-right:2px">
            <?php
                if (isset($_SESSION['username'])){
                    echo"<a href='phpScripts/logout.php'>";
                    echo "Hello, ".$_SESSION['username'];
                    echo "</a>";
                } else {
                    echo"<a href='loginPage'>";
                    echo "Login";
                    echo"</a>";
                }
            ?>
        </button>
        <?php
            if(!isset($_SESSION['username'])){
                echo"
                <button class='btn btn-outline-success' style='margin-right:2px'>
                <a href='RegisterPage'>
                Register
                </a>
                </button>
                ";
            }
        ?>
    </span>
</nav>