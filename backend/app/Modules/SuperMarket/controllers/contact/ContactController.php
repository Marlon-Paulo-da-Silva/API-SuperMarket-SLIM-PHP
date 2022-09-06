<?php

namespace app\Modules\SuperMarket\controllers\contact;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\LoginRepository;
use app\helpers\Validates;
use app\Modules\SuperMarket\models\Users;

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

      returnApi('SUCCESS','Page','Contato');

      return $response;
  }
} 