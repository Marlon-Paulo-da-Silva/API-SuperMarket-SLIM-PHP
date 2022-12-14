<?php

namespace app\Modules\SuperMarket\Traits;
use app\Modules\SuperMarket\models\Paginate;

trait Read {

  private $binds;

  private $isPaginate = false;
  
  private $paginate;

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

  public function paginate($perPage){
    $this->paginate = new Paginate;

    $this->paginate->records($this->count());

    $this->paginate->paginate($perPage);
    
    $this->sql .= $this->paginate->sqlPaginate();

    return $this;
  }

  public function links(){
    
    return $this->paginate->links();
  }

  public function busca($fields){
    $fields = explode(',', $fields);

    $this->sql .= " WHERE";    
    foreach ($fields as $field) {
      $this->sql .= " {$field} LIKE :{$field} or"; 
      $this->binds[$field] = "%" . busca() . "%";
    }

    $this->sql = rtrim($this->sql, ' or');

    // returnApi('','', $this->sql);
    return $this;

  }

  public function get(){
    $select = $this->bindAndExecute();

    return $select->fetchAll();
  }

  public function first(){
    $select = $this->bindAndExecute();

    return $select->fetch();
  }

  public function count(){
    $select = $this->bindAndExecute();

    return $select->rowCount();
  }

  private function bindAndExecute(){

    $select = $this->connect->prepare($this->sql);
    $select->execute($this->binds);

    return $select;
  }

}