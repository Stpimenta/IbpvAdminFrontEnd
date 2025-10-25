
<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use DI\Container;
use App\Services\JWTService;

//create container
$container = new Container();



$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$app = AppFactory::create();

(require __DIR__ . '/../src/routes.php')($app);

$app->run();
