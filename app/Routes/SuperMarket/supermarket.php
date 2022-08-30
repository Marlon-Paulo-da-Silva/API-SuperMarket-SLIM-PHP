<?php

  use Slim\Routing\RouteCollectorProxy;

  $app->group('/stock', function (RouteCollectorProxy $group) {

    $group->get('/products', 'app\Modules\SuperMarket\controllers\stock\ProductsController:index');
  
  
  });