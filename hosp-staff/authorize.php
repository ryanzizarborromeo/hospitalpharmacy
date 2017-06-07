<?php
if(!(isset($_SESSION['user_id']) && (isset($_SESSION['account_type']) && $_SESSION['account_type'] == 'PHR')))
{
  header("Location: ../login.php?error=Unauthorized access!");
}
?>

