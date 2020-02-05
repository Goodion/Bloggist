<?php

use \src\Model\User as User;

if ($_POST['login'] !== '' && $_POST['password'] !== '' && isset($_POST['remember_me'])) {




    if ($_POST['password'] === $_POST['password_confirm']) {
        $user = new User();

        if ($user->checkLoginUnique($_POST['login']) && $user->checkEmailUnique($_POST['email'])) {
            $user->setLogin($_POST['login']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            isset($_POST['subscribe']) ? $user->setSubscribed(1) : $user->setSubscribed(0);
            $user->insert([
                'login' => $user->getLogin(),
                'email' => $user->getEmail(),
                'password' => $user->getPasswordHash(),
                'subscribed' => $user->getSubscribed(),
            ]);
        } else {
            throw new \Exception('Логин или email заняты.');
        }

    } else {
        throw new \Exception('Пароли не совпадают.');
    }
} else {
    throw new \Exception('Не все поля заполнены.');
}