<?php

use \src\App\PermissionsController as PermissionsController;

?>

<div class="container">
    <div class="row">
        <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Администрирование</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <?php if ($_SESSION['permissions'] > 20): ?>
                            <a href="/admin?page=users" class="btn btn-sm btn-outline-secondary">Пользователи</a>
                            <a href="/admin?page=subscribes" class="btn btn-sm btn-outline-secondary">Подписки</a>
                            <a href="/admin?page=settings" class="btn btn-sm btn-outline-secondary">Настройки</a>
                        <?php endif; ?>
                        <a href="/admin?page=posts" class="btn btn-sm btn-outline-secondary">Статьи</a>
                        <a href="/admin?page=comments" class="btn btn-sm btn-outline-secondary">Комментарии</a>
                        <a href="/admin?page=addPages" class="btn btn-sm btn-outline-secondary">Доп.страницы</a>
                    </div>
                </div>
            </div>

            <?php if ($_GET['page'] === 'users' && PermissionsController::checkPermissions(21)): ?>
                <h2>Пользователи</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Создан</th>
                            <th>Изменён</th>
                            <th>Права</th>
                            <th>Аватар</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->params['users'] as $user): ?>
                            <tr>
                                <td><?=$user->id?></td>
                                <td><?=$user->login?></td>
                                <td><?=$user->email?></td>
                                <td><?=$user->created_at?></td>
                                <td><?=$user->updated_at?></td>
                                <td><?=$user->getGroup()?></td>
                                <td>
                                    <?php if ($user->avatarUri !== null): ?>
                                        <img width="50px" class="img-thumbnail rounded mx-auto d-block" src="/upload/<?=$user->avatarUri?>">
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <?php if ($_GET['page'] === 'posts'): ?>
                <h2>Статьи</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Заголовок</th>
                            <th>Создана</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->params['posts'] as $post): ?>
                            <tr>
                                <td><?=$post->id?></td>
                                <td><a href="/post/<?=$post->id?>"><?=$post->title?></a></td>
                                <td><?=$post->created_at?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <?php if ($_GET['page'] === 'subscribes' && PermissionsController::checkPermissions(21)): ?>
                <h2>Подписки</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>login</th>
                            <th>Зарегистрирован</th>
                            <th>Подписан</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->params['users'] as $user): ?>
                            <tr>
                                <td><?=$user->id?></td>
                                <td><?=$user->login?></td>
                                <td>
                                    <?php if ($user->password === ''): ?>
                                        Не зарегистрирован
                                    <?php else: ?>
                                        Зарегистрирован
                                    <?php endif; ?>
                                </td>
                                <td><?=$user->subscribed?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <?php if ($_GET['page'] === 'comments'): ?>
                <h2>Комментарии</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Текст</th>
                            <th>Статья</th>
                            <th>Автор</th>
                            <th>Добавлен</th>
                            <th>Промодерирован</th>
                            <th>Опубликовать</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->params['comments'] as $comment): ?>
                            <tr>
                                <td><?=$comment->text?></td>
                                <td>
                                    <a href="/post/<?=$this->params['posts']->where('id', $comment->post_id)->first()->id?>">
                                        <?=$this->params['posts']->where('id', $comment->post_id)->first()->title?>
                                    </a>
                                </td>
                                <td><?=$this->params['users']->where('id', $comment->author)->first()->login?></td>
                                <td><?=$comment->created_at?></td>
                                <td><?=$comment->is_moderated?></td>
                                <td class="text-center">
                                    <form action="/publish_comment" method="post">
                                        <input type="hidden" name="comment_id" value="<?=$comment->id?>">
                                        <input type="submit" class="btn btn-outline-secondary btn-sm " value="  ">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <?php if ($_GET['page'] === 'addPages'): ?>
            <?php endif; ?>

            <?php if ($_GET['page'] === 'settings' && PermissionsController::checkPermissions(21)): ?>
            <?php endif; ?>

        </main>
    </div>
</div>