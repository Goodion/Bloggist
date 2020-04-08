<?php

namespace src\Model;
use Illuminate\Database\Eloquent\Model as Model;

class Post extends Model
{
    protected $table = 'posts';

    public function prepareTitle($title)
    {
        $title = trim($title);
        $title = htmlspecialchars($title);
        return $title;
    }

    public function prepareBody($body)
    {
        $body = trim($body);
        $body = htmlspecialchars($body);
        return $body;
    }

    public function getBody()
    {
        return htmlspecialchars_decode($this->body);
    }
}
