<div class="container">
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md px-0">
            <h1 class="display-4 font-italic">Пробный блог</h1>
            <p class="lead my-3">Какое-то описание...</p>
        </div>
    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    From the Firehose
                </h3>

                <div>
                    <?foreach ($this->params['currentPagePosts'] as $post): ?>
                        <div class="blog-post">
                            <div class="container">
                            <?php if ($post->pic): ?>
                                <div class="col-2 float-left border border-primary mr-3">
                                    <img class="img-thumbnail rounded mx-auto d-block" src="/upload/<?=$post->pic?>">
                                </div>
                            <? endif; ?>
                                <div>
                                    <h2 class="blog-post-title"><a href="/post/<?=$post->id?>"><?=$post->title?></a></h2>
                                </div>
                            </div>
                            <p class="blog-post-meta"><?=$post->created_at?> by <a href="#">SaltyDuck</a></p>
                            <?=htmlspecialchars_decode($post->body)?>
                        </div>
                    <?endforeach;?>
                </div>

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary <?=$this->params['followingPaginationClass']?>" href="/?page=<?=$this->params['followingPosts']?>">Следующие статьи</a>
                    <a class="btn btn-outline-primary <?=$this->params['previousPaginationClass']?>" href="/?page=<?=$this->params['previousPosts']?>" tabindex="-1">Предыдущие статьи</a>
                </nav>

            </div><!-- /.blog-main -->

        </div><!-- /.row -->

    </main><!-- /.container -->

</div>