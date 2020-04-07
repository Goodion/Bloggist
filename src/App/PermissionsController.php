<?php


namespace src\App;


abstract class PermissionsController
{
    public static function checkPermissions($permissions)
    {
        if (! isset($_SESSION['permissions']) || $_SESSION['permissions'] < $permissions) {
            throw new \Exception('У Вас нет доступа к данной странице.');
        }

        return true;
    }
}