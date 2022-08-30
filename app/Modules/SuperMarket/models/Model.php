<?php

namespace app\Modules\SuperMarket\models;

use app\Connection\Connection;

class Model {
  protected $connect;

  public function __construct()
  {
    $this->connect = Connection::getConnection();
  }

  public function all(){
    $sql = "select * from {$this->table}";

    $all = $this->connect->query($sql);
    $all->execute();

    return $all->fetchAll();
  }
}