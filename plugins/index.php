<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>QMC | Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../font-awesome-4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="../ionicons-2.0.1/css/ionicons.min.css">
  <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../dist/js/app.min.js"></script>
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../dist/css/skins/skin-orange.min.css">
<link rel="icon" type="image/png" href="../images/quezonseal.png">
</head>
<body class="hold-transition skin-orange sidebar-mini">

  <?php
  session_start();
  //include 'authorize.php';
  include '../config/config.php';

  function e($x){
  return htmlspecialchars(stripslashes(trim($x)));
  } 



  
  
  ?>

  <div class="wrapper">
    <header class="main-header">
      <a href="../index.php" class="logo">
        <span class="logo-mini"><b>Q</b>MC</span>
        
        <span class="logo-lg"><b>Quezon </b>Med Center</span>
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
          <li ><a href="transactions.php"><i class="ion-ios-calendar"></i> <span>Transactions</span></a></li>
          <li><a href="show-pharmacists.php"><i class="fa fa-group"></i> <span>Pharmacist</span></a></li> 
          <li class="active"><a href="show-products.php"><i class="fa fa-product-hunt"></i> <span>Products</span></a></li> 
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
          Products
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li class="active">show products</li>
        </ol>
      </section>
      <div class="example-modal">
        <div class="modal" id="addModal">
          <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Add new Product</h4>
             </div>
             <div class="modal-body">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <div class="form-group has-feedback">
                  <input type="text" required="" class="form-control" placeholder="Product Code" name="prodcode">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input type="text" required="" class="form-control" placeholder="Description" name="desc">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <select class="form-control" id="unit" name="unit">
                    <option value="AMP">Ampule</option>
                    <option value="BTL">Bottle</option>
                    <option value="CAP">Capsule</option>
                    <option value="PCS">Pieces</option>
                    <option value="TAB">Tablet</option>
                    <option value="TUBE">Tube</option>
                    <option value="VIAL">Vial</option>
                  </select>
                </div>
                <div class="form-group has-feedback">
                  <input type="number" min="0.01" step="0.01" required="" class="form-control" placeholder="Unit Cost" name="unitcost">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <script type="text/javascript" src="../numtoggle/NumToggle.js"></script>
                <div class="form-group has-feedback">
                  <div class="input-group">
                   <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quantity">
                      <span class="glyphicon glyphicon-minus"></span>
                    </button>
                  </span>
                  <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="quantity" class="form-control input-number" value="1">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quantity">
                      <span class="glyphicon glyphicon-plus"></span>
                    </button>
                  </span>
                </div>
              </div>
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
             <input type="submit" class="btn btn-primary" name="addprod" value="Confirm"></input>
           </div> 
         </form>
       </div>
     </div>
   </div>
 </div>
 <section class="content">
  <div class="row">
    <div class="col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-plus-square-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Product Count</span>
          <span class="info-box-number"><?php echo $no_of_products['NoOfProducts']?></span>
          <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#addModal">
            Add new Product
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-minus-square-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Items in Inventory</span>
          <span class="info-box-number"><?php echo $totalcount; ?></span>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Price</span>
          <span class="info-box-number"> &#8369; <?php echo $totalprice; ?></span>
        </div>
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Products</h3>
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
            <th>Warehouse</th>
            <th>OR</th>
            <th>ER</th>
            <th>Pharmacy</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          include '../config/config.php';
          $results = $conn->query("SELECT pd.`PID`, pd.`ProductCode`, pd.`Description`, pd.`UnitOfMeasure`, pd.`UnitCost`, 
            (SELECT er.QUANTITY  from tblemergencyroom as er WHERE er.PID = pd.PID LIMIT 1) as 'ER', 
            (SELECT ph.QUANTITY  from tblpharmacy as ph WHERE ph.PID = pd.PID LIMIT 1) as 'PH', 
            (SELECT op.QUANTITY  from tbloperatingroom as op WHERE op.PID = pd.PID LIMIT 1) as 'OP', 
            (SELECT wh.QUANTITY  from tblwarehouse as wh WHERE wh.PID = pd.PID LIMIT 1) as 'WH'
            FROM `tblproducts` as pd
            ");
          while($r = $results->fetch()){
            echo "<tr>";
            echo "<td>".$r['ProductCode']."</td>";
            echo "<td>".$r['Description']."</td>";
            echo "<td>".$r['UnitOfMeasure']."</td>";
            echo "<td>".$r['UnitCost']."</td>";
            if($r['WH'] != null){
              echo "<td>".$r['WH']."</td>";
            }
            else
            {
              echo "<td>0</td>";
            }
            if($r['OP'] != null){
              echo "<td>".$r['OP']."</td>";
            }
            else
            {
              echo "<td>0</td>";
            }  
            if($r['ER'] != null){
              echo "<td>".$r['ER']."</td>";
            }
            else
            {
              echo "<td>0</td>";
            }
            if($r['PH'] != null){
              echo "<td>".$r['PH']."</td>";
            }
            else
            {
              echo "<td>0</td>";
            }
            $total = $r['WH'] + $r['OP'] + $r['ER'] + $r['PH'];
            echo "<td>$total</total>";
            echo "<td><a data-toggle='modal' data-target='#editmodal' href='edit-product.php?pid=".$r["PID"]."'> <span class='glyphicon glyphicon-pencil'></span></a> | <a data-toggle='modal' data-target='#deletemodal' href='delete-product.php?pid=".$r["PID"]."'><span class='glyphicon glyphicon-trash'></span></a></td>";
            echo "</tr>";
            $totalprice += $total * $r['UnitCost'];
            $totalcount += $total;
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
  
  <strong>Copyright &copy;<?php echo date("Y");?><a href="icorrelate.xyz"> ICorrelate</a>.</strong> All rights reserved.
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
