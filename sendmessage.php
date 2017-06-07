<?php
function e($x){
	return htmlspecialchars(stripslashes($x));
}

if(isset($_POST["submit"])){
	include 'config/config.php';


	$name = e($_POST['namae']);
	$email = e($_POST['email']);
	$message = e($_POST['message']);
	$timenow = time();
	
	try{
		$stmt = $conn->prepare("INSERT INTO `tblmessages`(`name`, `email`, `message`, `datemess`) VALUES (:namae, :email, :message, :datemess)");
		$stmt->bindParam(':namae', $name);
		$stmt->bindParam(':datemess', $timenow);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':message', $message);
		$stmt->execute();
		$conn = null;
		header('Location: index.php');

	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}

}else{
	header('Location: index.php');
}

?>