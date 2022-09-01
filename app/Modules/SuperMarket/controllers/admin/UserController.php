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
      $users = new Users;

      $users = $users->select('id, name, email, phone')->where('id','>','2')->get();

      echo returnApi('SUCCESS', 'Find Users', $users);

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

        $user = new Users;

        $user = $user->create((array)$data);

        if($user) {
          echo returnApi('SUCCESS', 'Registered successfully');
          
        }

        echo returnApi('ERROR', 'Registration with error');

        // $_SESSION['message'] = 'Cliente cadastrado com sucesso';

        // echo $_SESSION['message'];

        return $response;
    }

    public function edit(Request $request, Response $response, $args){
      
      $user = new Users;
      $user = $user->select()->where('id', $args['id'])->first();

      echo returnApi('','',$user);
      
      return $response;
    }
    
    public function update(Request $request, Response $response, $args){
      

      echo returnApi('','',$args);

      return $response;
    }

}
