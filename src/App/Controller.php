<?php

namespace src\App;

use \src\Model\User as User,
    \src\App\Session as Session;


class Controller
{
    protected static function checkPermissions($permissions)
    {
        if (! isset($_SESSION['permissions']) || $_SESSION['permissions'] < $permissions) {
            throw new \Exception('У Вас нет доступа к данной странице.');
        }
    }

    public static function authenticate()
    {
        if (isset($_POST['login']) && isset($_POST['password']) && $_POST['login'] !== '' && $_POST['password'] !== '') {

            $user = new User();

            if ($user->checkLoginExists($_POST['login'])) {
                $user->setLogin($_POST['login']);

                if ($user->checkPasswordCorrect($_POST['password'])) {
                    $user->setPermissions();
                    $session = new Session;
                    $session->sessionStart($user);
                    if (isset($_POST['remember_me'])) {
                        $session->addUserCookie();
                    }
                    header('Location: /');
                } else {
                    throw new \Exception('Неправильный пароль.');
                }

            } else {
                throw new \Exception('Пользователя с таким логином не существует.');
            }

        } else {
            throw new \Exception('Не все поля заполнены.');
        }
    }

    public static function logout()
    {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        setcookie('currentUser', '', time() - 42000, '/');
        header('Location: /');
    }

    public static function register()
    {
        if ($_POST['login'] !== '' && $_POST['email'] !== '' && $_POST['password'] !== '' && $_POST['password_confirm'] !== '' && isset($_POST['rules_confirm'])) {
            if ($_POST['password'] === $_POST['password_confirm']) {
                $user = new User();
                if ($user->emailValidate($_POST['email'])) {
                    if (! $user->checkLoginExists($_POST['login']) && ! $user->checkEmailExists($_POST['email'])) {
                        $user->setLogin($_POST['login']);
                        $user->setEmail($_POST['email']);
                        $user->setPassword($_POST['password']);
                        $user->subscribed = isset($_POST['subscribe']) ? 1 : 0;
                        $user->insert([
                            'login' => $user->login,
                            'email' => $user->email,
                            'password' => $user->password,
                            'subscribed' => $user->subscribed,
                        ]);
                        self::authenticate();
                    } else {
                        throw new \Exception('Логин или email заняты.');
                    }
                } else {
                    throw new \Exception('Email введён неверно.');
                }
            } else {
                throw new \Exception('Пароли не совпадают.');
            }
        } else {
            throw new \Exception('Не все поля заполнены.');
        }
    }

    public static function updateProfile()
    {
        self::checkPermissions(1);

        $currentUser = User::where('login', $_SESSION['login']);
        $user = new User();

        if ($_POST['newEmail'] !== '') {
            if (! $user->checkEmailExists($_POST['newEmail'])) {
                if ($user->emailValidate($_POST['newEmail'])) {
                    $user->setEmail($_POST['newEmail']);
                    $currentUser->update(['email' => $user->getEmail()]);
                } else {
                    throw new \Exception('Email введён неверно.');
                }
            } else {
                throw new \Exception('Email занят.');
            }
        }

        if ($_POST['userNote'] !== '') {
            $user->setNote($_POST['userNote']);
            $currentUser->update(['note' => $user->getNote()]);
        }

        if (isset($_POST['subscribeToggle'])) {
            $subscribed = $currentUser->value('subscribed') === 0 ? 1 : 0;
            $currentUser->update(['subscribed' => $subscribed]);
        }

        if ($_FILES['avatarUpload']['name'] !== '') {
            $file = $_FILES['avatarUpload'];
            $tooLargeFileError = NULL;
            if (mb_substr(mime_content_type($file['tmp_name']), 0 , 5) === 'image') {
                if ($file['size'] <= 2097152) {
                    if (move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $file['name'])) {
                        $user->setAvatarUri($file['name']);
                        $currentUser->update(['avatarUri' => $user->getAvatarUri()]);
                    } else {
                        throw new \Exception('Ошибка загрузки файла.');
                    }
                } else {
                    throw new \Exception('Файл слишком большой.');
                }
            } else {
                throw new \Exception('Передано не изображение.');
            }

        }

       header('Location: /account');
    }

    public static function subscribe()
    {
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            $currentUser = User::where('login', $_SESSION['login']);
            $currentUser->update(['subscribed' => 1]);
            header('Location: /');
        } else if ($_POST['email'] !== '') {
            $user = new User();
            if (! $user->checkEmailExists($_POST['email'])) {
                if ($user->emailValidate($_POST['email'])) {
                    $user->setEmail($_POST['email']);
                    $random = rand(10000000000, 100000000000);
                    $user->insert([
                        'login' => $random,
                        'password' => '',
                        'note' => '',
                        'email' => $user->getEmail(),
                        'subscribed' => 1,
                    ]);
                } else {
                    throw new \Exception('Email введён некорректно.');
                }
            } else {
                throw new \Exception('Email уже есть в списке рассылки.');
            }
        } else {
            throw new \Exception('Не введён email.');
        }
        header('Location: /');
    }
}
