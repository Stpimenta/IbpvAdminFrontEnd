<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use League\Plates\Engine;

class DashboardController {
    private $templates;

    public function __construct() {
        $this->templates = new Engine(__DIR__ . '/../templates');
    }

    public function index(Request $request, Response $response) {
        // render content
        $response->getBody()->write($this->templates->render('layout', ['title' => 'Dashboard']));
        return $response;
    }

    public function content(Request $request, Response $response, array $args) {
        $page = $args['page'];
        $file = "dashboard/{$page}";

        // Se o arquivo não existir, retorna 404
        if (!file_exists(__DIR__ . '/../templates/' . $file . '.php')) {
            $response->getBody()->write("<p>Página não encontrada</p>");
            return $response->withStatus(404);
        }

        // Renderiza conteúdo sem layout (só HTML interno)
        $response->getBody()->write($this->templates->render($file));
        return $response;
    }
}
