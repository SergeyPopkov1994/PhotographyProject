<?php
  //$dbc = mysqli_connect('localhost', 'mysql', 'mysql', 'db_photography');
  $cleardb_url      = "CLEARDB_DATABASE_URL";
  $cleardb_server   = "eu-cdbr-west-03.cleardb.net";
  $cleardb_username = "b12e62a1768d64";
  $cleardb_password = "81f3508e";
  $cleardb_db       = "heroku_e40b1a96c2d350f";

  $dbc = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
  if(isset($_POST['submit'])) {
    $firstName = filter_var(trim($_POST['firstName']),FILTER_SANITIZE_STRING);
    $secondName = filter_var(trim($_POST['secondName']),FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $password_1 = filter_var(trim($_POST['password_1']),FILTER_SANITIZE_STRING);
    $password_2 = filter_var(trim($_POST['password_2']),FILTER_SANITIZE_STRING);
    $roleName = filter_var(trim($_POST['inlineDefaultRadiosExample']),FILTER_SANITIZE_STRING);

    if(!empty($firstName) && !empty($secondName) && !empty($email) && !empty($password_1) && ($password_1 == $password_2)) {
      $query = "SELECT * FROM `users` WHERE email = '$email'";
      $data = mysqli_query($dbc, $query);
      if(mysqli_num_rows($data) == 0) {
        if($roleName == 'Я фотограф') {
          $roleId = 1;
          $query = "INSERT INTO `users` (`first_name`, `second_name`, `email`, `password`, `role`, `count_likes`)
          VALUES ('$firstName', '$secondName', '$email', SHA('$password_1'), '$roleId', 0)";
          mysqli_query($dbc, $query);
        } else {
          $roleId = 0;
          $query = "INSERT INTO `users` (`first_name`, `second_name`, `email`, `password`, `role`)
          VALUES ('$firstName', '$secondName', '$email', SHA('$password_1'), '$roleId')";
          $res = mysqli_query($dbc, $query);
        }
        mysqli_close($dbc);
        header('Location: /login.php');
      } else {
        echo "Пользователь с такими данными уже существует";
      }
    }
  }
?>


<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">
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
    <title>Фото-сайт. Авторизация</title>
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
<body style="background: url(../static/img/photo5.jpg) no-repeat; -moz-background-size: 100%;
-webkit-background-size: 100%; -o-background-size: 100%; background-size: 100%; background-attachment: fixed;">

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

<div class="container">
    <div class="row justify-content-center" style="margin-top: 100px;">
        <div class="col-4">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="text-center border border-light p-5" style="background: radial-gradient(40% 50%, #FAECD5, #CAE4D8);">
                <p class="h4 mb-4">Регистрация</p>
                <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Имя" name="firstName" value="<?php echo $_POST['firstName'];?>">
                <br>
                <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Фамилия" name="secondName" value="<?php echo $_POST['secondName'];?>">
                <br>
                <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email" value="<?php echo $_POST['email'];?>">
                <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Пароль" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password_1">
                <br>
                <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Повторите пароль" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password_2">
                <br>
                <h4>Выберите роль</h4>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample" value="Я фотограф">
                  <label class="custom-control-label" for="defaultInline1">Я фотограф</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample" value="Я клиент">
                  <label class="custom-control-label" for="defaultInline2">Я клиент</label>
                </div>
                <button class="btn btn-info my-4 btn-block" type="submit" name="submit">Зарегистрироваться</button>
            </form>
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
