<?php

  // namespace app\helpers\helpers;
  use app\helpers\Flash;
  use app\helpers\Redirect;

  // function view (string $view, array $data = []){
  //   $path = dirname(__FILE__) . '/app/Modules/SuperMarket/views/';
  //   echo $path;
  //   // $path = dirname(__FILE__) . '/views';


  //   // Create new Plates instance
  //   $templates = new League\Plates\Engine($path);

    

  //   // Render a template
  //   echo $templates->render($view, $data);
  // }

  function flash($index, $message){
    Flash::add($index, $message);
  }

  function getFlash(string $key){
    return Flash::get($key);
  }

  function error($message){
    return "<span class='error'>* {$message}</span>";
  }
  
  function success($message){
    return "<span class='success'>* {$message}</span>";
  }
  
  function back(){
    Redirect::back();

    die();
  }

  function returnApi($status, $message, $data = []){
    echo json_encode([
      'status' => $status,
      'message' => $message,
      'data' => $data
    ]);

    die();
  }

  function busca(){
    $search = '';
    if(isset($_GET['search'])){
      $search = strip_tags($_GET['search']);
    }
    return $search;
  }

  function mailerConfig(){
    $mailerConf = [
      'email' => [
        'host' => 'smtp.mailtrap.io',
        'port' => 465,
        'username' => '9b6d23179a7e84',
        'password' => 'b99e1cf57c951a'
      ]
    ];
    return $mailerConf;
  }