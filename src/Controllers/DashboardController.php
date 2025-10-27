<?php

namespace App\Controllers;

use App\Models\Role;
use  App\Models\User;
use App\Services\JWTService;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use League\Plates\Engine;

class DashboardController
{
    private $templates;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../templates');
    }

    public function index(Request $request, Response $response)
    {

        //verify token
        $token = $_SESSION['jwtToken'] ?? null;

        if (!$token || !JWTService::isValid($token)) {
            return $response
                ->withHeader('Location', '/')
                ->withStatus(302);
        }

        //verify permisson 
        /** @var User $user */
        $user = $_SESSION['user'];
        if (!in_array($user->role, [Role::ROOT, Role::ADMIN, Role::TESOURARIA])) {
            return $response
                ->withHeader('Location', '/access-denied')
                ->withStatus(302);
        }


        // render layout and default content
        $response->getBody()->write($this->templates->render('layout', ['title' => 'Dashboard']));
        return $response;
    }

    public function content(Request $request, Response $response, array $args)
    {
        session_start();
        $token = $_SESSION['jwtToken'] ?? null;
        
        if (!$token || !JWTService::isValid($token)) {
            return $response->withStatus(401);
        }

        $page = $args['page'];
        $file = "dashboard/{$page}";
        if (!file_exists(__DIR__ . '/../templates/' . $file . '.php')) {
            $response->getBody()->write("<p>Página não encontrada</p>");
            return $response->withStatus(404);
        }

        $response->getBody()->write($this->templates->render($file));
        return $response;
    }
}
