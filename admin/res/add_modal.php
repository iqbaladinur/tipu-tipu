<!--add user-->
<div class="modal fade" id="add_user" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header theme-btn">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New User</h4>
        </div>
        <div class="modal-body bol">
          <form role="form" action="../sys/add_user.php" method="post">
            <label for="id_usr">User ID</label>
            <input type="text" class="form-control" id="id_usr" name="id_usr" placeholder="User Id" maxlength="10" required autofocus><br>
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required autofocus><br>
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autofocus>
        </div>
        <div class="modal-footer">
              <button type="submit" class="btn btn-default btn-success"><span class="glyphicon glyphicon-plus-sign"></span></button>
              <button type="button" class="btn btn-default btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove "></span></button>
        </div>
        </form>
      </div>
    </div>
</div>

<!--add admin-->
<div class="modal fade" id="add_admin" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header theme-btn">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Admin</h4>
        </div>
        <div class="modal-body bol">
          <form role="form" action="../sys/add_admin.php" method="post">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="id_adm" name="username" placeholder="Username" maxlength="10" required autofocus><br>
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autofocus>
        </div>
        <div class="modal-footer">
              <button type="submit" class="btn btn-default btn-success"><span class="glyphicon glyphicon-plus-sign"></span></button>
              <button type="button" class="btn btn-default btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove "></span></button>
        </div>
        </form>
      </div>
    </div>
</div>

