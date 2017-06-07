<?php
session_start();
include 'authorize.php';
include '../config/config.php';
function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
  }
$result = array();
if(isset($_GET["pid"]) && isset($_GET['from'])){
  //get the quantity, set max of quantity to $result['quantity']

  $pid = e($_GET["pid"]);
  $source = $_GET['from'];
  $sql = "";
  if($source == 'ER')
    $sql = "SELECT er.QUANTITY, pr.Description from tblemergencyroom as er INNER JOIN tblproducts as pr on pr.PID = er.PID WHERE er.PID=:pid";
  if($source == 'OR')
    $sql = "SELECT op.QUANTITY, pr.Description from tbloperatingroom as op INNER JOIN tblproducts as pr on pr.PID = op.PID WHERE op.PID=:pid";
  if($source == 'PH')
    $sql = "SELECT ph.QUANTITY, pr.Description from tblpharmacy as ph INNER JOIN tblproducts as pr on pr.PID = ph.PID WHERE ph.PID=:pid";
  if($source == 'WH')
    $sql = "SELECT wh.QUANTITY, pr.Description from tblwarehouse as wh INNER JOIN tblproducts as pr on pr.PID = wh.PID WHERE wh.PID=:pid";


  $stmt = $conn->prepare($sql); 
  $stmt->bindParam(':pid', $pid);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  $result = $stmt->fetch();
}else{
  header('Location: transfer.php');
  echo "<script>$(function () {
   $('#transfermodal').modal('toggle');
 });</script>";
}
?>



<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Transfer Item</h4>
  </div>
  <form action="confirm-transfer.php" method="post">
    <div class="modal-body">
    <input type="hidden" name="transfrom" value="<?php echo $_GET['from']?>">
    <input type="hidden" name="pid" value="<?php echo $_GET["pid"] ?>">
    <label> Reference Number / ID: <?php echo $_SESSION['refNo']?></label><br>
    <label> <?php echo 'Product Name: '.$result['Description']?></label><br>
          <?php 
          if($_GET['from'] == 'ER')
            echo "<label>From: Emergency Room</label>";
          if($_GET['from'] == 'OR')
            echo "<label>From: Operating Room</label>";
          if($_GET['from'] == 'PH')
            echo "<label>From: Pharmacy</label>";
          if($_GET['from'] == 'WH')
            echo "<label>From: Wharehouse</label>";                                   
          ?> 

      
      <div class="form-group has-feedback">
        <label>Destination</label>
        <select class="form-control" name="destination">
          <?php 
          if($_GET['from'] != 'ER')
            echo "<option value='ER'>Emergency Room</option>";
          if($_GET['from'] != 'OR')
            echo "<option value='OR'>Operating Room</option>";
          if($_GET['from'] != 'PH')
            echo "<option value='PH'>Pharmacy</option>";
          if($_GET['from'] != 'WH')
            echo "<option value='WH'>Warehouse</option>"                                      
          ?> 
        </select>
      </div>


      <script type="text/javascript" src="../numtoggle/NumToggle.js"></script>
      <div class="form-group has-feedback">
      <label>Quantity</label>
        <div class="input-group">
         <span class="input-group-btn">
          <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quantity">
            <span class="glyphicon glyphicon-minus"></span>
          </button>
        </span>
        <input type="text" name="quantity" class="form-control input-number" value="1" max="<?php echo $result['QUANTITY']?>">
        <span class="input-group-btn">
          <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quantity">
            <span class="glyphicon glyphicon-plus"></span>
          </button>
        </span>
      </div>
    </div>
    <p>Enter your password to edit.</p>
    <input type="hidden" name="userid" value="<?php echo $_GET['uid']; ?>">
    <div class="form-group has-feedback">
      <input pattern=".{8,}" required title="Minimum 8 characters required" type="password" class="form-control" placeholder="Password" required="" name="pass_word">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>


  </div>
  <div class="modal-footer">
    <input type="submit" class="btn btn-primary pull-right" name="submit" value="Transfer"></input>
  </div>


</form>
