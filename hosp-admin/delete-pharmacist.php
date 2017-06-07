<?php
session_start();
include 'authorize.php';
if(!isset($_GET['uid'])){
  header('Location: show-pharmacist.php');
}


?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Confirm</h4>
</div>

<form action="pharmacist-delete.php" method="post">
  <div class="modal-body">
    <p>Enter your password to delete.</p>
    <input type="hidden" name="userid" value="<?php echo $_GET['uid']; ?>">
    <div class="form-group has-feedback">
      <input pattern=".{8,}" required title="Minimum 8 characters required" required=""  type="password" class="form-control" placeholder="Password" name="pass_word">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
  </div>
  <div class="modal-footer">
    <input type="submit" class="btn btn-outline pull-right" name="submit" value="Delete"></input>
  </div>
</form>


