<?php

namespace src\Model;
use Illuminate\Database\Eloquent\Model as Model;

class Comment extends Model
{
    private $text;
    private $author;
    private $postId;

    public function setText($text)
    {
        $text = trim($text);
        $text = htmlspecialchars($text);
        $this->text = $text;
    }

    public function setAuthor($login)
    {
        $this->author = $login;
    }

    public function setPostId($id)
    {
        $this->postId = $id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getPostId()
    {
        return $this->postId;
    }
}