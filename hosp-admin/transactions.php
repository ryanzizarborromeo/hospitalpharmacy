<?php
session_start();
include 'authorize.php';
require '../config/config.php';
$results = $conn->query("SELECT t.TID, p.Description,t.RefNo ,concat(u.last_name, ', ', u.first_name, ' ', u.middle_name) as 'TransBy' , t.Quantity, t.TransFrom, t.TransTo, t.TransType, t.DateTransfer FROM tbltransaction as t LEFT JOIN tblusers as u on u.UID = t.UID LEFT JOIN tblproducts as p ON t.PID = p.PID");

include 'user_data.php';
?>
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
<link rel="icon" type="image/png" href="../images/quezonseal.png">
</head>
<body class="hold-transition skin-red sidebar-mini">
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
          <li class="active"><a href="transactions.php"><i class="ion-ios-calendar"></i> <span>Transactions</span></a></li>
          <li><a href="show-pharmacists.php"><i class="fa fa-group"></i> <span>Pharmacist</span></a></li>
          <li ><a href="show-products.php"><i class="fa fa-product-hunt"></i> <span>Products</span></a></li>
          <li ><a href="show-admins.php"><i class="ion-person"></i> <span>Admins</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-gears"></i> <span>Account Settings</span>
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
          Transactions
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li class="active">Transactions</li>
        </ol>
      </section>

      <section class="content">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Transactions</h3>
          </div>

          <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Transaction ID</th>
                  <th>Reference</th>
                  <th>Product Name</th>
                  <th>Transacted By</th>
                  <th>Quantity</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Date</th>
                  <th>Type</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while($r = $results->fetch()){
                  echo "<tr>";
                  echo "<td>".$r['TID']."</td>";
                  echo "<td>".$r['RefNo']."</td>";
                  echo "<td>".$r['Description']."</td>";
                  echo "<td>".$r['TransBy']."</td>";
                  echo "<td>".$r['Quantity']."</td>";
                  echo "<td>".$r['TransFrom']."</td>";
                  echo "<td>".$r['TransTo']."</td>";
                  $dateTransfer = date("F j, Y, g:i a", $r["DateTransfer"]);
                  echo "<td>".$dateTransfer."</td>";
                  echo "<td>".$r['TransType']."</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
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

  <div class="control-sidebar-bg"></div>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
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
</script>
</body>
</html>
