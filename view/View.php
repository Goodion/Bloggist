<?php

namespace view;

use \src\App\Renderable as Renderable;

class View implements Renderable
{
    protected $path;
    protected $file;
    protected $params;
    protected $header;
    protected $footer;

    public function __construct($path, $callback)
    {
        $this->path = str_replace('.', '/', $path);
        $this->file = VIEW_DIR . str_replace('\\', '/', $this->path) . '.php';
        $this->params = $callback;
        $this->header = VIEW_DIR . 'layout/header.php';
        $this->footer = VIEW_DIR . 'layout/footer.php';
    }

    public function render()
    {
        include $this->header;
        include $this->file;
        include $this->footer;
    }
}
