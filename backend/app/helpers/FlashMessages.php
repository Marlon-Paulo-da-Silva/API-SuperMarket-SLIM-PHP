<?php

use app\helpers\Flash;

function getFlash(string $key){
  return Flash::get($key);
}