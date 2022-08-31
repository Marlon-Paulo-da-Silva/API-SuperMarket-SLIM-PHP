<?php

namespace app\Modules\SuperMarket\Strategy;


trait SuperMarketStrategy {

  private $errors = [];
  private $apierrors = [];


  protected function required($field){
    if(empty($_POST[$field])){
      // $this->errors[$field][] = flash($field, error('Esse campo é obrigatório'));
      $this->apierrors['errors']['required_fileds'][] = $field;
    }
  }
  protected function email($field){
    if(!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)){
      $this->apierrors['errors']['invalid_email'][] = $_POST[$field];
    }
    
  }
  protected function phone($field){
    if(!preg_match("/^\(?[1-9]{2}\)? ?(?:[2-8]|9[1-9])[0-9]{3}\-?[0-9]{4}$/", $_POST[$field])){
      $this->apierrors['errors']['invalid_phone'][] = $_POST[$field];
    }
  }
  protected function unique(){

  }

  public function flashAdd($field, $message){

  }

  public function error( $message){

  }

  public function hasErrors(){
    return !empty($this->apierrors);
  }

  public function getApiErrors(){
    return json_encode([
      'status' => 'ERROR',
      'message' => 'Invalid Signup',
      'data' => $this->apierrors
    ]);
  }
  
}