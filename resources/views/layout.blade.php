<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title')</title>
   <link href="/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="/css/app.css">
</head>
<body>
   <div class="page container-fluid h-100">
      <div class="row h-100">
         <div class="sidebar col col-2 col-md-3 col-lg-2">
            <div class="menu row">
               <a class="my-link" href="/" title="Главная">/<span class="d-none d-md-inline"> Главная</span></a>
               <a class="my-link" href="/task/list" title="Задачи">...<span class="d-none d-md-inline"> Задачи</span></a>
               <a class="my-link" href="/task/new" title="Новая задача">+<span class="d-none d-md-inline"> Новая задача</span></a>
            </div>
         </div>
         <div class="main col col-10 col-md-9 col-lg-10">
            @yield('main_content')
         </div>
      </div>
   </div>
</body>
</html>
