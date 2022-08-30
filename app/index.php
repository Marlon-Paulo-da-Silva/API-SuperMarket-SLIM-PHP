<?php


  // require '../vendor/autoload.php';
  require_once __DIR__ . '/../vendor/autoload.php';
  require 'bootstrap.php';


  use Slim\Factory\AppFactory;
  use Slim\Routing\RouteCollectorProxy;


  $app = AppFactory::create();

  $app->setBasePath('/CRUD-SuperMarket-SLIM-PHP/app');


  $app->get('/', 'app\Modules\SuperMarket\controllers\admin\LoginController:index');
  
  $app->get('/login', 'app\Modules\SuperMarket\controllers\admin\LoginController:index');
  $app->post('/login', 'app\Modules\SuperMarket\controllers\admin\LoginController:store');
  
  $app->get('/signup', 'app\Modules\SuperMarket\controllers\admin\UserController:create');
  $app->post('/signup', 'app\Modules\SuperMarket\controllers\admin\UserController:store');
  
  // painel admin
  // $app->get('/admin/painel', 'app\controllers\admin\DashboardController:index');
  
  
  // $app->group('/admin', function() use($app){
  //   $app->get('/painel', 'app\controllers\admin\DashboardController:index');
  // });

  $app->group('/admin', function (RouteCollectorProxy $group) {
    $group->get('/painel', 'app\Modules\SuperMarket\controllers\admin\DashboardController:index');
  });


  // $app->group('/stock', function (RouteCollectorProxy $group) {

  //   $group->get('/products', 'app\Modules\SuperMarket\controllers\stock\ProductsController:index');
  
  
  // });

  require_once __DIR__ . '/../app/src/routes.php';

  // Run app
  $app->run();