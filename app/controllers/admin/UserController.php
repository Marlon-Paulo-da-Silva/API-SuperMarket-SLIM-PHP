<?php

namespace app\controllers\admin;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\LoginRepository;
use app\helpers\Validates;

class UserController
{
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
