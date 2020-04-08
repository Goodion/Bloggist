<?php

namespace src\App;

use src\App\Exception\NotFoundException;
use src\App\PermissionsController as PermissionsController;
use src\Model\Comment;
use \src\Model\Post as Post;
use src\Model\User;
use view\View;

class PostsController extends Controller
{
    public static function index()
    {
        $posts = Post::all();
        $currentPageValue = 1;

        if ($posts->isNotEmpty()) {
            $postPerPage = 3;
            $postsSortedByDescChunked = $posts->sortByDesc('created_at')->chunk($postPerPage);
            $pagesQuantity = $postsSortedByDescChunked->count();

            if (isset($_GET['page'])) {
                $currentPageValue = intval($_GET['page']);
                if ($currentPageValue <= 0) {
                    $currentPageValue = 1;
                } else if ($currentPageValue > $pagesQuantity) {
                    $currentPageValue = $pagesQuantity;
                }
            }
        } else {
            throw new \Exception('К сожалению, статей не найдено.');
        }

        $currentPagePosts = $postsSortedByDescChunked[$currentPageValue - 1];
        $previousPosts = 0;
        $previousPaginationClass = '';
        $followingPosts = 0;
        $followingPaginationClass = '';


        if ($currentPageValue === 1) {
            $followingPaginationClass = 'disabled';
            $previousPosts = ++$currentPageValue;
            $followingPosts = $currentPageValue;
        } else if ($currentPageValue === $pagesQuantity) {
            $previousPaginationClass = 'disabled';
            $previousPosts = $currentPageValue;
            $followingPosts = --$currentPageValue;
        } else {
            $previousPosts = $currentPageValue + 1;
            $followingPosts = $currentPageValue - 1;
        }

        return new View('index', [
            'title' => 'Главная',
            'currentPagePosts' => $currentPagePosts,
            'followingPaginationClass' => $followingPaginationClass,
            'followingPosts' => $followingPosts,
            'previousPaginationClass' => $previousPaginationClass,
            'previousPosts' => $previousPosts
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
        } else {
            throw new \Exception('Не все поля заполнены.');
        }
    }
}
