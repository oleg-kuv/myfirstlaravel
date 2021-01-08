<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <p class="h5 my-0 me-md-auto fw-normal">КлинингПро</p>
    <nav class="my-2 my-md-0 me-md-3">
        <a class="p-2 text-dark" href="/service">Услуги</a>
        <a class="p-2 text-dark" href="/about">О нас</a>
        <a class="p-2 text-dark" href="/faq">FAQ</a>
        <a class="p-2 text-dark" href="/contacts">Контакты</a>
        <a class="p-2 text-dark" href="/review">Отзывы</a>
    </nav>
    <a class="btn btn-outline-primary" href="/order">Вызов</a>
    </header>
   @yield('main_content')
</body>
</html>
