<?php

namespace app\Modules\SuperMarket\controllers\user;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\LoginRepository;


class LoginController
{
    public function index(Request $request, Response $response, $args)
    {
        view('Admin/login', ['title' => 'Admin Login']);
        // $response->getBody()->write("Hello, Marlon");
        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        $email = strip_tags($_POST['email']);
        $passwrd = strip_tags($_POST['passwrd']);

        // $connection = Connection::getConnection();

        // $prepare = $connection->prepare("select id, name, email, passwrd from login where email = :email limit 1");
        // $prepare->execute([
        //     'email' => $email
        // ]);
        // $loginRepository = new LoginRepository();
        // $user = $loginRepository->teste();

        $user = new LoginRepository;
        $user = $user->verifyUser($email);

        // echo json_encode($user['passwrd']);

        // die();

        if (!$user) {
            http_response_code(401);
            die();
        }

        // if(!password_verify($passwrd, $user->passwrd)){

        if ($passwrd != $user['passwrd']) {
            // echo json_encode(['passwrd do banco: ' => $user->passwrd]);
            // echo json_encode(['passwrd do formulario: ' => $passwrd]);
            http_response_code(401);
            die();
        }

        unset($user->passwrd);

        $_SESSION['user'] = $user;

        http_response_code(200);

        echo json_encode('loggedIn');

        return $response;
    }
}
