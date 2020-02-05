<?php

namespace src\Model;
use Illuminate\Database\Eloquent\Model as Model;

class Post extends Model
{
    private $title;
    private $body;
    private $id;

    protected $table = 'posts';

    public function setTitle($title)
    {
        $title = trim($title);
        $title = htmlspecialchars($title);
        $this->title = $title;
    }

    public function setBody($body)
    {
        $body = trim($body);
        $body = htmlspecialchars($body);
        $this->body = $body;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getBody()
    {
        return $this->body;
    }
}
