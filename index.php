<?php

use src\App\AdditionalPagesController;
use src\App\CommentsController;
use \src\App\Controller as Controller,
    \src\App\Application as Application,
    \src\App\Router as Router;
use src\App\PostsController;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/view/View.php';

$router = new Router();

$router->get('/', PostsController::class . '@index');
$router->get('/post/*', PostsController::class . '@show');
$router->get('/addpost', PostsController::class . '@addpost');
$router->post('/publish', PostsController::class . '@publish');

$router->post('/addComment', CommentsController::class . '@add');
$router->post('/publish_comment', CommentsController::class . '@publish');

$router->get('/registration', AdditionalPagesController::class . '@registrationPage');
$router->get('/authentication', AdditionalPagesController::class . '@authenticationPage');
$router->get('/account', AdditionalPagesController::class . '@account');
$router->get('/rules', AdditionalPagesController::class . '@rulesPage');
$router->get('/admin', AdditionalPagesController::class . '@adminPanel');

$router->post('/subscribe', Controller::class . '@subscribe');
$router->post('/register', Controller::class . '@register');
$router->post('/authenticate', Controller::class . '@authenticate');
$router->post('/updateProfile', Controller::class . '@updateProfile');
$router->get('/logout', Controller::class . '@logout');

$application = new Application($router);

$application->initialize();
$application->run();
