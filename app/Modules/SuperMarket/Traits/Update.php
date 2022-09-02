<?php

namespace app\Modules\SuperMarket\Traits;

trait Update {
  public function update($attributes){
    if(!isset($this->field) or !isset($this->value)){
      returnApi('ERROR', 'identity not found');
    }
    

    $sql = "UPDATE {$this->table} SET ";

    foreach($attributes as $field => $value){
      $sql .= $field . " = :{$field}, ";
    }

    $sql = rtrim($sql, ', ');

    $sql.= ", updated_at = now()";

    $sql.= " where {$this->field} = :{$this->field}";


    // returnApi('SUCCESS', 'sql', $sql);

    $attributes['id'] = $this->value;


    $update = $this->connect->prepare($sql);
    $update->execute($attributes);

    return $update->rowCount();

  }

}