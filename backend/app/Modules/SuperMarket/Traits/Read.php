<?php

namespace app\Modules\SuperMarket\Traits;

trait Read {

  private $sql;

  private $binds;

  public function select($fields = '*'){
    $this->sql = "SELECT {$fields} FROM {$this->table}";

    return $this;
  }

  public function where(){
    $num_args = func_num_args();

    $args = func_get_args();

    $args = $this->whereArgs($num_args, $args);

    // echo json_encode($args);
    // die();


    $this->sql.= " WHERE {$args['field']} {$args['sinal']} :{$args['field']} AND deleted_at IS NULL";

    $this->binds = [
      $args['field'] => $args['value']
    ];

    return $this;
  }

  private function whereArgs($num_args, $args){
    if($num_args < 2){
      throw new \Exception("missing parametes, expected mininum 2");
    }
    
    if($num_args == 2){
      $field = $args[0];
      $sinal = '=';
      $value = $args[1];
    }
    
    if($num_args == 3){
      $field = $args[0];
      $sinal = $args[1];
      $value = $args[2];
    }

    if($num_args > 3){
      throw new \Exception("exceded parametes, expected maximum 3");
    }

    return [
      'field' => $field,
      'sinal' => $sinal,
      'value' => $value
    ];
  }

  public function get(){
    $select = $this->bindAndExecute();

    return $select->fetchAll();
  }

  public function first(){
    $select = $this->bindAndExecute();

    return $select->fetch();
  }

  private function bindAndExecute(){
    $select = $this->connect->prepare($this->sql);
    $select->execute($this->binds);

    return $select;
  }

}