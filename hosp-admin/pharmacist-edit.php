<?php
session_start();
include 'authorize.php';

function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
}


if(isset($_POST["submit"])){
  include '../config/config.php';
  $inputpass = md5($_POST['pass_word']);
  $uid = $_POST["userid"];
  if($inputpass == $_SESSION['pass_word'])
  {
    $fname = e($_POST['fname']);
    $mname = e($_POST['mname']);
    $lname = e($_POST['lname']);
    $gender = $_POST['gender'];
    $bday = $_POST['bday'];

    try{
      $stmt = $conn->prepare("UPDATE `tblusers` SET `first_name`=:fname,`middle_name`=:mname,`last_name`=:lname,`gender`=:gender,`birthday`=:bday WHERE `UID`=:uid");
       $stmt->bindParam(':uid', $uid);
       $stmt->bindParam(':fname', $fname);
       $stmt->bindParam(':mname', $mname);
       $stmt->bindParam(':lname', $lname);
       $stmt->bindParam(':gender', $gender);
       $stmt->bindParam(':bday', $bday);
       $stmt->execute();

    $conn = null;

    header("Location: show-pharmacists.php?success=Staff information successfully edited!");
   }
  catch(PDOException $e)
  {
  echo "Error: " . $e->getMessage();
  }
  }else
  {
    header("Location: show-pharmacists.php?error=Password do not match!");
  }
}else{
  header("Location: show-pharmacist.php");
}


?>



