<?php

namespace app\src;

use app\Modules\SuperMarket\templates\Template;
use PHPMailer\PHPMailer\PHPMailer;

class Email {


  private $data;
  private $template;

  public function data(array $data){
    $this->data = (object)$data;

    return $this;
  }

  public function template(Template $template){
    if(!isset($this->data)){
      returnApi('Error', 'Data not found','method: data');
    }

    $this->template = $template->run($this->data);

    return $this;
  }

  public function send(){
    $mailer = new PHPMailer;

    $config = (object) mailerConfig();
    $config = (object) $config->email;
    

    
    $mailer->SMTPDebug = 2;                      //Enable verbose debug output
    $mailer->isSMTP();                                            //Send using SMTP
    $mailer->Host       = $config->host;                     //Set the SMTP server to send through
    $mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mailer->Username   = $config->username;              //SMTP username
    $mailer->Password   = $config->password;                              //SMTP password
    $mailer->Port       = $config->port;                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Recipients
    $mailer->setFrom($this->data->fromEmail, $this->data->fromName);
    $mailer->addAddress($this->data->toEmail, $this->data->toName);     //Add a recipient
    
    // returnApi('','', $this->data);


    //Content
    $mailer->isHTML(true);                                  //Set email format to HTML
    $mailer->Subject = $this->data->subject;
    // $mailer->Body    = $this->data->message;
    $mailer->Body    = $this->template;
    $mailer->AltBody = 'Att Marlon Paulo Developer';

    $mailer->send();
  }
}