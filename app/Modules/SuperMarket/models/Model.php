<?php

namespace app\Modules\SuperMarket\models;

use app\Modules\SuperMarket\Traits\Create;
// use Read;
// use Update;
// use Delete;

use app\Connection\Connection;

class Model {

  use Create;

  protected $connect;

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
    $sql = "select * from {$this->table} where {$field} = :{$field}";
    $find = $this->connect->prepare($sql);
    $find->bindValue($field, $value);
    $find->execute();

    return $find->fetch();
  }
}