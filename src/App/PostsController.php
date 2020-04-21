<?php

namespace src\App;

use src\App\Exception\NotFoundException;
use src\App\Helpers\PostPageDivider;
use src\App\PermissionsController as PermissionsController;
use src\Model\Comment;
use src\Model\Post;
use src\Model\User;
use view\View;

class PostsController extends Controller
{
    public static function index()
    {
        $posts = Post::all();
        $page = $_GET['page'] ?? 1;

        if ($posts->isNotEmpty()) {
            $postPageDivider = new PostPageDivider();
            $postPageDivider->pageDivide($posts, (int)$page);
        } else {
            throw new \Exception('К сожалению, статей не найдено.');
        }

        return new View('index', [
            'title' => 'Главная',
            'currentPagePosts' => $postPageDivider->currentPagePosts,
            'followingPaginationClass' => $postPageDivider->followingPaginationClass,
            'followingPosts' => $postPageDivider->followingPosts,
            'previousPaginationClass' => $postPageDivider->previousPaginationClass,
            'previousPosts' => $postPageDivider->previousPosts
        ]);
    }

    public static function show($postId)
    {
        $post = Post::where('id', $postId)->first();

        if (! $post) {
            throw new NotFoundException('Данная статья не найдена на сервере.');
        }

        $comments = Comment::all()->where('post_id', $postId)->where('is_moderated', 1);
        $users = new User();

        return new View('readpost', [
            'title' => 'Статья ' . $post->title,
            'post' => $post,
            'comments' => $comments,
            'users' => $users
        ]);
    }

    public static function addPost()
    {
        if (PermissionsController::checkPermissions(20) == false) {
            throw new \Exception('У вас нет права добавлять статьи');
        }

        return new View('addpost', ['title' => 'Добавление статьи']);
    }

    public static function publish()
    {
        if (PermissionsController::checkPermissions(20) == false) {
            throw new \Exception('У вас нет права публиковать статьи');
        }

        if ($_POST['title'] !== '' && $_POST['body'] !== '') {
            $post = new Post();
            $post->title = $post->prepareTitle($_POST['title']);
            $post->body = $post->prepareBody($_POST['body']);
            $post->save();
            header('Location: /');
            die();
        } else {
            throw new \Exception('Не все поля заполнены.');
        }
    }

    public static function edit($postId)
    {
        if (PermissionsController::checkPermissions(39) == false) {
            throw new \Exception('У вас нет права публиковать статьи');
        }

        $post = Post::where('id', $postId)->first();

        if (! $post) {
            throw new NotFoundException('Данная статья не найдена на сервере.');
        }

        $comments = Comment::all()->where('post_id', $postId)->where('is_moderated', 1);
        $users = new User();

        return new View('editpost', [
            'title' => 'Редактирование статьи ' . $post->title,
            'post' => $post,
            'comments' => $comments,
            'users' => $users
        ]);
    }
}
