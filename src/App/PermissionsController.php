<?php

namespace src\App;

use src\App\Exception\NotFoundException;

abstract class PermissionsController
{
    //todo add pagePermisiions, actionPermissions and other permissions
    public static function checkPermissions($permissions)
    {
        if (isset($_SESSION['permissions']) == false || $_SESSION['permissions'] < $permissions) {
            return false;
        }
        return true;
    }
}