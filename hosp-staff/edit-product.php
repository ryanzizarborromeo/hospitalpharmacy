<?php
session_start();
include 'authorize.php';
include '../config/config.php';
function e($x){
  return htmlspecialchars(stripslashes($x));
}
$result = array();
if(isset($_GET['pid'])){
  $stmt = $conn->prepare("SELECT * FROM `tblproducts` WHERE `PID`=:pid"); 
  $stmt->bindParam(':pid', $_GET['pid']);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  $result = $stmt->fetch();
}else{
  header("Location: show-products.php");
}
?>


<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Edit Product</h4>
  </div>
  <form action="product-edit.php" method="post">
    <div class="modal-body">
      <input type="hidden" name="pid" value="<?php echo $_GET['pid']?>">
      <div class="form-group has-feedback">
        <input type="text" required="" class="form-control" placeholder="Product Code" name="prodcode" value="<?php echo $result['ProductCode']?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" required="" class="form-control" placeholder="Description" name="desc" value="<?php echo $result['Description']?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" id="unit" name="unit">
          <option value="AMP" <?php if($result['UnitOfMeasure'] == 'AMP') echo "selected='selected'"?>>Ampule</option>
          <option value="BTL" <?php if($result['UnitOfMeasure'] == 'BTL') echo "selected='selected'"?>>Bottle</option>
          <option value="CAP" <?php if($result['UnitOfMeasure'] == 'CAP') echo "selected='selected'"?>>Capsule</option>
          <option value="PCS" <?php if($result['UnitOfMeasure'] == 'PCS') echo "selected='selected'"?>>Pieces</option>
          <option value="TAB" <?php if($result['UnitOfMeasure'] == 'TAB') echo "selected='selected'"?>>Tablet</option>
          <option value="TUBE" <?php if($result['UnitOfMeasure'] == 'TUBE') echo "selected='selected'"?>>Tube</option>
          <option value="TUBE" <?php if($result['UnitOfMeasure'] == 'VIAL') echo "selected='selected'"?>>Vial</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="number" min="0.01" step="0.01" required="" placeholder="Unit Cost" name="unitcost" value="<?php echo $result['UnitCost']?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <p>Enter your password to edit.</p>
      <div class="form-group has-feedback">
        <input type="password" pattern=".{8,}" required title="Minimum 8 characters required" class="form-control" placeholder="Password" required="" name="pass_word">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" class="btn btn-primary pull-right" name="editprod" value="Update"></input>
    </div>
  </form>
