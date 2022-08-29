<?php

  // namespace app\helpers\helpers;
  use app\helpers\Flash;
  use app\helpers\Redirect;

  function view (string $view, array $data = []){

    $path = dirname(__FILE__) . '/views';

    // Create new Plates instance
    $templates = new League\Plates\Engine($path);

    

    // Render a template
    echo $templates->render($view, $data);
  }

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