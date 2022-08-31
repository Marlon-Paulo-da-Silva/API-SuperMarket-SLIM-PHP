<?php

namespace app\Modules\SuperMarket\Strategy;


trait SuperMarketStrategy {

  private $errors = [];
  private $apierrors = [];


  protected function required($field){
    if(empty($_POST[$field])){
      $this->errors[$field][] = flash($field, error('Esse campo é obrigatório'));
      $this->apierrors['errors']['required_fileds'][] = $field;
    }
  }
  protected function email($field){
    

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

  public function getApiErrors(){
    return json_encode([
      'status' => 'ERROR',
      'message' => 'Invalid Signup',
      'data' => $this->apierrors
    ]);
  }
  
}