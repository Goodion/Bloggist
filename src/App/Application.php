<?php

namespace src\App;
use Illuminate\Database\Capsule\Manager as Capsule,
    \src\App\Config as Config,
    \src\App\Session as Session;

class Application
{
    public $router;

    public function __construct($router)
    {
        $this->router = $router;
    }
    
    public function initialize()
    {
        $capsule = new Capsule;
        $config = Config::getInstance();
        $config->get('php_config');
        $capsule->addconnection($config->get('db'));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        $session = new Session;
        $session->sessionRestart();
        $session->placeUserCookie();
    }

    public function renderException(\Exception $e)
    {
        // todo clean if/elses in this class
        if ($e instanceof Renderable) {
            $e->render();
        } else {
            if ($e->getCode() !== 0) {
                $errorCode = $e->getCode();
            } else {
                $errorCode = 500;
            }
            $format = '<div class="container">Возникла ошибка: %s Код ошибки - %d</div>';
            $_SESSION['message'] = sprintf($format, $e->getMessage(), $errorCode);
            header('Location: /');
        }
    }

    public function run()
    {
        try {
            echo $this->router->dispatch();
        } catch (\Exception $e) {
            $this->renderException($e);
        }
    }
}
