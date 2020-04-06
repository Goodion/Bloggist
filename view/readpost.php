<?php

use \src\Model\Post as Post,
    \src\Model\Comment as Comment,
    \src\Model\User as User;

$post = Post::where('id', $this->params['postId']);
$comments = Comment::all()->where('post_id', $this->params['postId'])->where('is_moderated', 1);
$user = User::all();

?>

<div class="container">
    <div class="position-relative overflow-hidden p-3 p-md m-md bg-light">
        <div class="col-md p-lg mx-auto my-5">
            <h1 class="display-4 font-weight-normal text-center"><?=$post->value('title')?></h1>
            <p class="blog-post-meta text-right"><?=$post->value('created_at')?></p>
            <p class="lead font-weight-normal"><?=htmlspecialchars_decode($post->value('body'))?></p>
        </div>
    </div>
    <?php if ($comments->isNotEmpty()): ?>
        <blockquote class="blockquote text-right">
            <?php foreach ($comments as $comment): ?>
                <p class="mb-0"><?=$comment->text?></p>
                <footer class="blockquote-footer">
                    <cite title="Автор">
                        <?=User::where('id', $comment->author)->value('login')?>
                    </cite>
                    <span class="small">
                        <?=$comment->created_at?>
                    </span>
                </footer>
            <?php endforeach; ?>
        </blockquote>
    <?php endif; ?>
    <div class="card mb-3 text-center">
        <form method="post" action="/addComment">
            <div class="card-header">
                Добавление комментария
            </div>
            <div class="card-body">
                <input type="text" class="form-control mb-3" id="comment" name="comment">
                <input type="hidden" name="postId" value="<?=$post->value('id')?>">
                <button type="submit" class="btn btn-primary">Опубликовать</button>
            </div>
        </form>
    </div>
</div>
