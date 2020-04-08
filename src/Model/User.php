<?php

namespace src\Model;
use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
    protected $table = 'users';

    public function setAvatarUri($uri)
    {
        $uri = htmlspecialchars($uri);
        $this->avatarUri = $uri;
    }

    public function setLogin($login)
    {
        $login = trim($login);
        $login = htmlspecialchars($login);
        $this->login = $login;
    }

    public function setEmail($email)
    {
        $email = trim($email);
        $email = htmlspecialchars($email);
        $this->email = $email;
    }

    public function setPermissions()
    {
        $this->permissions = self::where('login', $this->login)->value('permissions');
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getUserLogin($id)
    {
        return $this->where('id', $id)->first()->login;
    }

    public function getGroup()
    {
        if ($this->permissions >= 1 && $this->permissions < 20) {
            return 'Зарегистрирован';
        } else if ($this->permissions >= 20 && $this->permissions < 40) {
            return 'Контент менеджер';
        } else if ($this->permissions >= 40) {
            return 'Администратор';
        } else {
            return 'Не зарегистрирован';
        }
    }

    public function checkLoginExists($login)
    {
        $login = trim($login);
        $login = htmlspecialchars($login);
        return self::all()->contains('login', $login);
    }

    public function checkEmailExists($email)
    {
        $email = trim($email);
        $email = htmlspecialchars($email);
        return self::all()->contains('email', $email);
    }

    public function checkPasswordCorrect($password)
    {
        $pass = self::where('login', $this->login)->value('password');
        return password_verify($password, $pass);
    }

    public function emailValidate($email)
    {
        $email = trim($email);
        $email = htmlspecialchars($email);
        if (preg_match('/[а-яА-ЯёЁ]/', $email)) {
            return false;
        } else if (! strripos($email, '@')) {
            return false;
        } else if (! strripos($email, '.') || strripos($email, '.') < strripos($email, '@')) {
            return false;
        } else {
            return true;
        }
    }

    public function setNote($note)
    {
        $note = trim($note);
        $note = htmlspecialchars($note);
        $this->note = $note;
    }
}
