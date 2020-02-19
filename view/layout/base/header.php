<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Блог - двухколоночный макет блога с пользовательской навигацией, заголовком и содержанием.">

    <title>Блог | Bloggist</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/view/blog.css" rel="stylesheet">
    <link href="/view/signin.css" rel="stylesheet">
    <link href="/view/grid.css" rel="stylesheet">
    <script src="/vendor/tinymce/tinymce/tinymce.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#inputArea',
            language: 'ru',
            language_url: '/src/js/ru.js',
            content_css : '/view/blog.css',
        });
    </script>
</head>
<body>
  <div class="container">
      <header class="blog-header py-3">
          <div class="row flex-nowrap justify-content-between align-items-center">
              <div class="col-4 pt-1">
                  <form action="/subscribe" method="post">

                      <input class="text-muted" href="/subscribe" value="Подписаться" type="submit">
                      <?php if (! isset($_SESSION['login'])): ?>
                          <input type="email" id="email" name="email" placeholder="Введите email">
                      <?php endif; ?>
                  </form>
              </div>
              <div class="col-4 text-center">
                  <a class="blog-header-logo text-dark" href="#">Bloggist SaltyDuck</a>
              </div>
              <div class="col-4 d-flex justify-content-end align-items-center">
                  <?php if (isset($_SESSION['login'])): ?>
                    <a class="btn btn-sm btn-outline-secondary" href="/logout">Выйти</a>
                  <?php else: ?>
                    <a class="btn btn-sm btn-outline-secondary" href="/authentication">Войти</a>
                  <?php endif; ?>
              </div>
          </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
          <nav class="nav d-flex justify-content-between">
              <a class="p-2 text-muted" href="/">Главная</a>
              <a class="p-2 text-muted" href="/rules">Правила сайта</a>
              <?php if (isset($_SESSION['permissions'])): ?>
                <a class="p-2 text-muted" href="/account">Мой аккаунт</a>
                <?php if ($_SESSION['permissions'] >= 20): ?>
                  <a class="p-2 text-muted" href="/addpost">Добавить статью</a>
                  <a class="p-2 text-muted" href="/admin">Панель администратора</a>
                <?php endif; ?>
              <?php else: ?>
                <a class="p-2 text-muted" href="/registration">Регистрация</a>
              <?php endif; ?>
          </nav>
      </div>



  </div>