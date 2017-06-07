
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DPOTMH | Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../font-awesome-4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="../ionicons-2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../dist/css/skins/skin-red.min.css">
  <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../dist/js/app.min.js"></script>
<link rel="icon" type="image/png" href="../images/quezonseal.png">
<!--
  <style type="text/css">

    /* Let's get this party started */
    ::-webkit-scrollbar {
      width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      -webkit-border-radius: 10px;
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      -webkit-border-radius: 10px;
      border-radius: 10px;
      background: rgba(255,0,0,0.8);
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
    }
    ::-webkit-scrollbar-thumb:window-inactive {
      background: rgba(255,0,0,0.4);
    }
  </style>

-->
</head>
<body class="hold-transition skin-red sidebar-mini">
  <?php

  function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
  }
  if(isset($_GET['error'])){
    $errorTitle = "Error!";
    $error = e($_GET['error']);
    echo "<script type='text/javascript'>
    $(document).ready(function(){
      $('#errormodal').modal('show');
    });
  </script>";
}

if(isset($_GET['success'])){
  $successTitle = "Succes!";
  $success = e($_GET['success']);
  echo "<script type='text/javascript'>
  $(document).ready(function(){
    $('#successmodal').modal('show');
  });
</script>";
}



?>

<?php
session_start();
include '../config/config.php';
include 'authorize.php';

$results = $conn->query("SELECT UID, Concat(last_name, ', ', first_name, ' ', middle_name) as 'Fullname', gender, birthday, email, DateAdded FROM tblusers WHERE account_type='ADM' AND Deleted='NO'");
$noOfMale = $conn->query("SELECT COUNT(*) as 'NoOfMale' FROM tblusers WHERE gender='Male' ")->fetch();
$noOfFemale = $conn->query("SELECT COUNT(*) as 'NoOfFemale' FROM tblusers WHERE gender='Female'")->fetch();
$totalAdmin = $noOfMale['NoOfMale'] + $noOfFemale['NoOfFemale'];

include 'user_data.php';
?>
<?php

