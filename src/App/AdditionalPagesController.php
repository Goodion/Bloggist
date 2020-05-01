<?php


namespace src\App;

use src\App\Exception\NotFoundException;
use src\App\PermissionsController as PermissionsController;
use src\Model\AdditionalPage;
use src\Model\Comment;
use src\Model\Post;
use src\Model\User;
use view\View;

class AdditionalPagesController extends AbstractPrivateController
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
        new AdditionalPagesController();

        $currentUser = User::where('login', $_SESSION['login'])->first();
        $_SESSION['id'] = $currentUser->id;

        return new View('users_account', [
            'title' => 'Аккаунт пользователя',
            'user' => $currentUser
        ]);
    }

    public static function adminPanel()
    {
        new AdditionalPagesController(20, 'У вас нет прав для доступа к данной странце');

        if (!isset($_GET['page'])) {
            $_GET['page'] = 'posts';
        }

        return new View('admin_panel', [
            'title' => 'Панель администратора',
            'users' => User::all(),
            'posts' => Post::all(),
            'comments' => Comment::all(),
            'additionalPages' => AdditionalPage::all(),
        ]);
    }

    public static function rulesPage()
    {
        return new View('rules', ['title' => 'Правила сайта']);
    }

    public static function additionalPages()
    {
        $additionalPages = AdditionalPage::all();
        return new View('additional_pages', ['title' => 'Дополнительные страницы', 'additionalPages' => $additionalPages]);
    }

    public static function show($additionalPageLink)
    {
        $additionalPage = AdditionalPage::where('link', $additionalPageLink)->first();
        if (! $additionalPage) {
            throw new NotFoundException('Данная страница не найдена на сервере.');
        }

        return new View('additional_page_template', [
            'title' => $additionalPage->title,
            'link' => $additionalPage->link,
        ]);
    }

    public static function delete($additionalPageLink)
    {
        new AdditionalPagesController(39, 'У вас нет права удалять страницы');

        $additionalPage = AdditionalPage::where('link', $additionalPageLink)->first();
        if (! $additionalPage) {
            throw new NotFoundException('Данная страница не найдена на сервере.');
        }

        unlink(ADDITIONAL_PAGES_DIR . $additionalPage->link . '.php');
        $additionalPage->delete();

        header("Location: http://" . $_SERVER['HTTP_HOST'] . (new Session())->getPreviousPage());
        die();
    }

    public static function publish()
    {
        new AdditionalPagesController(39, 'У вас нет права добавлять страницы');

        if ($_POST['title'] !== '' && $_POST['body'] !== '') {
            $additionalPage = new AdditionalPage();
            $additionalPage->title = $_POST['title'];
            $file = time();
            $additionalPage->link = $file;
            file_put_contents(ADDITIONAL_PAGES_DIR . $file . '.php', $_POST['body'], LOCK_EX);
            $additionalPage->save();
            header("Location: http://" . $_SERVER['HTTP_HOST'] . (new Session())->getPreviousPage());
            die();
        } else {
            throw new \Exception('Не все поля заполнены.');
        }
    }

    public static function patch($additionalPageLink)
    {
        new AdditionalPagesController(39, 'У вас нет права изменять страницы');

        if ($_POST['title'] !== '' && $_POST['body'] !== '') {
            $file = $additionalPageLink;
            file_put_contents(ADDITIONAL_PAGES_DIR . $file . '.php', $_POST['body'], LOCK_EX);
            header("Location: http://" . $_SERVER['HTTP_HOST'] . (new Session())->getPreviousPage());
            die();
        } else {
            throw new \Exception('Не все поля заполнены.');
        }
    }

    public static function edit($additionalPageLink)
    {
        new AdditionalPagesController(39, 'У вас нет права публиковать статьи');

        $additionalPage = AdditionalPage::where('link', $additionalPageLink)->first();
        $body = file_get_contents(ADDITIONAL_PAGES_DIR . $additionalPage->link . '.php');
        if (! $additionalPage) {
            throw new NotFoundException('Данная страница не найдена на сервере.');
        }

        return new View('edit_additional_page', [
            'title' => $additionalPage->title,
            'link' => $additionalPage->link,
            'body' => $body,
        ]);
    }
}