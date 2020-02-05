<?php

namespace src\Model;
use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
    private $login;
    private $email;
    private $subscribed;
    private $permissions;
    private $created;
    private $password;

    protected $table = 'users';

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    public function setSubscribed($subscribed)
    {
        $this->subscribed = $subscribed;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSubscribed()
    {
        return $this->subscribed;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getPasswordHash()
    {
        return $this->password;
    }

    public function checkLoginUnique($login)
    {
        return ! self::all()->contains('login', $login);
    }

    public function checkEmailUnique($email)
    {
        return ! self::all()->contains('email', $email);
    }
}
