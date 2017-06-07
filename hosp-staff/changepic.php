<?php
session_start();
function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
}
if(isset($_POST["changepic"])){

  $pass = md5(e($_POST['pass_word']));

  $imgfile = $_FILES['upload-image']['name'];
  $tmp_dir = $_FILES['upload-image']['tmp_name'];
  $imgsize = $_FILES['upload-image']['size'];
  if (empty($imgfile)) {
    header("Location: profile.php?error=Please select an image file. $imgfile");
  }
  else
  {
    if($pass == $_SESSION['pass_word']){
      try
      {
        include '../config/config.php';

        $stmt = $conn->prepare("SELECT `user_name` FROM `tblusers` WHERE UID=:uid");
        $stmt->bindParam("uid", $_SESSION['user_id']) ;
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $data=$stmt->fetch();


        $upload_dir = '../images/dp/';

        $imgext = strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
        $valid = array('jpeg', 'jpg', 'png', 'gif');
        $uploadimg = $data['user_name'] . "_" . rand(1000, 1000000) . "." . $imgext;

        if (in_array($imgext, $valid)) {
          if ($imgsize < 5000000) {
            move_uploaded_file($tmp_dir, $upload_dir.$uploadimg);
            //insert into tbluser
            $destination = $upload_dir.$uploadimg;
            $stmt = $conn->prepare("UPDATE `tblusers` SET `AccImg`=:accimg WHERE `UID`=:uid"); 
            $stmt->bindParam(':accimg', $destination);    
            $stmt->bindParam(':uid', $_SESSION['user_id']);    
            $stmt->execute();
            header("Location: profile.php?success=Profile picture updated!");
          }
          else
          {
            header("Location: profile.php?error=Sorry, the file is too large.");
          }
        }
        else
        {
          header("Location: profile.php?error=File is not supported.");
        }
      }catch(PDOException $e)
      {
        echo "Error: " . $e->getMessage();
      }

    }
  }
}else{
  header("Location: profile.php");
}
?>