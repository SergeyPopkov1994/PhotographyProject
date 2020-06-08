<!DOCTYPE html>
<html lang="en" class="full-height">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165732234-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-165732234-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="yandex-verification" content="4e5f866237f2556a" />
    <title>Фото-сайт. Главная страница</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link  href="../static/css/main.css" th:href="@{/css/main.css}" rel="stylesheet"/>
    <script type="text/javascript" >
     (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
     m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
     (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

     ym(62596570, "init", {
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true,
          webvisor:true
     });
   </script>
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark indigo">
    <a class="navbar-brand" href="/"><strong>Фото-сайт</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./services.php">Услуги <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./photo.php">Фотографии</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./search.php">Поиск</a>
            </li>
            <?php
              if(empty($_COOKIE['email'])):
            ?>
              <li class="nav-item">
                  <a class="nav-link" href="./login.php">Войти</a>
              </li>
            <?php else: ?>
              <?php if($_COOKIE['role'] == 1):
              ?>
                <li class="nav-item">
                    <a class="nav-link" href="./photographPofile.php">Личный кабинет</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="./clientProfile.php">Личный кабинет</a>
                </li>
              <?php endif;?>
              <li class="nav-item">
                  <a class="nav-link" href="./exit.php">Выйти</a>
              </li>
            <?php endif;?>
        </ul>
    </div>
</nav>

<div id="mySlider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#mySlider" data-slide-to="0" class="active"></li>
        <li data-target="#mySlider" data-slide-to="1"></li>
        <li data-target="#mySlider" data-slide-to="2"></li>
        <li data-target="#mySlider" data-slide-to="3"></li>
        <li data-target="#mySlider" data-slide-to="4"></li>
        <li data-target="#mySlider" data-slide-to="5"></li>
        <li data-target="#mySlider" data-slide-to="6"></li>
        <li data-target="#mySlider" data-slide-to="7"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../static/img/photo1.jpg" alt="1 slide" class="d-block w-100"/>
        </div>
        <div class="carousel-item">
             <img src="../static/img/photo2.jpg" alt="2 slide" class="d-block w-100"/>
        </div>
        <div class="carousel-item">
             <img src="../static/img/photo3.jpg" alt="3 slide" class="d-block w-100"/>
        </div>
        <div class="carousel-item">
             <img src="../static/img/photo4.jpg" alt="4 slide" class="d-block w-100"/>
        </div>
        <div class="carousel-item">
             <img src="../static/img/photo5.jpg" alt="5 slide" class="d-block w-100"/>
        </div>
        <div class="carousel-item">
             <img src="../static/img/photo6.jpg" alt="6 slide" class="d-block w-100"/>
        </div>
        <div class="carousel-item">
             <img src="../static/img/photo7.jpg" alt="7 slide" class="d-block w-100"/>
        </div>
        <div class="carousel-item">
             <img src="../static/img/photo8.jpg" alt="8 slide" class="d-block w-100"/>
        </div>
    </div>
</div>
<footer class="container-fluid">
    <div class="row padding text-center">
        <div class="col-12 social padding">
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-youtube"></i></a>
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-google-plus-g"></i></a>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
