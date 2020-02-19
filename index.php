<?php

use \src\App\Controller as Controller,
    \view\View as View,
    \src\App\Application as Application,
    \src\App\Router as Router;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
require_once APP_DIR . '/view/View.php';

$router = new Router();

$router->get('/', function() {
    return new View('index', ['title' => 'Главная']);
});

$router->get('/registration', function() {
    return new View('registration', ['title' => 'Регистрация']);
});

$router->get('/authentication', function() {
    return new View('authentication', ['title' => 'Авторизация']);
});

$router->get('/account', function() {
    return new View('users_account', ['title' => 'Личный кабинет', 'permissions' => 1]);
});

$router->get('/rules', function() {
    return new View('rules', ['title' => 'Правила сайта']);
});

$router->get('/post/*', function($param) {
    return new View('readpost', ['title' => 'Статья ' . $param, 'postId' => $param]);
});

$router->get('/addpost', function() {
    return new View('addpost', ['title' => 'Добавление статьи', 'permissions' => 20]);
});

$router->get('/admin', function() {
    return new View('admin_panel', ['title' => 'Панель администратора', 'permissions' => 20]);
});

$router->post('/subscribe', Controller::class . '@subscribe');
$router->post('/addComment', Controller::class . '@addComment');
$router->post('/publish', Controller::class . '@publish');
$router->post('/register', Controller::class . '@register');
$router->post('/authenticate', Controller::class . '@authenticate');
$router->post('/updateProfile', Controller::class . '@updateProfile');
$router->get('/logout', Controller::class . '@logout');

$application = new Application($router);

$application->initialize();
$application->run();
