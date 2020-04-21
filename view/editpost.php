<div class="container">
    <div class="position-relative overflow-hidden p-3 p-md m-md bg-light">
        <div class="col-md p-lg mx-auto my-5">
            <form class="needs-validation" action="/publish" method="post">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h1>Редактирование статьи: <?=$this->params['post']->title?></h1>
                        <input type="hidden" name="title" value="<?=$this->params['post']->title?>">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="inputArea">Текст</label>
                        <textarea id="inputArea" rows="25" name="body"><?=$this->params['post']->getBody()?></textarea>
                    </div>
                </div>
                <hr class="mb-3">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Сохранить</button>
            </form>
        </div>
    </div>
    <?php if ($this->params['comments']): ?>
        <blockquote class="blockquote text-right">
            <?php foreach ($this->params['comments'] as $comment): ?>
                <p class="mb-0"><?=$comment->text?></p>
                <footer class="blockquote-footer">
                    <cite title="Автор">
                        <?=$this->params['users']->getUserLogin($comment->author)?>
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
