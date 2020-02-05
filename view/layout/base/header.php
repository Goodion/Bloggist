<!doctype html>
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
                  <a class="text-muted" href="#">Подписаться</a>
              </div>
              <div class="col-4 text-center">
                  <a class="blog-header-logo text-dark" href="#">Bloggist SaltyDuck</a>
              </div>
              <div class="col-4 d-flex justify-content-end align-items-center">
                  <a class="text-muted" href="#" aria-label="Search">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                  </a>
                  <a class="btn btn-sm btn-outline-secondary" href="#">Войти</a>
              </div>
          </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
          <nav class="nav d-flex justify-content-between">
              <a class="p-2 text-muted" href="#">Главная</a>
              <a class="p-2 text-muted" href="#">Добавить статью</a>
              <a class="p-2 text-muted" href="#">Регистрация</a>
              <a class="p-2 text-muted" href="#">Статьи</a>
              <a class="p-2 text-muted" href="#">Правила сайта</a>
              <a class="p-2 text-muted" href="#">О Нас</a>
              <a class="p-2 text-muted" href="#">Информация</a>
              <a class="p-2 text-muted" href="#">Котофоты</a>
          </nav>
      </div>

      <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
          <div class="col-md-6 px-0">
              <h1 class="display-4 font-italic">Бложик Лялиус Андреевны Сизовой</h1>
              <p class="lead my-3">Весёлые истории из жизни котов, оценщиков и путешественников...</p>
              <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Подробнее...</a></p>
          </div>
      </div>

  </div>