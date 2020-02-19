<?php

use \src\Model\Post as Post;

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

if ($currentPageValue === 1) {
    $followingPaginationClass = 'disabled';
    $previosPosts = ++$currentPageValue;
    $followingPosts = $currentPageValue;
} else if ($currentPageValue === $pagesQuantity) {
    $previusPaginationClass = 'disabled';
    $previosPosts = $currentPageValue;
    $followingPosts = --$currentPageValue;
} else {
    $previosPosts = $currentPageValue + 1;
    $followingPosts = $currentPageValue - 1;
}

?>

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
                    <?foreach ($currentPagePosts as $post): ?>
                        <div class="blog-post">
                            <h2 class="blog-post-title"><a href="/post/<?=$post->id?>"><?=$post->title?></a></h2>
                            <p class="blog-post-meta"><?=$post->created_at?> by <a href="#">SaltyDuck</a></p>
                            <?=htmlspecialchars_decode($post->body)?>
                        </div>
                    <?endforeach;?>
                </div>

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary <?=$followingPaginationClass?>" href="/?page=<?=$followingPosts?>">Следующие статьи</a>
                    <a class="btn btn-outline-primary <?=$previusPaginationClass?>" href="/?page=<?=$previosPosts?>" tabindex="-1">Предыдущие статьи</a>
                </nav>

            </div><!-- /.blog-main -->

        </div><!-- /.row -->

    </main><!-- /.container -->

</div>