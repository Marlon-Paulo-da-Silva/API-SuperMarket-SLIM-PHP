<?php

namespace app\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Controller {
  // public function index(Request $request, Response $response, $args){
  //   view('login', ['title' => 'Login']);
  //   // $response->getBody()->write("Hello, Marlon");
  //   return $response;
  // }
  private $templates;

    // public function __construct(League\Plates\Engine $templates)
    // {
    //     $this->templates = $templates;
    // }

    // // Create a template object
    // public function getIndex()
    // {
    //     $template = $this->templates->make('home');

    //     return $template->render();
    // }

    // // Render a template directly
    // public function getIndex()
    // {
    //     return $this->templates->render('home');
    // }
}