<?php
session_start();
include 'authorize.php';
function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
}

if(isset($_POST["editprod"])){
  include '../config/config.php';
  $inputpass = md5($_POST['pass_word']);
  if($inputpass == $_SESSION['pass_word'])
  {
    try{
      $pid = $_POST["pid"];
      $prod_code = $_POST["prodcode"];
      $desc = $_POST["desc"];
      $unit = $_POST["unit"];
      $unitcost = $_POST["unitcost"];

      $stmt = $conn->prepare("UPDATE `tblproducts` SET `ProductCode`=:prod_code,`Description`=:description ,`UnitOfMeasure`=:UnitOfMeasure,`UnitCost`=:UnitCost WHERE `PID`=:pid");

      $stmt->bindParam(':prod_code', $prod_code);
      $stmt->bindParam(':description', $desc);
      $stmt->bindParam(':UnitOfMeasure', $unit);
      $stmt->bindParam(':UnitCost', $unitcost);
      $stmt->bindParam(':pid', $pid);

      $stmt->execute();

      header('Location: show-products.php?success=Product successfully edited!');
    }
    catch(PDOException $e)
    {
      echo "Error: " . $e->getMessage();
    }
  }else
  {
    header("Location: show-products.php?error=Password do not match!");
  }
}else{
  header("Location: show-products.php");
}


?>



