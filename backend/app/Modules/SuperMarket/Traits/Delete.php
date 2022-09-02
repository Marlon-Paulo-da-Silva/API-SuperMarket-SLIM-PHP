<?php

namespace app\Modules\SuperMarket\Traits;

trait Delete {
  public function delete(){
    if(!isset($this->field) or !isset($this->value)){
      returnApi('ERROR', 'identity not found');
    }

    $sql = "UPDATE {$this->table} SET deleted_at = now() WHERE {$this->field} = :{$this->field} AND deleted_at IS NULL";
    $delete = $this->connect->prepare($sql);
    $delete->bindValue($this->field, $this->value);
    $delete->execute();

    return $delete->rowCount();

  }
}