<?php
#namespace actions\handlers;
include_once 'fileUpload.php';
include_once 'mailing.php';
include_once 'mailing/message.php';
include_once 'mailing/styles.php';

$f=new file();
$e=new email();

$m=new message($_GET['lang']);
$s=new styles();

if($_GET['action']=='send'){

#this is the company mail
  echo '<h1>Mail do sprzedawcy </h1>';
  ob_start();
    $m->summaryForCompany();
    $s->summaryForCompany();
  $companyMail=ob_get_contents();
  ob_end_flush();

#this is the client mail
  echo '<h1>Mail do zamawiającego </h1>';
  ob_start();
    $m->summaryForClient();
    $s->summaryForClient();
  $clientMail=ob_get_contents();
  ob_end_flush();

  #mail send
  $f->uploadFile();
    $e->sendCompanyEmail($companyMail);
    $e->sendClientEmail($clientMail);
  $f->removeFile();



}




?>
