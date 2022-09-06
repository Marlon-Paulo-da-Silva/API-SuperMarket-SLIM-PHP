<?php

namespace app\Modules\SuperMarket\controllers\contact;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\LoginRepository;
use app\helpers\Validates;
// use app\Modules\SuperMarket\models\Users;
use app\Modules\SuperMarket\templates\Contato;
use app\src\Email;

class ContactController
{
  public function index(Request $request, Response $response, $args)
  {
      returnApi('SUCCESS','Page','Contato');

      return $response;
  }

  public function store(Request $request, Response $response, $args)
  {
    $validate =  new Validates;
    
    
    $data = $validate->validate([
      'name' => 'required',
      'email' => 'required:email',
      'subject' => 'required',
      'message' => 'required'
    ]);
    
    if ($validate->hasErrors()) {
      echo $validate->getApiErrors();
    }

    $email = new Email;
    
    $email->data([
      'fromName' => $data->name,
      'fromEmail' => $data->email,
      'toName' => 'Marlon Paulo',
      'toEmail' => 'marlon.pauloo@gmail.com',
      'subject' => $data->subject,
      'message' => $data->message,
    ])->template(new Contato)->send();

    $email->send();

    returnApi('SUCCESS','Page','Contato');

    return $response;
  }
} 