<?php


namespace src\App;


use view\View;

class AdditionalPagesController extends Controller
{
    public static function registrationPage()
    {
        return new View('registration', ['title' => 'Регистрация']);
    }

    public static function authenticationPage()
    {
        return new View('authentication', ['title' => 'Авторизация']);
    }

    public static function account()
    {
        return new View('users_account', ['title' => 'Личный кабинет', 'permissions' => 1]);
    }

    public static function adminPanel()
    {
        return new View('admin_panel', ['title' => 'Панель администратора', 'permissions' => 20]);
    }

    public static function rulesPage()
    {
        return new View('rules', ['title' => 'Правила сайта']);
    }
}