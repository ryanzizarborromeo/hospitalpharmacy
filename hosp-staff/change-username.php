<?php
session_start();
include 'authorize.php';
function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
}
if(isset($_POST["submit"])){
  include '../config/config.php';
  $inputpass = md5($_POST['pass_word']);
  $uid = $_SESSION['user_id'];
  $uname = e($_POST['uname']);



  if($inputpass == $_SESSION['pass_word'])
  {
    $stmt = $conn->prepare("SELECT UID FROM tblusers where user_name=:uname");
    $stmt->bindParam("uname", $uname) ;
    $stmt->execute();
    $count=$stmt->rowCount();

    if($count == 0){
      $stmt = $conn->prepare("UPDATE `tblusers` SET `user_name`=:usrname WHERE `UID`=:uid");
      $stmt->bindParam(':uid', $uid);
      $stmt->bindParam(':usrname', $uname);
      $stmt->execute();
      $_SESSION['username'] = $uname;

      $conn = null;
      header('Location: profile.php?success=Username updated!');

    }else{
      header('Location: profile.php?error=Username already exist!!');
    }

  }else
  {
    header("Location: profile.php?error=Password do not match!");
  }
}
else{
  header("Location: profile.php");
}

?>