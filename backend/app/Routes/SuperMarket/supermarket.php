<?php

  use Slim\Routing\RouteCollectorProxy;

  
  // painel admin
  $app->group('/admin', function (RouteCollectorProxy $group) {
    $group->get('/painel', 'app\Modules\SuperMarket\controllers\admin\DashboardController:index');
    $group->get('/user/all', 'app\Modules\SuperMarket\controllers\admin\UserController:index');
    
    $group->post('/signup', 'app\Modules\SuperMarket\controllers\admin\UserController:store');
    $group->get('/user/edit/{id}', 'app\Modules\SuperMarket\controllers\admin\UserController:edit');
    $group->post('/user/update/{id}', 'app\Modules\SuperMarket\controllers\admin\UserController:update');
    $group->get('/user/delete/{id}', 'app\Modules\SuperMarket\controllers\admin\UserController:destroy');
    
    $group->get('/create', 'app\Modules\SuperMarket\controllers\admin\UserController:index');

    $group->get('/login', 'app\Modules\SuperMarket\controllers\admin\LoginController:index');
    $group->post('/login', 'app\Modules\SuperMarket\controllers\admin\LoginController:store');
    
  });

  // users
  $app->group('/user', function (RouteCollectorProxy $group) {
    $group->get('/login', 'app\Modules\SuperMarket\controllers\user\LoginController:index');
    $group->post('/login', 'app\Modules\SuperMarket\controllers\user\LoginController:store');
    
    $group->get('/signup', 'app\Modules\SuperMarket\controllers\user\UserController:create');
    $group->post('/signup', 'app\Modules\SuperMarket\controllers\user\UserController:store');
  });
  

  // products
  $app->group('/stock', function (RouteCollectorProxy $group) {

    $group->get('/products', 'app\Modules\SuperMarket\controllers\stock\ProductsController:index');
    $group->get('/products/find', 'app\Modules\SuperMarket\controllers\stock\ProductsController:find');
    
    $group->post('/new', 'app\Modules\SuperMarket\controllers\stock\ProductsController:store');
  
  });

  // contato
  $app->group('/contato', function (RouteCollectorProxy $group) {

    $group->get('/products', 'app\Modules\SuperMarket\controllers\stock\ProductsController:index');
    $group->get('/products/find', 'app\Modules\SuperMarket\controllers\stock\ProductsController:find');
    
    $group->post('/new', 'app\Modules\SuperMarket\controllers\stock\ProductsController:store');
  
  });

