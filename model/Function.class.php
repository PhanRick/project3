<?php 
abstract class Functions {
    public static function send_email ($email,$subject, $msg_body){       
       $to = $email;
       $headers  = 'From: herzing.prog@gmail.com' . "\r\n" .
       'MIME-Version: 1.0' . "\r\n" .
       'Content-type: text/html; charset=utf-8';

       if(mail($to, $subject, $msg_body, $headers))
          return true;
      else
          return false;

  }
}
?>