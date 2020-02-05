<?php

use \src\Model\Post as Post;

if ($_POST['title'] !== '' && $_POST['body'] !== '') {
    $post = new Post();
    $post->setTitle($_POST['title']);
    $post->setBody($_POST['body']);
    $post->insert(
        ['title' => $post->getTitle(), 'body' => $post->getBody()]
    );
} else {
    throw new \Exception('Не все поля заполнены.');
}
