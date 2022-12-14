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
    if(!empty($_POST[$field])){
      if(!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)){
        $this->apierrors['errors']['invalid_email'][] = $_POST[$field];
      }
    }
    
  }
  
  protected function phone($field){
    if(!empty($_POST[$field])){
      if(!preg_match("/^\(?[1-9]{2}\)? ?(?:[2-8]|9[1-9])[0-9]{3}\-?[0-9]{4}$/", $_POST[$field])){
        $this->apierrors['errors']['invalid_phone'][] = $_POST[$field];
      }
    }
  }
  
  protected function unique($field, $model){
    $model = "app\\Modules\\SuperMarket\\models\\" . ucfirst($model);
    
    $model = new $model();
    
    $find = $model->select()->where($field, $_POST[$field])->first();
    
    if($find and !empty($_POST[$field])){
      $this->apierrors['errors']['already_exist'][] = $field . ' already exist';
    }
  }
  
  protected function max($field, $max){
    if(strlen($_POST[$field]) > $max){
      $this->apierrors['errors']['character_exceded'][] = $field . " higher than {$max} characters";
    }
  }

  public function hasErrors(){
    return !empty($this->apierrors);
  }

  public function getApiErrors(){
    echo json_encode([
      'status' => 'ERROR',
      'message' => 'Invalid data',
      'data' => $this->apierrors
    ]);

    die();
  }
  
}