<?php


namespace src\App;

use src\App\PermissionsController as PermissionsController;
use src\Model\Comment as Comment;
use src\Model\User as User;

class CommentsController extends Controller
{
    public static function add()
    {
        if (PermissionsController::checkPermissions(1) == false) {
            throw new \Exception('Чтобы оставлять комментарии необходимо зарегистрироваться.');
        }

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
        if (PermissionsController::checkPermissions(40) == false) {
            throw new \Exception('У вас нет права размещать комментарии');
        }

        if (isset($_POST['comment_id']) && $_POST['comment_id'] !== '') {
            $comment = (new Comment())->where('id', $_POST['comment_id'])->first();
            $comment->is_moderated = 1;
            $comment->save();
            header('Location: /admin?page=comments');
            die();
        }
    }
}