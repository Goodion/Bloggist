<div class="container">
    <h2 align="center">Дополнительные страницы</h2>
    <?php foreach ($this->params['additionalPages'] as $page): ?>
        <div>
            <h3><a href="/additional-pages/<?=$page->link?>"><?=$page->title?></a></h3>
        </div>
    <?php endforeach;?>
</div>
