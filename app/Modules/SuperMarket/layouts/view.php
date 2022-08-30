<?php

  // namespace app\helpers\helpers;
  

  function view (string $view, array $data = []){
    // $path = dirname(__FILE__) . '/app/Modules/SuperMarket/views/';
    $path = dirname(__FILE__) . '/views';
    echo $path;


    // Create new Plates instance
    $templates = new League\Plates\Engine($path);

    

    // Render a template
    echo $templates->render($view, $data);
  }