<?php

namespace src\App\Exception;

use \src\App\Exception\HttpException as HttpException;
use src\App\Renderable;
use src\App\Session;

class NotFoundException extends HttpException implements Renderable
{
    //todo think about other types of exceptions and message generation for them
    public function render()
    {
        $format = '<div class="container">Возникла ошибка: %s</div>';
        $message = sprintf($format, $this->getMessage());
        $_SESSION['message'] = $message;
        if (isset($_SESSION['backurl'])) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . (new Session())->getPreviousPage());
            die();
        }
        header('Location: /');
        die();
    }
}
