<?php
session_start();
include 'authorize.php';
if(!isset($_GET['pid'])){
  header("Location: show-products.php");
}

?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Confirm</h4>
  </div>

  <form action="product-delete.php" method="post">
    <div class="modal-body">
      <p>Enter your password to delete.</p>
      <input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>">
      <div class="form-group has-feedback">
        <input required="" pattern=".{8,}" required title="Minimum 8 characters required" type="password" class="form-control" placeholder="Password" name="pass_word">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" class="btn btn-outline pull-right" name="submit" value="Delete"></input>
    </div>
  </form>


