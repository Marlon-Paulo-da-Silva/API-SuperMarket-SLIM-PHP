<?php

namespace app\Modules\SuperMarket\controllers\stock;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\LoginRepository;
use app\helpers\Validates;
use app\Modules\SuperMarket\models\Products;

class ProductsController
{
    public function index(Request $request, Response $response, $args)
    {
        $products = new Products;
        $products = $products->select()->paginate(2)->get();

        returnApi ('SUCCESS', 'Find products', $products);

        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        $products = new Products;
        $products = $products->create([
            'name' => 'Pera',
            'type' => 'fruit',
            'price' => '2.99',
            'quantity' => '60',
            'measurement' => 'unity'
        ]);
        
        echo $products;
        die();

        // echo 'user controller';
        // die();

        return $response;
    }
}
