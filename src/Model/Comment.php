<?php

namespace src\Model;
use Illuminate\Database\Eloquent\Model as Model;

class Comment extends Model
{
    public function prepareText($text)
    {
        $text = trim($text);
        $text = htmlspecialchars($text);
        return $text;
    }
}