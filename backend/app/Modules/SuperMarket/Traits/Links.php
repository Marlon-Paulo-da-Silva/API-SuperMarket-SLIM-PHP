<?php

namespace app\Modules\SuperMarket\Traits;

trait Links {

  protected $maxLinks = 4;

  private function previous(){
    $preview = 0;
    if($this->page > 1){
      $preview = ($this->page - 1);
      // $links = 'first page: 1, ';
      // $links .= 'Previous page: '.$preview.' ';
  
      // return $links;
    }
    return $preview;
  }

  private function next(){
    $next = 0;
    if($this->page < $this->pages){
      $next = ($this->page + 1);
      // $links = 'Next page: '.$next;
      // $links .= 'Total pages: '.$this->pages.' ';
  
      // return $links;
      
    }
    return $next;
  }

  public function links(){
    $actual = 0;

    if($this->pages > 0){
      // $links = "";
      // $links .= $this->previous();
      $actual = 0;
      

      for ($i=$this->page - $this->maxLinks; $i <= $this->page + $this->maxLinks; $i++) { 
        
        if($i == $this->page) {
          $actual = $this->page;
        }
        // $actual =  ($i == $this->page) ? 'actual' : '';

        // if($i > 0 && $i <= $this->pages){
        //   $links .= ' pagina: '.$i.' '.$actual.' ';
        // }
      }

      // $links .= $this->next();

      // return [
      //   'Page actual' => $actual,
      //   'Previous page' => $this->previous(),
      //   'Next Page' => $this->next(),
      //   'Total Pages' => $this->pages
      // ];
      
    }

    return [

      'page_actual' => $actual,
      'previous_page' => $this->previous(),
      'next_page' => $this->next(),
      'total_Pages' => $this->pages
    ];
  }
}