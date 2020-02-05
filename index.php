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

$router->get('/admin', function() {
    return new View('admin_panel', ['title' => 'Панель администратора']);
});

$router->get('/authentication', function() {
    return new View('authentication', ['title' => 'Авторизация']);
});

$router->get('/registration', function() {
    return new View('registration', ['title' => 'Регистрация']);
});

$router->get('/account', function() {
    return new View('users_account', ['title' => 'Личный кабинет']);
});

$router->get('/post/*', function($param) {
    return new View('readpost', ['title' => 'Статья ' . $param]);
});

$router->get('/addpost', function($param) {
    return new View('addpost', ['title' => 'Добавление статьи']);
});

$router->post('/publish', function() {
    return new View('handle.post_handle', ['title' => 'Публикация статьи']);
});

$router->post('/register', function() {
    return new View('handle.registration_handle', ['title' => 'Регистрация пользователя']);
});

$router->post('/authenticate', function() {
    return new View('handle.authentication_handle', ['title' => 'Авторизация пользователя']);
});

$application = new Application($router);

$application->initialize();
$application->run();
