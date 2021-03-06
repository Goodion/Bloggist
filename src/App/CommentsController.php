<?php


namespace src\App;

use src\App\PermissionsController as PermissionsController;
use src\Model\Comment as Comment;
use src\Model\User as User;

class CommentsController extends AbstractPrivateController
{
    public static function add()
    {
        new CommentsController();

        if ($_POST['comment'] !== '' && $_POST['postId'] !== '') {
            $currentUser = User::where('login', $_SESSION['login']);
            $comment = new Comment();
            $comment->text = $comment->prepareText($_POST['comment']);
            $comment->author = $currentUser->value('id');
            $comment->post_id = $_POST['postId'];
            $comment->save();
            header('Location: /post/' . $comment->post_id);
            die();
        } else {
            throw new \Exception('Не все поля заполнены.');
        }
    }

    public static function publish()
    {
        new CommentsController(40, 'У вас нет права размещать комментарии');

        if (isset($_POST['comment_id']) && $_POST['comment_id'] !== '') {
            $comment = (new Comment())->where('id', $_POST['comment_id'])->first();
            $comment->is_moderated = 1;
            $comment->save();
            header('Location: /admin?page=comments');
            die();
        }
    }
}