<?php

namespace app\Modules\SuperMarket\controllers\status;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\LoginRepository;
use app\helpers\Validates;
use app\Modules\SuperMarket\models\Products;

class StatusController
{
    public function index(Request $request, Response $response, $args)
    {
        
        echo json_encode(['Status' => 'OK']);

        return $response;
    }

    
}
