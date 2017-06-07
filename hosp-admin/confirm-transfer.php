<?php
session_start();
include 'authorize.php';
function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
}




if(isset($_POST["submit"])){
  include '../config/config.php';

  $inputpass = md5($_POST['pass_word']);
  if($inputpass == $_SESSION['pass_word'])
  {
    $source = $_POST["transfrom"];
    $destination = $_POST["destination"];
    $refno = e($_SESSION['refNo']);
    $uid = $_SESSION['user_id'];
    $pid = $_POST['pid'];
    $quantity = e($_POST['quantity']);




//check if sufficient quantity from source


//insert into tbltransaction(PID, UID, RefNo, Quantity, TransFrom, TransTo, DateTransfer, Transtype)

//diminish the product in source


//getquantity from source


//if 0, then delete to database
//else if
//not 0 , do nothing


//check if product exist in the destination
//if it exist , update tbldestination set quantity = quantity + :quan
//if not exist, add to tbldestination the product + the quantity



    try{


      if($source == 'ER'){
        $sql2 = "SELECT er.QUANTITY from tblemergencyroom as er WHERE er.PID=:pid";
      }
      else if($source == 'OR'){
        $sql2 = "SELECT op.QUANTITY from tbloperatingroom as op  WHERE op.PID=:pid";

      }
      else if($source == 'PH'){
        $sql2 = "SELECT ph.QUANTITY from tblpharmacy as ph WHERE ph.PID=:pid";

      }
      else if($source == 'WH'){
        $sql2 = "SELECT wh.QUANTITY from tblwarehouse as wh WHERE wh.PID=:pid";
      }

      $stmt = $conn->prepare($sql2);
      $stmt->bindParam(':pid', $pid);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      $data=$stmt->fetch();


      if($data['QUANTITY'] >= $quantity)
      {
        $stmt = $conn->prepare("INSERT INTO `tbltransaction`(`PID`, `UID`, `RefNo`, `Quantity`, `TransFrom`, `TransTo`, `DateTransfer`, `TransType`) VALUES (:pid, :uid, :refno, :quantity, :tfrom, :tto, :ttime, :ttype)");
        $stmt->bindParam(':pid', $pid);
        $stmt->bindParam(':uid', $uid);
        $stmt->bindParam(':refno', $refno);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':tfrom', $source);
        $stmt->bindParam(':tto', $destination);
        $timenow = time();
        $stmt->bindParam(':ttime', $timenow);
        $transtype = "Transfer";
        $stmt->bindParam(':ttype', $transtype);
        $stmt->execute();


        $sql = "";
        if($source == 'ER'){
          $sql1 = "UPDATE `tblemergencyroom` SET`QUANTITY`= `QUANTITY` - :quan WHERE `PID`=:pid";
          $sql2 = "SELECT er.QUANTITY from tblemergencyroom as er WHERE er.PID=:pid";
          $sql3 = "DELETE FROM tblemergencyroom WHERE `PID`=:pid";
        }
        else if($source == 'OR'){
          $sql1 = "UPDATE `tbloperatingroom` SET`QUANTITY`= `QUANTITY` - :quan WHERE `PID`=:pid";
          $sql2 = "SELECT op.QUANTITY from tbloperatingroom as op  WHERE op.PID=:pid";
          $sql3 = "DELETE FROM tbloperatingroom WHERE `PID`=:pid";

        }
        else if($source == 'PH'){
          $sql1 = "UPDATE `tblpharmacy` SET`QUANTITY`= `QUANTITY` - :quan WHERE `PID`=:pid";
          $sql2 = "SELECT ph.QUANTITY from tblpharmacy as ph WHERE ph.PID=:pid";
          $sql3 = "DELETE FROM tblpharmacy WHERE `PID`=:pid";
        }
        else if($source == 'WH'){
          $sql1 = "UPDATE `tblwarehouse` SET`QUANTITY`= `QUANTITY` - :quan WHERE `PID`=:pid";
          $sql2 = "SELECT wh.QUANTITY from tblwarehouse as wh WHERE wh.PID=:pid";
          $sql3 = "DELETE FROM tblwarehouse WHERE `PID`=:pid";
        }

        $stmt = $conn->prepare($sql1);
        $stmt->bindParam(':pid', $pid);
        $stmt->bindParam(':quan', $quantity);
        $stmt->execute();


        $stmt = $conn->prepare($sql2);
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $data=$stmt->fetch();

        if($data['QUANTITY'] == 0)
        {
          $stmt = $conn->prepare($sql3);
          $stmt->bindParam(':pid', $pid);
          $stmt->execute();
        }

    //check if product exist in the destination
    //if it exist , update tbldestination set quantity = quantity + :quan
    //if not exist, add to tbldestination the product + the quantity

        if($destination == 'ER'){
          $sql4 = "SELECT PID FROM `tblemergencyroom` WHERE PID=:pid";
          $sql5 = "UPDATE `tblemergencyroom` SET `QUANTITY`=`QUANTITY` + :additional WHERE `PID`=:pid";
          $sql6 = "INSERT INTO `tblemergencyroom`(`PID`, `QUANTITY`) VALUES (:pid, :quantity)";
        }else if($destination == 'OR'){
          $sql4 = "SELECT PID FROM `tbloperatingroom` WHERE PID=:pid";
          $sql5 = "UPDATE `tbloperatingroom` SET `QUANTITY`=`QUANTITY` + :additional WHERE `PID`=:pid";
          $sql6 = "INSERT INTO `tbloperatingroom`(`PID`, `QUANTITY`) VALUES (:pid, :quantity)";
        }else if($destination == 'PH'){
          $sql4 = "SELECT PID FROM `tblpharmacy` WHERE PID=:pid";
          $sql5 = "UPDATE `tblpharmacy` SET `QUANTITY`=`QUANTITY` + :additional WHERE `PID`=:pid";
          $sql6 = "INSERT INTO `tblpharmacy`(`PID`, `QUANTITY`) VALUES (:pid, :quantity)";
        }else if($destination == 'WH'){
          $sql4 = "SELECT PID FROM `tblwarehouse` WHERE PID=:pid";
          $sql5 = "UPDATE `tblwarehouse` SET `QUANTITY`=`QUANTITY` + :additional WHERE `PID`=:pid";
          $sql6 = "INSERT INTO `tblwarehouse`(`PID`, `QUANTITY`) VALUES (:pid, :quantity)";
        }

        $stmt = $conn->prepare($sql4);
        $stmt->bindParam(":pid", $pid) ;
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $count=$stmt->rowCount();
        $data=$stmt->fetch();

        if($count)
        {
          try{
            $stmt = $conn->prepare($sql5);
            $stmt->bindParam(':additional', $quantity);
            $stmt->bindParam(':pid', $pid);
            $stmt->execute();
            header('Location: transfer.php?success=Product added to currently available product!');
          }
          catch(PDOException $e)
          {
            echo "Error: " . $e->getMessage();
          }
        }
        else
        {
          try{
            $stmt = $conn->prepare($sql6);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':pid', $pid);
            $stmt->execute();
            header('Location: transfer.php?success=Product successfully transfered!');
        //echo "<meta http-equiv='refresh' content='0'>";
          }
          catch(PDOException $e)
          {
            echo "Error: " . $e->getMessage();
          }
        }



        $conn = null;

        header('Location: transfer.php?success=Successfully transfered!');
      }
      else
      {
        header("Location: transfer.php?error=Insufficient Quantity!");
      }



      
    }
    catch(PDOException $e)
    {
      echo "Error: " . $e->getMessage();
    }
  }else
  {
    header("Location: transfer.php?error=Password do not match!");
  }
}


?>



