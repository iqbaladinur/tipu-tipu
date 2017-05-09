<!--edit user-->
<div class="modal fade" id="edit_usr" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header theme-btn">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data User</h4>
        </div>
        <div class="modal-body bol">
          <form role="form" action="../sys/update_usr.php" method="post">
            <label for="edit_id_usr">User ID</label>
            <input readonly type="text" class="form-control" id="edit_id_usr" name="edit_id_usr" placeholder="User Id" maxlength="10" required autofocus><br>
            <label for="edit_email">New Email Address</label>
            <input type="email" class="form-control" id="edit_email" name="edit_email" placeholder="Email Address" required autofocus><br>
            <label for="edit_Password">New Password</label>
            <input type="password" class="form-control" id="edit_password" name="edit_password" placeholder="Password" required autofocus><br>
            <label for="edit_status">Status</label>
            <select name="edit_status" id="edit_status"  class="form-control">
              <option value="yes">Confirmed</option>
              <option value="no">Unconfirmed</option>
            </select>
        </div>
        <div class="modal-footer">
              <button type="submit" class="btn btn-default btn-success">Update</button>
              <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Batal</button>
        </div>
        </form>
      </div>
    </div>
</div>