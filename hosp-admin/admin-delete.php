<?php
session_start();
include 'authorize.php';
if(isset($_POST["submit"])){
  include '../config/config.php';
  $inputpass = md5($_POST['pass_word']);
  $uid = $_POST["userid"];
  if($inputpass == $_SESSION['pass_word'])
  {
  	$stmt = $conn->prepare("UPDATE `tblusers` SET `Deleted`='YES' WHERE `UID`=:uid");
  	$stmt->bindParam(':uid', $uid);
  	$stmt->execute();
  	$conn = null;
  	header('Location: show-admins.php?success=Account successfully deleted!');
  }else
  {
    header("Location: show-admins.php?error=Password do not match!");
  }
}else
{
  header("Location: show-admins.php");
}

?>
