<?php

namespace src\App\Exception;
use \src\App\Renderable as Renderable,
    \src\App\Exception\HttpException as HttpException;

class NotFoundException extends HttpException implements Renderable
{
    //todo think about other types of exceptions and message generation for them
    public function render()
    {
        $format = '<div class="container">Возникла ошибка: %s Код ошибки - %d</div>';
        $message = sprintf($format, $this->getMessage(), $this->getCode());
        $_SESSION['message'] = $message;
        header('Location: /');
    }
}
