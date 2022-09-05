<?php

namespace app\Modules\SuperMarket\controllers\admin;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\LoginRepository;
use app\helpers\Validates;
use app\Modules\SuperMarket\models\Users;

class UserController
{

  private $user;

  public function __construct()
  {
    $this->user = new Users;
  }

  public function index(Request $request, Response $response, $args){
    

    $users = $this->user->select('id, name, email, phone')->where('id','>','1')->paginate(3)->get();

    returnApi ('SUCCESS', 'Find Users', ['products' => $users, 'pagination_links' => $this->user->links()]);

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


    $user = $this->user->create((array)$data);

    if($user) {
      returnApi('SUCCESS', 'Registered successfully');
      
    }

    returnApi('ERROR', 'Registration with error');

    // $_SESSION['message'] = 'Cliente cadastrado com sucesso';

    // echo $_SESSION['message'];

    return $response;
  }

  public function edit(Request $request, Response $response, $args){
    
    
    $user = $this->user->select()->where('id', $args['id'])->first();

    returnApi('','',$user);
    
    return $response;
  }
    
  public function update(Request $request, Response $response, $args){
    
    $validate = new Validates;

    $data = $validate->validate([
      'name' => 'required',
      'email' => 'required:email:unique@users',
      'phone' => 'phone',
    ]);

    if($validate->hasErrors()){
      // back();
      $errors = $validate->getApiErrors();
      
      echo $errors;
      die();
    }


    $updated = $this->user->find('id', $args['id'])->update([
      'name' => $data->name,
      'email' => $data->email
    ]);

    // $updated = $this->user->find('id', $args['id'])->update((array)$data);


    
    if($updated){
      returnApi('SUCCESS','update successful!',$data);
    }

    returnApi('ERROR','update not realized');
    
    return $response;
  }

  public function destroy(Request $request, Response $response, $args){
    // $deleted = $this->user->find()->delete();
    $deleted = $this->user->find('id', $args['id'])->delete();

    // returnApi('','',$deleted);

    if($deleted){
      returnApi('SUCCESS','delete successful!');
    }

    returnApi('ERROR','delete not realized');

    return $response;
  
  }
}

