<?php
session_start();
include 'authorize.php';
if(isset($_POST["submit"])){
  include '../config/config.php';
  $inputpass = md5($_POST['pass_word']);
  $pid = $_POST["pid"];
  if($inputpass == $_SESSION['pass_word'])
  {
  	$stmt = $conn->prepare("DELETE FROM `tblproducts` WHERE `PID`=:pid");
  	$stmt->bindParam(':pid', $pid);
  	$stmt->execute();
    
    $stmt = $conn->prepare("DELETE FROM `tblemergencyroom` WHERE `PID`=:pid");
    $stmt->bindParam(':pid', $pid);
    $stmt->execute();

    $stmt = $conn->prepare("DELETE FROM `tbloperatingroom` WHERE `PID`=:pid");
    $stmt->bindParam(':pid', $pid);
    $stmt->execute();

    $stmt = $conn->prepare("DELETE FROM `tblpharmacy` WHERE `PID`=:pid");
    $stmt->bindParam(':pid', $pid);
    $stmt->execute();


    $stmt = $conn->prepare("DELETE FROM `tblwarehouse` WHERE `PID`=:pid");
    $stmt->bindParam(':pid', $pid);
    $stmt->execute();

    $conn = null;
    header('Location: show-products.php?success=Product deleted successfully!');
  }else
  {
    header("Location: show-products.php?error=Password do not match!");
  }
}else{
  header("Location: show-products.php");
}
?>

