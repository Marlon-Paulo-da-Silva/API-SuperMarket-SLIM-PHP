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
    $sql = "select * from {$this->table} limit {$this->limit}";

    $all = $this->connect->query($sql);
    $all->execute();

    return $all->fetchAll();
  }
}