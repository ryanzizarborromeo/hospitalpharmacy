<?php
session_start();
include 'authorize.php';

include '../config/config.php';
function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
}
$result = array();
if(isset($_GET["uid"])){

  $stmt = $conn->prepare("SELECT * FROM tblusers WHERE UID=:id"); 
  $stmt->bindParam(':id', $_GET['uid']);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  $result = $stmt->fetch();
}
else{
  header("Location: show-admins.php");
}
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Edit Admin</h4>
  </div>
  <form action="admin-edit.php" method="post">
    <div class="modal-body">


      <div class="form-group has-feedback">
        <input pattern="[a-zA-Z\s]{1,}" title="Letters only!" type="text" class="form-control" required="" placeholder="First Name" name="fname" value="<?php echo $result['first_name'];?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input pattern="[a-zA-Z\s]{1,}" title="Letters only!" type="text" class="form-control" required="" placeholder="Middle Name" name="mname" value="<?php echo $result['middle_name'];?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input pattern="[a-zA-Z\s]{1,}" title="Letters only!" type="text" class="form-control" required="" placeholder="Last Name" name="lname" value="<?php echo $result['last_name'];?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <select class="form-control" name="gender">
          <option value="Male" <?php if($result['gender'] == 'Male') echo "selected=''"; ?>>Male</option>
          <option value="Female" <?php if($result['gender'] == 'Female') echo "selected=''"; ?>>Female</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="date" class="form-control" required="" name="bday" placeholder="Date of Birth" value="<?php echo $result['birthday'];?>">
        <span class="glyphicon glyphicon-calendar form-control-feedback" ></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" required="" placeholder="Email" required="" name="email" value="<?php echo $result['email'];?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <p>Enter your password to edit.</p>
      <input type="hidden" name="userid" value="<?php echo $_GET['uid']; ?>">
      <div class="form-group has-feedback">
        <input pattern=".{8,}" required title="Minimum 8 characters required" type="password" class="form-control" placeholder="Password" required="" name="pass_word">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>


    </div>
    <div class="modal-footer">
      <input type="submit" class="btn btn-primary pull-right" name="submit" value="Update"></input>
    </div>


  </form>
