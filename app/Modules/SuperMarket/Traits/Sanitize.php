<?php

namespace app\Modules\SuperMarket\Traits;


trait Sanitize {
  protected function sanitize(){
    $sanitized = [];


    foreach ($_POST as $field => $value){
      
      $sanitized[$field] = strip_tags($value);}

    return $sanitized;
  }
}