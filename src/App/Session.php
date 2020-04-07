<?php

namespace src\App;
use \src\Model\User as User;

class Session
{

    public function sessionStart(User $user)
    {
        session_destroy();
        session_start();
        setcookie(session_name(), session_id(), time() + 60 * 60 * 24, '/');
        $_SESSION['login'] = $user->login;
        $_SESSION['permissions'] = $user->permissions;
        $_SESSION[session_name()] = session_id();
    }

    public function sessionRestart()
    {
        session_start();
        setcookie(session_name(), session_id(), time() + 60 * 60 * 24, '/');
    }

    public function addUserCookie()
    {
        $_SESSION['userCookie'] = true;
    }

    public function placeUserCookie()
    {
        if (isset($_SESSION['userCookie'])) {
            setcookie('currentUser', $_SESSION['login'], time() + 60 * 60 * 24 * 30, '/');
        }
    }
}
