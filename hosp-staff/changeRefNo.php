<?php
	session_start();
	if(isset($_POST['submit']) && isset($_POST['refno']))
	{
		$_SESSION['refNo'] = trim($_POST['refno']);
		header('Location: transfer.php');
	}else{
  		header("Location: transfer.php");
	}


?>			

