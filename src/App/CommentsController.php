<?php


namespace src\App;


use src\Model\Comment as Comment;
use src\Model\User as User;

class CommentsController extends Controller
{
    public static function add()
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

    public static function publish()
    {
        self::checkPermissions(40);

        if (isset($_POST['comment_id']) && $_POST['comment_id'] !== '') {
            $comment = (new Comment())->where('id', $_POST['comment_id'])->first();
            $comment->is_moderated = 1;
            $comment->save();
            header('Location: /admin?page=comments');
        }
    }
}