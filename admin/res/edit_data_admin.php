<!--edit user-->
<div class="modal fade" id="edit_adm" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header theme-btn">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Admin</h4>
        </div>
        <div class="modal-body bol">
          <form role="form" action="../sys/update_adm.php" method="post">
            <input class="hidden" type='text' id="id_admin" name="id_admin">
            <label for="edit_username">New Username</label>
            <input type="text" class="form-control" id="edit_username" name="edit_username" placeholder="New Username" maxlength="10" required autofocus><br>
            <label for="edit_password_admin">New Password</label>
            <input type="password" class="form-control" id="edit_password_admin" name="edit_password_admin" placeholder="New Password" required autofocus><br>
        </div>
        <div class="modal-footer">
              <button type="submit" class="btn btn-default btn-success">Update</button>
              <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Batal</button>
        </div>
        </form>
      </div>
    </div>
</div>