<?php

namespace src\App\Exception;
use \src\App\Renderable as Renderable,
    \src\App\Exception\HttpException as HttpException;

class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
        $format = '<div class="container">Возникла ошибка: %s Код ошибки - %d</div>';
        echo sprintf($format, $this->getMessage(), $this->getCode());
    }
}
