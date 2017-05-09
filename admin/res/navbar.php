<nav style="border-radius:0px" class="navbar color-theme">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle btn-sm white" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>
      <a href="index.php"><img class="resize" src="../../media/img-source/logo2.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a class="btn theme-btn"><span class="glyphicon glyphicon-user"></span><?php echo "  ".$_SESSION['id_usr'];?></a></li>
        <li><a href="../sys/logout.php" class="btn theme-btn"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
	