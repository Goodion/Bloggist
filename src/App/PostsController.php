<?php

namespace src\App;

use \src\Model\User as User,
    \src\App\Session as Session,
    \src\Model\Post as Post,
    \src\Model\Comment as Comment;
use view\View;

class PostsController extends Controller
{
    public static function index()
    {
        return new View('index', ['title' => 'Главная']);
    }

    public static function show($post)
    {
        return new View('readpost', ['title' => 'Статья ' . $post, 'postId' => $post]);
    }

    public static function addPost()
    {
        return new View('addpost', ['title' => 'Добавление статьи', 'permissions' => 20]);
    }

    public static function addComment()
    {
        self::checkPermissions(1);

        if ($_POST['comment'] !== '' && $_POST['postId'] !== '') {
            $currentUser = User::where('login', $_SESSION['login']);

            $comment = new Comment();
            $comment->text = $comment->prepareText($_POST['comment']);
            $comment->author = $currentUser->value('id');
            $comment->post_id = $_POST['postId'];

            $comment->save();
            header('Location: /post/' . $comment->post_id);
        } else {
            throw new \Exception('Не все поля заполнены.');
        }
    }

    public static function publishComment()
    {
        self::checkPermissions(40);

        if (isset($_POST['comment_id']) && $_POST['comment_id'] !== '') {
            $comment = (new Comment())->where('id', $_POST['comment_id'])->first();
            $comment->is_moderated = 1;
            $comment->save();
            header('Location: /admin?page=comments');
        }
    }

    public static function publish()
    {
        self::checkPermissions(20);

        if ($_POST['title'] !== '' && $_POST['body'] !== '') {
            $post = new Post();
            $post->title = $post->prepareTitle($_POST['title']);
            $post->body = $post->prepareBody($_POST['body']);
            $post->save();
            header('Location: /');
        } else {
            throw new \Exception('Не все поля заполнены.');
        }
    }
}
