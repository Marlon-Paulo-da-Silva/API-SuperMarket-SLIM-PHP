<?php

  use Slim\Routing\RouteCollectorProxy;

  
  // painel admin
  $app->group('/admin', function (RouteCollectorProxy $group) {
    $group->get('/painel', 'app\Modules\SuperMarket\controllers\admin\DashboardController:index');

    $group->get('/users/all', 'app\Modules\SuperMarket\controllers\admin\UserController:index');
    $group->get('/users/first', 'app\Modules\SuperMarket\controllers\admin\UserController:index');
    
    $group->get('/create', 'app\Modules\SuperMarket\controllers\admin\UserController:index');

    $group->get('/login', 'app\Modules\SuperMarket\controllers\admin\LoginController:index');
    $group->post('/login', 'app\Modules\SuperMarket\controllers\admin\LoginController:store');
    
    $group->get('/signup', 'app\Modules\SuperMarket\controllers\admin\UserController:create');
    $group->post('/signup', 'app\Modules\SuperMarket\controllers\admin\UserController:store');
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
    $group->post('/new', 'app\Modules\SuperMarket\controllers\stock\ProductsController:store');
  
  });

