<?php

include_once '../../libs/php-mailer/PHPMailer.php';
include_once '../../libs/php-mailer/SMTP.php';
include_once '../../libs/php-mailer/Exception.php';

class email{

    var  $mail='';

    function __construct(){

      $logo = '../../../frontend/img/logo.png';

      $this->mail = new PHPMailer\PHPMailer\PHPMailer();
      $this->mail->IsSMTP(); // enable SMTP
      $this->mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
      $this->mail->SMTPAuth = true; // authentication enabled
      $this->mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
      $this->mail->Host = "poczta.o2.pl";
      $this->mail->Port = 465; // or 587
      $this->mail->IsHTML(true);
      $this->mail->CharSet = 'UTF-8';
      $this->mail->AddEmbeddedImage($logo, 'logo');
 
    }

    public function sendClientEmail($text){
     $email='......';

     $this->mail->Subject = "Potwierdzenie przyjęcia zamówienia.";
     $this->mail->Body = $text;
     $this->mail->AddAddress($email);
     $this->mail->Send();

    }

    public function sendCompanyEmail($text){


      $this->attachment();
      $email='.....';
      $this->mail->Subject = "Klient złożył zamówienie.";
      $this->mail->Body = $text;
      $this->mail->AddAddress($email);
      $this->mail->Send();
    }

  public function attachment(){
    #files listing
    $dir='../../../uploads/';
    foreach(glob($dir.'*') as $filename){
      $file=str_replace($dir,'',$filename);
      #create mail attachment for each file
      $this->mail->AddAttachment('../../../uploads/'.$file, "$file");
    }
  }
}


?>
