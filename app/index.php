<?php

  // require '../vendor/autoload.php';
  require_once __DIR__ . '/../vendor/autoload.php';
  require 'bootstrap.php';

  use Slim\Factory\AppFactory;

  $app = AppFactory::create();

  $app->setBasePath('/CRUD-SuperMarket-SLIM-PHP/app');

  $app->get('/', 'app\Modules\SuperMarket\controllers\status\StatusController:index');

  require_once __DIR__ . '/../app/src/routes.php';

  // Run app
  $app->run();