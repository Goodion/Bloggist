<div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>Регистрация</h2>
</div>

<div class="row justify-content-md-center">
    <div class="mb-3">
        <form class="needs-validation" method="post" action="/register">
            <div class="mb-3">
                <label for="login">Логин</label>
                <input type="text" class="form-control" id="login" name="login">
                <div class="invalid-feedback">
                    Логин введён неверно или занят
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <div class="invalid-feedback">
                    Адрес электронной почты введён неверно
                </div>
            </div>

            <div class="mb-3">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="invalid-feedback">
                    Введите корректный пароль
                </div>
            </div>

            <div class="mb-3">
                <label for="password_confirm">Повторите пароль</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                <div class="invalid-feedback">
                    Пароли не совпадают
                </div>
            </div>

            <hr class="mb-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="rules_confirm" name="rules_confirm">
                <label class="custom-control-label" for="rules_confirm">Прочитал и согласен с <a href="#">правилами сайта</a></label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="subscribe" name="subscribe">
                <label class="custom-control-label" for="subscribe">Подписаться на рассылку о выходе новых статей</label>
            </div>
            <hr class="mb-3">

            <button class="btn btn-primary btn-lg btn-block" type="submit">Зарегистрироваться</button>
        </form>
        <div class="pt-2 text-center">
            <a href="/authentication">Авторизация</a>
        </div>
    </div>
</div>

