<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class AuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        if (!isset($_SESSION['user'])) {
            $response = new \Slim\Psr7\Response();
            return $response
                ->withHeader('Location', '/access-denied')
                ->withStatus(302);
        }

        return $handler->handle($request);
    }
}