<?php

use app\controllers\SiteController;
use app\controllers\AuthController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
  'userClass'=>\app\models\User::class,
  'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ],
];


$app  = new Application(dirname(__DIR__), $config);


// п╟я─пЁя┐п╪п╣пҐя┌я▀ пҐп╣ п╦я│п©пЎп╩я▄пЇя┐я▌я┌я│я▐ п╡ п╪п╣я┌пЎпЄп╟я┘ п╨пЎпҐя┌я─пЎп╩п╩п╣я─п╟!!!
$app->router->get('/', [SiteController::class, 'home']);
$app->router->post('/contact', 'contact');

$app->router->post('/contact', [SiteController::class, 'contact']);//5:11:15 - замена и отказ от handleContact
$app->router->get('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/profile', [AuthController::class, 'profile']);

$app->run();

//05:21:11



