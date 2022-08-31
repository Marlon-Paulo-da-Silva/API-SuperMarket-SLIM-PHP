<?php

namespace app\Modules\SuperMarket\controllers\admin;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\LoginRepository;
use app\helpers\Validates;
use app\Modules\SuperMarket\models\Users;

class UserController
{

    public function index(Request $request, Response $response, $args){
      $user = new Users;
      $user = $user->create([
        'name' => 'Gabriel',
        'email' => 'gabriel@gmail.com'
      ]);

      echo $user;
      die();

      // echo 'user controller';
      // die();

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

        $data = $validate->validate([
          'name' => 'required',
          // 'name' => 'required:max@25',
          'email' => 'required:email:unique@users',
          'phone' => 'required:phone',
        ]);

        if($validate->hasErrors()){
          // back();
          $errors = $validate->getApiErrors();
          
          echo $errors;
          die();
        }

        echo json_encode($data);
        die();



        // $_SESSION['message'] = 'Cliente cadastrado com sucesso';

        // echo $_SESSION['message'];

        return $response;
    }
}
