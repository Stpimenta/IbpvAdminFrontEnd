<?php
use Slim\App;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;

return function($app) {
    $app->get('/', [LoginController::class, 'index']);
    $app->post('/login', [LoginController::class, 'login']);
    $app->get('/dashboard', [DashboardController::class, 'index']);
    $app->get('/dashboard/content/{page}', [DashboardController::class, 'content']);
};