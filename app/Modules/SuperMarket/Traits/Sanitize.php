<?php

namespace app\Modules\SuperMarket\Traits;


trait Sanitize {
  protected function sanitize(){
    $sanitized = [];


    foreach ($_POST as $field => $value){
      
      $sanitized[$field] = htmlentities($value, ENT_QUOTES, 'UTF-8');
    }

    return $sanitized;
  }
}