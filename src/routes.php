<?php
use Slim\App;

use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\ErrorController;
use App\Controllers\ProfileController;

use App\Middleware\AuthMiddleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function($app) {
    /*login*/
    $app->get('/', [LoginController::class, 'index']);
    $app->post('/login', [LoginController::class, 'login']);
    $app->get('/logout', [LoginController::class, 'logout']);

    /*dashboard*/
    $app->get('/dashboard', [DashboardController::class, 'index']);
    $app->get('/dashboard/content/{page}', [DashboardController::class, 'content']);

    /*profile*/
    $app->get('/profile', [ProfileController::class,'profile'])
        ->add(new AuthMiddleware());

    /*error screens*/
    $app->get('/access-denied', [ErrorController::class, 'noPermission']);

    $app->any('/{routes:.+}', function (Request $request, Response $response) {
        $errorController = new ErrorController();
        return $errorController->notFound($request, $response);
    });

};