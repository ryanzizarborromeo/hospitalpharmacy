<?php
session_start();
include 'authorize.php';
function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
}
if(isset($_POST["submit"])){
  include '../config/config.php';
  $inputpass = md5(e($_POST['pass_word']));
  $aid = $_POST["aid"];
  if($inputpass == $_SESSION['pass_word'])
  {
  	$stmt = $conn->prepare("DELETE FROM `tblannouncements` WHERE `AID`=:aid");
  	$stmt->bindParam(':aid', $aid);
  	$stmt->execute();


    $conn = null;
    header('Location: profile.php?success=Announcement deleted successfully!');
  }else
  {
    header("Location: profile.php?error=Password do not match!");
  }
}else{
  header("Location: profile.php");
}
?>

