<?php

namespace app\Strategy;



trait BlogStrategy {

  private $errors = [];

  protected function required($field){
    if(empty($_POST[$field])){
      $this->errors[$field][] = flash($field, error('Esse campo é obrigatório'));
    }
  }
  protected function email($field){
    // echo 'email';
    // die();

  }
  protected function phone(){

  }
  protected function unique(){

  }

  public function flashAdd($field, $message){

  }

  public function error( $message){

  }

  public function hasErrors(){
    return !empty($this->errors);
  }
  
}