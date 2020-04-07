<div class="container">
    <div class="position-relative overflow-hidden p-3 p-md m-md bg-light">
        <div class="col-md p-lg mx-auto my-5">
            <h1 class="display-4 font-weight-normal text-center"><?=$this->params['post']->title?></h1>
            <p class="blog-post-meta text-right"><?=$this->params['post']->created_at?></p>
            <p class="lead font-weight-normal"><?=htmlspecialchars_decode($this->params['post']->body)?></p>
        </div>
    </div>
    <?php if ($this->params['comments']): ?>
        <blockquote class="blockquote text-right">
            <?php foreach ($this->params['comments'] as $comment): ?>
                <p class="mb-0"><?=$comment->text?></p>
                <footer class="blockquote-footer">
                    <cite title="Автор">
                        <?=$this->params['user']->where('id', $comment->author)->first()->login?>
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
                <input type="hidden" name="postId" value="<?=$this->params['post']->id?>">
                <button type="submit" class="btn btn-primary">Опубликовать</button>
            </div>
        </form>
    </div>
</div>