if(isset($_POST["register"])){
  $fname = e($_POST['fname']);
  $mname = e($_POST['mname']);
  $lname = e($_POST['lname']);
  $gender = $_POST['gender'];
  $bday = $_POST['bday'];
  $uname = e($_POST['uname']);
  $email = e($_POST['email']);
  $acctype = 'ADM';
  $pass = md5(e($_POST['pass']));
  $cpass = md5(e($_POST['cpass']));
  $timeNow = time();

  $imgfile = $_FILES['upload-image']['name'];
  $tmp_dir = $_FILES['upload-image']['tmp_name'];
  $imgsize = $_FILES['upload-image']['size'];

  echo $imgfile;
  if (empty($imgfile)) {
    header("Location: show-admins.php?error=Please select an image file. $imgfile");
  }
  else
  {
    if($pass == $cpass){
      try
      {
        $upload_dir = '../images/dp/';
        $imgext = strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
        $valid = array('jpeg', 'jpg', 'png', 'gif');
        $uploadimg = $uname . "_" . rand(1000, 1000000) . "." . $imgext;

        if (in_array($imgext, $valid)) {
          if ($imgsize < 5000000) {
            move_uploaded_file($tmp_dir, $upload_dir.$uploadimg);
            //insert into tbluser
            $destination = $upload_dir.$uploadimg;

            include '../config/config.php';
            $stmt = $conn->prepare("SELECT UID FROM tblusers where user_name=:uname");
            $stmt->bindParam("uname", $uname) ;
            $stmt->execute();
            $count=$stmt->rowCount();

            if($count == 0){
              $stmt = $conn->prepare("INSERT INTO `tblusers`( `user_name`, `pass_word`, `account_type`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `email` ,`DateAdded`, `Deleted`, `AccImg`) VALUES (:uname, :pass, :acctype, :fname, :mname, :lname, :gender, :bday,:email, :dateadded, 'NO', :imgpath);");
              $stmt->bindParam(':uname', $uname);
              $stmt->bindParam(':pass', $pass);
              $stmt->bindParam(':acctype', $acctype);
              $stmt->bindParam(':fname', $fname);
              $stmt->bindParam(':mname', $mname);
              $stmt->bindParam(':lname', $lname);
              $stmt->bindParam(':gender', $gender);
              $stmt->bindParam(':bday', $bday);
              $stmt->bindParam(':email', $email);
              $stmt->bindParam(':dateadded', $timeNow);
              $stmt->bindParam(':imgpath', $destination);
              $stmt->execute();
              echo "<meta http-equiv='refresh' content='0'>";
            }
            else
            {
              $errorTitle = "User Exists!";
              $error = "Username already exist! Please input another unsername!";
              echo "<script type='text/javascript'>
              $(document).ready(function(){
                $('#errormodal').modal('show');
              });
            </script>";
          }



        }
        else
        {
          header("Location: show-admins.php?error=Sorry, the file is too large.");
        }
      }
      else
      {
        header("Location: show-admins.php?error=File is not supported.");
      }



    }

    catch(PDOException $x)
    {
      $errorTitle = "Database Error!";
      $error = $e->getMessage();
    }
  }
  else
  {
    $errorTitle = "Error!";
    $error = "Please retype your password correctly!";
    echo "<script type='text/javascript'>
    $(document).ready(function(){
      $('#errormodal').modal('show');
    });
  </script>";

}
}
$conn = null;
}
?>
<div class="wrapper">
  <header class="main-header">

    <a href="../index.php" class="logo">

      <span class="logo-mini"><b>DPOTMH</b></span>

      <span class="logo-lg"><b>Dr. Pablo O. Torre Medical Hospital </b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src="<?php echo $_SESSION['AccImg'];?>" class="user-image" alt="User Image">

              <span class="hidden-xs"><?php echo $_SESSION['user_fullname'] ?></span>
            </a>
            <ul class="dropdown-menu">

              <li class="user-header">
                <img src="<?php echo $_SESSION['AccImg'];?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['user_fullname'] ?> - Admin
                  <small>Member since <?php echo $_SESSION['membersince']?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['AccImg'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user_fullname'] ?></p>

          <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">Control Panel</li>
        <li><a href="transfer.php"><i class="glyphicon glyphicon-transfer"></i> <span>Transfer</span></a></li>
        <li><a href="transactions.php"><i class="ion-ios-calendar"></i> <span> Transactions</span></a></li>
        <li><a href="show-pharmacists.php"><i class="fa fa-group"></i> <span>Pharmacist</span></a></li>
        <li ><a href="show-products.php"><i class="fa fa-product-hunt"></i> <span>Products</span></a></li>
        <li  class="active" ><a href="show-admins.php"><i class="ion-person"></i> <span> Admins</span></a></li>
        <li class="treeview">
          <a href="profile.php"><i class="fa fa-gears"></i> <span>Account Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="profile.php#changeUser">Change Username</a></li>
            <li><a href="profile.php#changePass">Change Password</a></li>
          </ul>
        </li>
      </ul>

    </section>

  </aside>

  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Admins
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">admins</li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Admins</h3>
        </div>

        <div class="box-body">

          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>User Name</th>
                  <th>Gender</th>
                  <th>Birthday</th>
                  <th>Email</th>
                  <th>Date Added</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while($r = $results->fetch()){
                  echo "<tr>";
                  echo "<td>".$r['UID']."</td>";
                  echo "<td>".$r['Fullname']."</td>";
                  echo "<td>".$r['gender']."</td>";
                  echo "<td>".$r['birthday']."</td>";
                  echo "<td>".$r['email']."</td>";
                  $dateadded = date("F j, Y, g:i a", $r["DateAdded"]);
                  echo "<td>".$dateadded."</td>";
                  echo "<td><a data-toggle='modal' data-target='#editmodal' href='edit-admin.php?uid=".$r["UID"]."'> <span class='glyphicon glyphicon-pencil'></span></a> | <a  data-toggle='modal' data-target='#deletemodal' href='delete-admin.php?uid=".$r["UID"]."'><span class='glyphicon glyphicon-trash'></span></a></td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
              <h3 class="box-title">Add new Admin</h3>
            </div>
            <div class="box-body">
              <div class="register-box-body">
                <p class="login-box-msg">Register a New admin</p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                  <div class="form-group has-feedback">
                    <input type="text" pattern="[a-zA-Z\s]{1,}" title="Letters only!" required="" class="form-control" placeholder="First Name" name="fname">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" pattern="[a-zA-Z\s]{1,}" title="Letters only!"accept=" " required="" class="form-control" placeholder="Middle Name" name="mname">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" pattern="[a-zA-Z\s]{1,}" title="Letters only!" required="" class="form-control" placeholder="Last Name" name="lname">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <select class="form-control" name="gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="date" required="" class="form-control" name="bday" placeholder="Date of Birth">
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="email" required="" class="form-control" placeholder="Email" required="" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" pattern=".{8,}" required title="Minimum 8 characters required" required="" class="form-control" placeholder="Username" name="uname">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" pattern=".{8,}" required title="Minimum 8 characters required" required="" class="form-control" placeholder="Password" name="pass">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" pattern=".{8,}" required title="Minimum 8 characters required" required="" class="form-control" placeholder="Retype password" name="cpass">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                  </div>
                  <input type="file" name="upload-image" class="input-group" accept="image/*">

                  <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat" name="register">Register</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">

            <span class="info-box-icon bg-blue"><i class="fa fa-male"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Male</span>
              <span class="info-box-number"><?php echo $noOfMale['NoOfMale']?></span>
            </div>
          </div>
          <div class="info-box">

            <span class="info-box-icon bg-orange"><i class="fa fa-female"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Female</span>
              <span class="info-box-number"><?php echo $noOfFemale['NoOfFemale']?></span>
            </div>
          </div>
          <div class="info-box">

            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Admins</span>
              <span class="info-box-number"><?php echo $totalAdmin ?></span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Making Life Easier
    </div>
    <strong>R.Borromeo &copy;<?php echo date("Y");?>. <br></strong> All rights reserved.
  </footer>
</div>

<div class="modal modal-success" id="successmodal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><?php if(isset($success)) echo $successTitle?></h4>
        </div>
        <div class="modal-body">
          <p><?php if(isset($success)) echo $success?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal modal-danger" id="errormodal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php if(isset($error)) echo $errorTitle?></h4>
          </div>
          <div class="modal-body">
            <p><?php if(isset($error)) echo $error?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>

          </div>
        </div>

      </div>

    </div>
    <div class="modal modal-danger" id="deletemodal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
        </div>

      </div>

    </div>

    <div class="modal modal-default " id="editmodal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
        </div>

      </div>

    </div>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
      $(document).ready(function()
      {
        $('.modal').on('hidden.bs.modal', function(e)
        {
          $(this).removeData();
        }) ;
      });

    </script>
  </body>
  </html>
