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
        $this->setUriHistory();
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

    public function setUriHistory()
    {
        if (! isset($_SESSION['backurl'])) {
            $_SESSION['backurl'] = [];
            $_SESSION['toggle'] = 0;
        }

        $_SESSION['backurl'][$_SESSION['toggle']] = $_SERVER['REQUEST_URI'];
        $this->counterToggle();
    }

    public function counterToggle()
    {
        $_SESSION['toggle'] = $_SESSION['toggle'] === 1 ? 0 : 1;
    }

    public function getPreviousPage()
    {
        return $_SESSION['backurl'][$_SESSION['toggle']];
    }
}
