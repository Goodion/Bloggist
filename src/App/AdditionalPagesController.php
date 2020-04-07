<?php


namespace src\App;


use src\Model\Comment;
use src\Model\Post;
use src\Model\User;
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
        PermissionsController::checkPermissions(1);

        $currentUser = User::where('login', $_SESSION['login'])->first();
        $_SESSION['id'] = $currentUser->id;

        return new View('users_account', [
            'title' => 'Аккаунт пользователя',
            'user' => $currentUser
        ]);
    }

    public static function adminPanel()
    {
        PermissionsController::checkPermissions(20);

        if (!isset($_GET['page'])) {
            $_GET['page'] = 'posts';
        }

        return new View('admin_panel', [
            'title' => 'Панель администратора',
            'users' => User::all(),
            'posts' => Post::all(),
            'comments' => Comment::all(),
        ]);
    }

    public static function rulesPage()
    {
        return new View('rules', ['title' => 'Правила сайта']);
    }
}