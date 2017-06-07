<?php
session_start();
include '../config/config.php';
include 'user_data.php';
ini_set('max_execution_time', 300);
function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DPOTMH | Staff</title>
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
</head>
<body class="hold-transition skin-red sidebar-mini">
  <?php
  if(isset($_GET['error'])){
    $errorTitle = "Error!";
    $error = $_GET['error'];
    echo "<script type='text/javascript'>
    $(document).ready(function(){
      $('#errormodal').modal('show');
    });
  </script>";
}
if(isset($_GET['success'])){
  $successTitle = "Succes!";
  $success = $_GET['success'];
  echo "<script type='text/javascript'>
  $(document).ready(function(){
    $('#successmodal').modal('show');
  });
</script>";
}
?>
<div class="wrapper">
  <header class="main-header">
    <a href="../index.php" class="logo">
      <span class="logo-mini"><b>DPOTMH</b></span>

      <span class="logo-lg"><b>DPOTMH </b></span>
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
                  <?php echo $_SESSION['user_fullname'] ?> - Staff
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

          <a href="#"><i class="fa fa-circle text-success"></i> Staff</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">Control Panel</li>
        <li ><a href="transfer.php"><i class="glyphicon glyphicon-transfer"></i> <span>Transfer</span></a></li>
        <li ><a href="transactions.php"><i class="ion-ios-calendar"></i> <span>Transactions</span></a></li>
        <li ><a href="show-products.php"><i class="fa fa-product-hunt"></i> <span>Products</span></a></li>
        <li class="treeview active">
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
        Profile
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Staff</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile and Info -->
          <div class="box box-danger">
            <div class="box-header">
            </div>
            <div class="box-body">
              <?php
              include '../config/config.php';
              $stmt = $conn->prepare("SELECT * FROM tblusers where UID=:id");
              $stmt->bindParam('id', $_SESSION['user_id']);
              $stmt->execute();
              $stmt->setFetchMode(PDO::FETCH_ASSOC);
              $user_data = $stmt->fetch();
              $member = date("F Y", $user_data["DateAdded"]);
              $fullname = $user_data['first_name']." ".$user_data['middle_name']." ".$user_data['last_name'];
              $gender = $user_data['gender'];
              $bday = $user_data['birthday'];
              ?>
              <img class="img-responsive" src="<?php echo $_SESSION['AccImg'];?>" alt="User Pic" >
              <hr>
              <center><a data-toggle='modal' data-target='#changepic' class="btn btn-success">Change Profile Picture</a></center><hr>
              <?php
              echo "<center>";
              echo "<p>Admin since $member</p>";
              echo "<p>$fullname</p>";
              echo "<p>$gender</p>";
              echo "<p>$bday</p>";
              echo "</center>";
              ?>
              <a data-toggle='modal' data-target='#editmodal' href="edit-profile.php?uid=<?php echo $user_data['UID']?>" class="btn btn-primary pull-right">Edit Profile</a>
            </div>
          </div>
        </div>
        <div class="modal modal-default " id="changepic" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Change Profile Picture</h4>
              </div>
              <form action="changepic.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <label>Profile Picture</label>
                  <input required=""  type="file" name="upload-image" class="input-group" accept="image/*"><br>
                  <p>Enter your password to continue.</p>
                  <div class="form-group has-feedback">
                    <input pattern=".{8,}" required title="Minimum 8 characters required" required=""   type="password" class="form-control" placeholder="Password" required="" name="pass_word">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                </div>
                <div class="modal-footer">
                  <input  type="submit" class="btn btn-primary pull-right" name="changepic" value="Change"></input>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>
              <h3 class="box-title">Announcement</h3>
            </div>
            <div class="box-body chat" id="chat-box">
              <hr>
              <?php
              include '../config/config.php';
              $results = $conn->query("SELECT ann.`AID`, us.`last_name`, us.`first_name`,us.`Accimg`,  ann.`Content`, ann.`DateAdded`
                FROM `tblusers` as us
                INNER JOIN tblannouncements as ann
                ON ann.UID = us.UID ORDER BY `AID` DESC");
              while($r = $results->fetch()){
                $date_posted = date("F j, Y, g:i a", $r["DateAdded"]);
                echo "
                <div class='item'>
                  <img src='".$r['Accimg']."' alt='user image' class='offline'>
                  <p class='message'>
                    <a href='#' class='name'>
                      <small class='text-muted pull-right'><i class='fa fa-clock-o'></i>".$date_posted."</small>
                      ".$r['first_name']." ".$r['last_name']."
                    </a>
                    ".$r['Content']."<br>

                  </p>
                </div>
                ";
              }
              ?>
            </div>
            <!-- /.chat -->
            <div class="box-footer">
            </div>
          </div>


          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>
              <h3 class="box-title">Messages</h3>
            </div>
            <div class="box-body chat" id="chat-box">
              <hr><br>
              <?php
              include '../config/config.php';
              $results = $conn->query("SELECT * FROM `tblmessages` ORDER BY `datemess` DESC");
              while($r = $results->fetch()){
                $date_posted = date("F j, Y, g:i a", $r["datemess"]);
                echo "
                <div class='item'>
                  <p class='message'>
                    <a href='#' class='name'>
                      <small class='text-muted pull-right'><i class='fa fa-clock-o'></i>".$date_posted."</small>
                      ".$r['name']."
                    </a>
                    ".$r['message']."<br><br><br>
                  </p>
                </div>
                ";
              }
              ?>
            </div>
            <!-- /.chat -->
            <div class="box-footer">
            </div>
          </div>
        </div>  <!-- end of col md 5 -->
        <div class="col-md-4">
          <!-- Profile Content -->

          <div class="box box-danger" id="changeUser">
            <div class="box-header">
              <h3 class="box-title">Change Username</h3>
            </div>
            <div class="box-body">
              <form action="change-username.php" method="post">
                <div class="modal-body">
                  <p>New Username</p>
                  <div class="form-group has-feedback">
                    <input required="" pattern=".{8,}" required title="Minimum 8 characters required" type="text" required="" class="form-control" placeholder="Username" name="uname">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <p>Enter password to continue</p>
                  <div class="form-group has-feedback">
                    <input required=""  pattern=".{8,}" required title="Minimum 8 characters required" type="password" class="form-control" placeholder="Password" name="pass_word">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary pull-right" name="submit" value="Change Username"></input>
                </div>
              </form>
            </div>
          </div>
          <div class="box box-danger" id="changePass">
            <div class="box-header">
              <h3 class="box-title">Change Password</h3>
            </div>
            <div class="box-body">
              <form action="change-password.php" method="post">
                <div class="modal-body">
                  <p>Old Password</p>
                  <div class="form-group has-feedback">
                    <input required="" pattern=".{8,}" required title="Minimum 8 characters required" type="password" class="form-control" placeholder="Old Password" name="opass">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <p>New Password</p>
                  <div class="form-group has-feedback">
                    <input required="" pattern=".{8,}" required title="Minimum 8 characters required" type="password" class="form-control" placeholder="New Password" name="npass">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <p>Confirm Password</p>
                  <div class="form-group has-feedback">
                    <input required="" pattern=".{8,}" required title="Minimum 8 characters required" type="password" class="form-control" placeholder="Confirm Password" name="cpass">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary pull-right" name="submit" value="Change Password"></input>
                </div>
              </form>
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
  <div class="modal modal-danger" id="deletemodal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
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

    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      })
      $(function() {
        $('a[href*="#"]:not([href="#"])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html, body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
    </script>
  </body>
  </html>
