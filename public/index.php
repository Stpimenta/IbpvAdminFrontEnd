
<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use DI\Container;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use App\Services\JWTService;
use App\Services\LogService;

use App\Controllers\LoginController;

//load .env
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

//session
session_start();

//create DI container
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    LogService::class => function () {
        static $instance = null;
        if ($instance === null) {
            $instance = new LogService();
        }
        return $instance;
    },
    LoginController::class => function (ContainerInterface $c) {
        $logger = $c->get(LogService::class);
        return new LoginController($logger);
    }
]);
$container = $containerBuilder->build();



AppFactory::setContainer($container);
$app = AppFactory::create();

(require __DIR__ . '/../src/routes.php')($app);

$app->run();
