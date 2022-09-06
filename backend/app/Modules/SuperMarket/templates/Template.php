<?php

namespace app\Modules\SuperMarket\templates;


class Template  {
    public function run($data){
      $contents = file_get_contents(dirname(dirname(__FILE__)) . "/layouts/emails/{$this->template}.php"); 
    
      foreach ($data as $key => $value){
        $find[] = "#{$key}";
        $replace[] = $value;
      }

      return str_replace($find, $replace, $contents);
    
    }
}