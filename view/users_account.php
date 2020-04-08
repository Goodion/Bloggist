<div class="container">
    <h3>Мой аккаунт</h3>
    <form method="post" action="/updateProfile" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-3 themed-grid-col">Логин</div>
            <div class="col-4 themed-grid-col"><?=$this->params['user']->login?></div>
            <div class="col-5 themed-grid-col">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3 themed-grid-col">Email</div>
            <div class="col-4 themed-grid-col"><?=$this->params['user']->email?></div>
            <div class="col-5 themed-grid-col">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Новый email" name="newEmail">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3 themed-grid-col">Дата и время регистрации</div>
            <div class="col-9 themed-grid-col"><?=$this->params['user']->created_at?></div>
        </div>
        <div class="row mb-3">
            <div class="col-3 themed-grid-col">Подписан на рассылку</div>
            <div class="col-4 themed-grid-col">
                <?php if ($this->params['user']->subscribed):?>
                    Подписан
                <?php else: ?>
                    Не подписан
                <?php endif; ?>
            </div>
            <div class="col-5 themed-grid-col">
                <input type="checkbox" id="subscribeToggle" name="subscribeToggle">
                <small>
                    <?php if (! $this->params['user']->subscribed): ?>
                        Подписаться
                    <?php else: ?>
                        Отписаться
                    <?php endif; ?>
                </small>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3 themed-grid-col">Группа</div>
            <div class="col-9 themed-grid-col"><?=$this->params['user']->getGroup()?></div>
        </div>
        <div class="row mb-3">
            <div class="col-3 themed-grid-col">
                <label for="avatarUpload">Загрузка аватара <small>*файл до 2 Мб</small></label>
            </div>
            <?php if ($this->params['user']->avatarUri): ?>
                <div class="col-1">
                    <img class="img-thumbnail rounded mx-auto d-block" src="/upload/<?=$this->params['user']->avatarUri?>">
                </div>
            <? endif; ?>
            <div class="col-8 themed-grid-col">
                <div class="form-group">
                    <input type="file" class="form-control-file" id="avatarUpload" name="avatarUpload" accept=".jpeg,.jpg,.png,.bmp,.gif">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3 themed-grid-col">
                <div class="form-group">
                    <label for="userNote">Оставить заметку о себе</label>
                </div>
            </div>
            <div class="col-9 themed-grid-col">
                <textarea class="form-control" id="userNote" rows="3" name="userNote"><?=$this->params['user']->note?></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 text-center">
                <input class="btn btn-sm btn-outline-secondary" type="submit" value="Сохранить изменения">
            </div>
        </div>
    </form>
</div>