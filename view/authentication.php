<div class="container">
    <form class="form-signin" method="post" action="/authenticate">
        <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
        <label for="inputLogin" class="sr-only">Логин</label>
        <input type="login" id="inputLogin" class="form-control" placeholder="Логин" required autofocus name="login">
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required name="password">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me" name="remember_me"> Запомнить меня
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Авторизоваться</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
    </form>
</div>