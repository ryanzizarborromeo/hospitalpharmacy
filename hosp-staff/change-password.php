<?php
session_start();
include 'authorize.php';
function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
}
if(isset($_POST["submit"])){
  include '../config/config.php';
  $opass = md5(e($_POST['opass']));
  $npass = md5(e($_POST['npass']));
  $cpass = md5(e($_POST['cpass']));

  if($opass == $_SESSION['pass_word'])
  {
    if($cpass == $npass){
      $stmt = $conn->prepare("UPDATE `tblusers` SET `pass_word`=:npass WHERE `UID`=:uid");
      $stmt->bindParam(':uid', $_SESSION['user_id']);
      $stmt->bindParam(':npass', $npass);
      $stmt->execute();
      $_SESSION['pass_word'] = $npass;
      header('Location: profile.php?success=Password updated!');

    }else
    {
      header('Location: profile.php?error=Retype your password correctly!');

    }
  }
  else
  {
    header("Location: profile.php?error=Password do not match!");
  }
}else{
  header("Location: profile.php");
}
?>