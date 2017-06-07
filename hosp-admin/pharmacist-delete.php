<?php
session_start();
include 'authorize.php';
function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
  }
if(isset($_POST["submit"])){
  include '../config/config.php';
  $inputpass = md5(e($_POST['pass_word']));
  $uid = $_POST["userid"];
  if($inputpass == $_SESSION['pass_word'])
  {
  	$stmt = $conn->prepare("UPDATE `tblusers` SET `Deleted`='YES' WHERE `UID`=:uid");
  	$stmt->bindParam(':uid', $uid);
  	$stmt->execute();
  	$conn = null;
  	header('Location: show-pharmacists.php?success=Account successfully deleted!');
  }else
  {
    header("Location: show-pharmacists.php?error=Password do not match!");
  }
}else{
  header("Location: show-pharmacist.php");
}

?>
