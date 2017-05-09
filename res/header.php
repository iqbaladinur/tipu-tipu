<nav class="navbar navbarku navbar-fixed-top">
		<table class="responsive">
			<tr>
				<td class="text-left">
					<a href="index.php"><img class="resize" src="media/img-source/logo2.png"></a>
				</td>
				<td class="text-right">
					<a class="open btn btn-sm menu-btn">
            <span class="glyphicon glyphicon-menu-hamburger"></span>
          </a>
				</td>
			</tr>
		</table>
</nav>
<div class="fullmodal">
		<table height='49px' class="responsive">
			<tr>
				<td class="text-right">
					<button class="tutup btn menu-btn"><span class="glyphicon glyphicon-remove"></span></button>
				</td>
			</tr>
		</table>
		<div class="container text-center menuapp">
      <a class="tutup" href="index.php"><h4>Home</h4></a>
      <?php if ($_SESSION['login']!=true) {
          echo "<a class='tutup' data-toggle='modal' href='#login'><h4>Laporkan Penipu!</h4></a>";
          echo "<a class='tutup' data-toggle='modal' href='#login'><h4>Login</h4></a>";
      }else{
          echo "<a class='tutup' href='lapor.php'><h4>Laporkan Penipu!</h4></a>";
          echo "<a class='tutup' href='viewprofile.php?id=".$_SESSION['id_usr']."'><h4>Lihat Profil</h4></a>";
      }
      ?>
			<a class="tutup" href="privacypolice.php"><h4>Kebijakan Privasi</h4></a>
            <a class="tutup" href="connect.php"><h4>Hubungi Kami</h4></a>
      <a class="tutup" href="about.php"><h4>Tentang</h4></a>
      <a class="tutup" href="faq.php"><h4>FAQ</h4></a>
      <?php if ($_SESSION['login']==true) {
         echo "<a class='tutup' href='lib/php/logout.php'><h4>Logout</h4></a>";
      } ?>
		</div>
</div>
<?php
  if ($_SESSION['login']!=true) {?>
    <!--login page-->
<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header theme-btn">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><img class="resize" src="media/img-source/logo2.png"></h4>
        </div>
        <div class="modal-body bol">
          <form role="form" action="lib/php/login.php" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" name="usr" placeholder="Username or E-mail" required autofocus>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" name="psw" placeholder="Enter password" required>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="1" name="rememberme" checked>Remember me</label>
            </div>
              <button type="submit" class="btn theme-btn btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
          <br>
          <a href="lupapassword.php">Forgot Password?</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
          <span class="pull-left">Not register yet?<br><a data-dismiss="modal" data-toggle="modal" href="#register">Register here!</a></span>
        </div>
      </div>
    </div>
</div>

<!--Register page-->
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header theme-btn">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><img class="resize" src="media/img-source/logo2.png"></h4>
        </div>
        <div class="modal-body bol">
          <h4>Register here!</h4>
          <form id="daftar" role="form" action="lib/php/register.php" method="post">
              <small id="w" class="hide text-danger">max 5-10 character unique!</small>
              <input type="text" class="form-control" id="regusr" name="username" placeholder="Username" maxlength="10" required autofocus><br>
              <input type="email" class="form-control" id="regmail" name="mail" placeholder="Email address" required><br>
              <small id="wr" class="hide text-danger">minimal 8 character!</small>
              <input type="password" class="form-control" id="regpass" name="password" placeholder="Password" maxlength="15" required><br>
              <small id="wrp" class="hide text-danger">wrong repeat!</small>
              <input type="password" class="form-control" id="regrepass" name="repass" placeholder="Repeat password" maxlength="15" required><br>
              <label><input type="checkbox" id="regis" value="1"> I agree with the term and conditions.</label>
              <button type="submit" class="btn theme-btn btn-block">Register Now!</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
          <span class="pull-left">Have an account?<br><a data-dismiss="modal" data-toggle="modal" href="#login">Login here!</a></span>
        </div>
      </div>
    </div>
</div>
<?php  } ?>
