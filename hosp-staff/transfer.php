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
  <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../dist/js/app.min.js"></script>
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../dist/css/skins/skin-red.min.css">
<link rel="icon" type="image/png" href="../images/quezonseal.png">
</head>
<body class="hold-transition skin-red sidebar-mini">
  <?php
  session_start();
  include 'authorize.php';
  include '../config/config.php';
  include 'user_data.php';

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
          <li class="active"><a href="transfer.php"><i class="glyphicon glyphicon-transfer"></i> <span>Transfer</span></a></li>
          <li ><a href="transactions.php"><i class="ion-ios-calendar"></i> <span>Transactions</span></a></li>
          <li ><a href="show-products.php"><i class="fa fa-product-hunt"></i> <span>Products</span></a></li>
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
          Transfer
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Staff</a></li>
          <li class="active">transfer</li>
        </ol>
      </section>





      <section class="content">
        <div class="row">
          <div class="col-sm-2"> </div>
          <div class="col-sm-2"> </div>
          <div class="col-sm-8">
            <form action="changeRefNo.php" method="post" class="form-inline pull-right">
              <label>Reference Number: </label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                <input required="" type="text" class="form-control" name="refno" value="<?php if(isset($_SESSION['refNo'])){ echo $_SESSION['refNo'];}?>" required="">
              </div>
              <input type="submit" class="btn btn-primary" name="submit" value="Set"></input>
            </form>
          </div>
        </div>


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pharmacy</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>

          <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Product Code</th>
                  <th>Description</th>
                  <th>Unit Of Measure</th>
                  <th>Unit Cost</th>
                  <th>Quantity</th>
                  <th>Transfer</th>
                </thead>
                <tbody>
                  <?php
                  include '../config/config.php';
                  $results = $conn->query("SELECT pd.`PID`, pd.`ProductCode`, pd.`Description`, pd.`UnitOfMeasure`, pd.`UnitCost`, ph.`Quantity`
                    FROM `tblproducts` as pd
                    INNER JOIN `tblpharmacy` as ph
                    ON ph.`PID` = pd.`PID`
                    ");
                  while($r = $results->fetch()){
                    echo "<tr>";
                    echo "<td>".$r['ProductCode']."</td>";
                    echo "<td>".$r['Description']."</td>";
                    echo "<td>".$r['UnitOfMeasure']."</td>";
                    echo "<td>".$r['UnitCost']."</td>";
                    if($r['Quantity'] != null){
                      echo "<td>".$r['Quantity']."</td>";
                    }
                    else
                    {
                      echo "<td>0</td>";
                    }
                    if(!isset($_SESSION['refNo']) || $_SESSION['refNo'] == "" || ctype_space($_SESSION['refNo'])){
                      echo "<td><a href='transfer.php?error=Set Reference Number'> <span class='glyphicon glyphicon-transfer'></td>";
                      echo "</tr>";
                    }
                    else
                    {
                      echo "<td><a data-toggle='modal' data-target='#transfermodal' href='make-transfer.php?pid=".$r["PID"]."&from=PH'> <span class='glyphicon glyphicon-transfer'></td>";
                      echo "</tr>";
                    }
                    echo "</tr>";
                  }
                  ?>
                </tbody>
              </table>
              </div>
            </div>
          </div>
          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Emergency Room</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Product Code</th>
                    <th>Description</th>
                    <th>Unit Of Measure</th>
                    <th>Unit Cost</th>
                    <th>Quantity</th>
                    <th>Transfer</th>
                  </thead>
                  <tbody>
                    <?php
                    include '../config/config.php';
                    $results = $conn->query("SELECT pd.`PID`, pd.`ProductCode`, pd.`Description`, pd.`UnitOfMeasure`, pd.`UnitCost`, er.`Quantity`
                      FROM `tblproducts` as pd
                      INNER JOIN `tblemergencyroom` as er
                      ON er.`PID` = pd.`PID`
                      ");
                    while($r = $results->fetch()){
                      echo "<tr>";
                      echo "<td>".$r['ProductCode']."</td>";
                      echo "<td>".$r['Description']."</td>";
                      echo "<td>".$r['UnitOfMeasure']."</td>";
                      echo "<td>".$r['UnitCost']."</td>";
                      if($r['Quantity'] != null){
                        echo "<td>".$r['Quantity']."</td>";
                      }
                      else
                      {
                        echo "<td>0</td>";
                      }

                      if(!isset($_SESSION['refNo']) || $_SESSION['refNo'] == "" || ctype_space($_SESSION['refNo'])){
                        echo "<td><a href='transfer.php?error=Set Reference Number'> <span class='glyphicon glyphicon-transfer'></td>";
                        echo "</tr>";
                      }
                      else
                      {
                        echo "<td><a data-toggle='modal' data-target='#transfermodal' href='make-transfer.php?pid=".$r["PID"]."&from=ER'> <span class='glyphicon glyphicon-transfer'></td>";
                        echo "</tr>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Operating Room</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Product Code</th>
                      <th>Description</th>
                      <th>Unit Of Measure</th>
                      <th>Unit Cost</th>
                      <th>Quantity</th>
                      <th>Transfer</th>
                    </thead>
                    <tbody>
                      <?php
                      include '../config/config.php';
                      $results = $conn->query("SELECT pd.`PID`, pd.`ProductCode`, pd.`Description`, pd.`UnitOfMeasure`, pd.`UnitCost`, op.`Quantity`
                        FROM `tblproducts` as pd
                        INNER JOIN `tbloperatingroom` as op
                        ON op.`PID` = pd.`PID`
                        ");
                      while($r = $results->fetch()){
                        echo "<tr>";
                        echo "<td>".$r['ProductCode']."</td>";
                        echo "<td>".$r['Description']."</td>";
                        echo "<td>".$r['UnitOfMeasure']."</td>";
                        echo "<td>".$r['UnitCost']."</td>";
                        if($r['Quantity'] != null){
                          echo "<td>".$r['Quantity']."</td>";
                        }
                        else
                        {
                          echo "<td>0</td>";
                        }
                        if(!isset($_SESSION['refNo']) || $_SESSION['refNo'] == "" || ctype_space($_SESSION['refNo'])){
                          echo "<td><a href='transfer.php?error=Set Reference Number'> <span class='glyphicon glyphicon-transfer'></td>";
                          echo "</tr>";
                        }
                        else
                        {
                          echo "<td><a data-toggle='modal' data-target='#transfermodal' href='make-transfer.php?pid=".$r["PID"]."&from=OP'> <span class='glyphicon glyphicon-transfer'></td>";
                          echo "</tr>";
                        }
                        echo "</tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Warehouse</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <table id="example4" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product Code</th>
                        <th>Description</th>
                        <th>Unit Of Measure</th>
                        <th>Unit Cost</th>
                        <th>Quantity</th>
                        <th>Transfer</th>
                      </thead>
                      <tbody>
                        <?php
                        include '../config/config.php';
                        $results = $conn->query("SELECT pd.`PID`, pd.`ProductCode`, pd.`Description`, pd.`UnitOfMeasure`, pd.`UnitCost`, wh.`Quantity`
                          FROM `tblproducts` as pd
                          INNER JOIN `tblwarehouse` as wh
                          ON wh.`PID` = pd.`PID`
                          ");
                        while($r = $results->fetch()){
                          echo "<tr>";
                          echo "<td>".$r['ProductCode']."</td>";
                          echo "<td>".$r['Description']."</td>";
                          echo "<td>".$r['UnitOfMeasure']."</td>";
                          echo "<td>".$r['UnitCost']."</td>";
                          if($r['Quantity'] != null){
                            echo "<td>".$r['Quantity']."</td>";
                          }
                          else
                          {
                            echo "<td>0</td>";
                          }
                          if(!isset($_SESSION['refNo']) || $_SESSION['refNo'] == "" || ctype_space($_SESSION['refNo'])){
                            echo "<td><a href='transfer.php?error=Set Reference Number'> <span class='glyphicon glyphicon-transfer'></td>";
                            echo "</tr>";
                          }
                          else
                          {
                            echo "<td><a data-toggle='modal' data-target='#transfermodal' href='make-transfer.php?pid=".$r["PID"]."&from=WH'> <span class='glyphicon glyphicon-transfer'></td>";
                            echo "</tr>";
                          }
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>s
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
      <div class="modal modal-success" id="successmodal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php if(isset($success)) echo $successTitle?></h4>
              </div>
              <div class="modal-body">
                <p><?php if(isset($success)) echo $success ?></p>
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


          <div class="modal modal-default " id="transfermodal" role="dialog">
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
              $("#example2").DataTable();
              $("#example3").DataTable();
              $("#example4").DataTable();
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
