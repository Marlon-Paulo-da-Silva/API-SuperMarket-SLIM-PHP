<?php

namespace app\Modules\SuperMarket\controllers\admin;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class DashboardController
{
    public function index(Request $request, Response $response, $args)
    {
        view('Admin/dashboard', ['title' => 'Admin Painel']);
        // $response->getBody()->write("Hello, Marlon");
        return $response;
    }
}
