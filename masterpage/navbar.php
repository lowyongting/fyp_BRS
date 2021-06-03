<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php" class="btn btn-lg"> 
          <span class="glyphicon glyphicon-home"></span> Home </a>
        </div>

        <ul class="nav navbar-nav navbar-right">
        <?php
            if(!isset($_SESSION['user']))
            {
                echo'
                <li> <a href="login.php" class="btn btn-lg"> <span class="glyphicon glyphicon-log-in"></span> Login </a> </li>
                <li> <a href="register.php" class="btn btn-lg"> <span class="glyphicon glyphicon-user"></span> Register </a> </li>';
            } 
            else
            {   echo' <li> <a href="#" class="btn btn-lg"> Hello ' .$_SESSION['user']. '.</a></li>
                      <li> <a href="cart.php" class="btn btn-lg"> <span class="glyphicon glyphicon-shopping-cart"></span> Cart </a> </li>; 
                      <li> <a href="logout.php" class="btn btn-lg"> <span class="glyphicon glyphicon-log-out"></span> LogOut </a> </li>';
                    
            }
            ?>

        </ul>

    </div><!-- /.container-fluid -->
</nav>