<?php

namespace src\App;
use Illuminate\Database\Capsule\Manager as Capsule,
    \src\App\Config as Config,
    \src\App\Session as Session;

class Application
{
    public $router;
    protected $session;

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
        $this->session = new Session;
        $this->session->sessionRestart();
        $this->session->placeUserCookie();
        $this->session->setUriHistory();
    }

    public function renderException(\Exception $e)
    {
        if ($e instanceof Renderable) {
            $e->render();
        } else {
            if ($e->getCode() !== 0) {
                $errorCode = $e->getCode();
            } else {
                $errorCode = 500;
            }
            $format = '<div class="container">Возникла ошибка: %s</div>';
            $_SESSION['message'] = sprintf($format, $e->getMessage());
            if (isset($_SESSION['backurl'])) {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . $this->session->getPreviousPage());
                die();
            }
            header('Location: /');
            die();
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
