<?php

include_once '../frontend/libs/databaseConnection.php';

if($_GET['type']=='payment'){
  $status=$_POST['paymentInput'];
  $sql="UPDATE `wp-form-payment` SET status=$status";

  $d=new askDatabase();
  $d->modifyDataInDatabase($sql);

  header("Location:".$_SERVER['HTTP_REFERER']);
}

?>
