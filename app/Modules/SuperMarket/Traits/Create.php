<?php

namespace app\Modules\SuperMarket\Traits;

trait Create {
  public function create($attributes){
    $sql = "insert INTO {$this->table} (";
    $sql .= implode(',', array_keys($attributes)) . ', created_at, updated_at, deleted_at) VALUES (';
    $sql .= ':' . implode(', :', array_keys($attributes)) . ', now(), NULL, NULL)';

    // echo $sql;
    // die();

    $create = $this->connect->prepare($sql);
    $create->execute($attributes);

    return $this->connect->lastInsertId();
  }
}