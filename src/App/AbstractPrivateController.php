<?php


namespace src\App;


use src\App\PermissionsController as PermissionsController;

abstract class AbstractPrivateController
{
    public function __construct(int $permissions = 1, $message = 'У вас нет правд для выполнения данного действия')
    {
        if (PermissionsController::checkPermissions($permissions) == false) {
            throw new \Exception($message);
        }
    }
}