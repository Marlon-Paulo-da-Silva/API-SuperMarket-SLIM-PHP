<?php

namespace app\Modules\SuperMarket\controllers\user;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\LoginRepository;
use app\helpers\Validates;
use app\Modules\SuperMarket\models\Users;

class UserController
{

    public function index(Request $request, Response $response, $args){
      $user = new Users;
      // $user->create([
      //   'name' => 'Hugo',
      //   'email' => 'hugo@gmail.com'
      // ]);

      echo 'user controller';
      die();

      return $response;
    }

    public function create(Request $request, Response $response, $args)
    {
        view('Admin/signup', ['title' => 'Admin Sign up']);
        // $response->getBody()->write("Hello, Marlon");
        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        
        // $email = strip_tags($_POST['email']);
        // $passwrd = strip_tags($_POST['passwrd']);


        // $user = new LoginRepository;
        // $user = $user->verifyUser($email);

        $validate = new Validates;

        $validate->validate([
          'name' => 'required',
          'email' => 'required:email',
          'phone' => 'required:phone',
        ]);

        if($validate->hasErrors()){
          back();
        }

        // $_SESSION['message'] = 'Cliente cadastrado com sucesso';

        // echo $_SESSION['message'];

        return $response;
    }
}
