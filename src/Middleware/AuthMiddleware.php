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

            /* fetch request */
            $response = new \Slim\Psr7\Response();

            $isAjax = $request->getHeaderLine('X-Requested-With') === 'XMLHttpRequest';
            if ($isAjax) {
                $response->getBody()->write(json_encode([
                    'success' => false,
                    'message' => 'Não autorizado',
                    'status' => 401
                ]));
                return $response->withHeader('Content-Type', 'application/json')
                    ->withStatus(401);
            }
            
            /*normal route request*/
            return $response
                ->withHeader('Location', '/access-denied')
                ->withStatus(302);
        }

        return $handler->handle($request);
    }
}
