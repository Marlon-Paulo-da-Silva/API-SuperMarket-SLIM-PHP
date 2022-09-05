<?php

namespace app\Modules\SuperMarket\models;


use app\Connection\Connection;
use app\Modules\SuperMarket\Traits\Create;
use app\Modules\SuperMarket\Traits\Read;
use app\Modules\SuperMarket\Traits\Update;
use app\Modules\SuperMarket\Traits\Delete;

// use Update;
// use Delete;

abstract class Model {

  use Create, Read, Update, Delete;

  protected $connect;
  protected $field;
  protected $value;

  public function __construct()
  {
    $this->connect = Connection::getConnection();
  }

  public function all(){
    $sql = "select * from {$this->table} ";

    $all = $this->connect->query($sql);
    $all->execute();

    return $all->fetchAll();
  }

  public function find($field, $value){
    $this->field = $field;
    $this->value = $value;

    // $sql = "select * from {$this->table} where {$field} = :{$field}";
    // $find = $this->connect->prepare($sql);
    // $find->bindValue($field, $value);
    // $find->execute();

    // return $find->fetch();
    return $this;
  }

  public function destroy($field, $value){
    $sql = "UPDATE {$this->table} SET deleted_at = now() WHERE {$field} = :{$field}";
    $delete = $this->connect->prepare($sql);
    $delete->bindValue($field, $value);
    $delete->execute();

    return $delete->rowCount();
    
  }
}