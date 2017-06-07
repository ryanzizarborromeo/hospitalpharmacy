<?php
function getBrowser()
{
  $u_agent = $_SERVER['HTTP_USER_AGENT'];
  $bname = 'Unknown';
  $platform = 'Unknown';
  $version= "";
  if (preg_match('/linux/i', $u_agent)) {
    $platform = 'linux';
  }
  elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
    $platform = 'mac';
  }
  elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'windows';
  }
  if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
  {
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }
  elseif(preg_match('/Firefox/i',$u_agent))
  {
    $bname = 'Mozilla Firefox';
    $ub = "Firefox";
  }
  elseif(preg_match('/Chrome/i',$u_agent))
  {
    $bname = 'Google Chrome';
    $ub = "Chrome";
  }
  elseif(preg_match('/Safari/i',$u_agent))
  {
    $bname = 'Apple Safari';
    $ub = "Safari";
  }
  elseif(preg_match('/Opera/i',$u_agent))
  {
    $bname = 'Opera';
    $ub = "Opera";
  }
  elseif(preg_match('/Netscape/i',$u_agent))
  {
    $bname = 'Netscape';
    $ub = "Netscape";
  }
  $known = array('Version', $ub, 'other');
  $pattern = '#(?<browser>' . join('|', $known) .
  ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
  if (!preg_match_all($pattern, $u_agent, $matches)) {
  }
  $i = count($matches['browser']);
  if ($i != 1) {
    if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
      $version= $matches['version'][0];
    }
    else {
      $version= $matches['version'][1];
    }
  }
  else {
    $version= $matches['version'][0];
  }
  if ($version==null || $version=="") {$version="?";}
  return array(
    'userAgent' => $u_agent,
    'name'      => $bname,
    'version'   => $version,
    'platform'  => $platform,
    'pattern'    => $pattern
    );
}
$ua=getBrowser();
?>


<?php
session_start();
if(isset($_SESSION['user_id'])){

  if($_SESSION['account_type'] == "ADM")
  {
    header('Location: hosp-admin/profile.php');
  }else if($_SESSION['account_type'] == "PHR")
  {
    header('Location: hosp-staff/profile.php');
  }

}

require 'config/config.php';
if(isset($_POST['submit']))
{
  $uname = $_POST['uname'];
  $pass = md5($_POST['pass']);
  $stmt = $conn->prepare("SELECT UID, account_type FROM tblusers WHERE user_name=:uname and pass_word=:pass AND Deleted='NO'");
  $stmt->bindParam("uname", $uname) ;
  $stmt->bindParam("pass", $pass) ;
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $count=$stmt->rowCount();
  $data=$stmt->fetch();

  if($count)
  {
    $_SESSION['username'] = $uname;
    $_SESSION['user_id']= $data['UID'];
    $_SESSION['account_type'] = $data['account_type'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    $pieces = explode(",", $ip );
    $timenow = time();
    $stmt = $conn->prepare("INSERT INTO `tbllogins`(`IP`, `UID`,`BROWSER`, `PLATFORM`, `LogTime`) VALUES (:ip,:uid,  :browser, :plt, :logt)");
    $stmt->bindParam(':ip', $pieces[0]);
    $stmt->bindParam(':uid', $data['UID']);
    $stmt->bindParam(':browser', $ua['name']);
    $stmt->bindParam(':plt', $ua['platform']);
    $stmt->bindParam(':logt', $timenow);
    $stmt->execute();

    if($_SESSION['account_type'] == "ADM")
    {
      header('Location: hosp-admin/profile.php');
    }else if($_SESSION['account_type'] == "PHR")
    {
      header('Location: hosp-staff/profile.php');
    }
  }
  else
  {
    header('Location:login.php?error=Username / Password mismatch!');
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DPOTMH | Log in</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="ionicons-2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <style type="text/css">
    .img-bg-mine {
      background: url('images/loginbg.jpg')
      no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    body{
      width: 100%;
      height: 100%;
    }
  </style>
</head>
<body class="hold-transition login-page img-bg-mine">
  <div class="img-bg-mine">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b> Dr. Pablo O. Torre Medical Hospital</b></a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input pattern=".{8,}" required title="Minimum 8 characters required" type="text" class="form-control" placeholder="username" name="uname">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input pattern=".{8,}" required title="Minimum 8 characters required" type="password" class="form-control" placeholder="password" name="pass">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div>
            <div class="col-xs-4">
              <input type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="Sign In"></input>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

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
?>
<div class="modal modal-danger" id="errormodal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><?php if(isset($errorTitle)){echo $errorTitle; } else {echo "Error";}?></h4>
        </div>
        <div class="modal-body">
          <p><?php if(isset($error)) echo $error ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-right" data-dismiss="modal" href="login.php">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
