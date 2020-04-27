<form method="post" action="/additional-page/patch/<?=$this->params['link'] ?>">
    <div align="center">
        <h2>Страница <?=$this->params['title'] ?></h2>
        <input hidden name="title" value="<?=$this->params['title'] ?>">
        Код страницы:<br />
        <textarea rows="20" cols="100" name="body"><?=$this->params['body'] ?></textarea><br />
        <input type="submit" value="Отправить">
    </div>
</form>
