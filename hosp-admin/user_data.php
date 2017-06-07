<?php
  include 'authorize.php';

  $stmt = $conn->prepare("SELECT user_name, AccImg, account_type,Concat(last_name, ', ', first_name, ' ', middle_name) as 'FullName', pass_word, DateAdded FROM tblusers where UID=:id"); 
  $stmt->bindParam('id', $_SESSION['user_id']);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  $user_data = $stmt->fetch();
  $_SESSION['pass_word'] = $user_data['pass_word'];
  $_SESSION['user_fullname'] = $user_data['FullName'];
  $member = date("F Y", $user_data["DateAdded"]);
  $_SESSION['membersince'] = $member;
  $_SESSION['user_name'] = $user_data['user_name'];
  $_SESSION['AccImg'] = $user_data['AccImg'];
  $_SESSION['account_type'] = $user_data['account_type'];

  $conn = null;
  

?>