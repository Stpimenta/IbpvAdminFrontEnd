<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use League\Plates\Engine;

class ErrorController {
    private Engine $templates;

    public function __construct() {
        $this->templates = new Engine(__DIR__ . '/../templates');
    }

    public function noPermission(Request $request, Response $response): Response {
        $response->getBody()->write(
            $this->templates->render('accessDenied', ['title' => 'Acesso Negado'])
        );
        return $response;
    }

    public function notFound(Request $request, Response $response): Response {
    $response->getBody()->write(
        $this->templates->render('notFound', ['title' => 'Página Não Encontrada'])
    );
    return $response->withStatus(404);
}

}
