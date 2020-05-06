<!DOCTYPE html>
<html lang="en" class="full-height">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Фото-сайт. Услуги</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link  href="../static/css/main.css" th:href="@{/css/main.css}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">
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
    <style>
        .thumb img {
            -webkit-filter: grayscale(0);
            filter: none;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 5px;
        }

        .thumb img:hover {
            -webkit-filter: grayscale(1);
            filter: grayscale(1);
        }

        .thumb {
            padding: 5px;
        }
    </style>
</head>
<body style="background-color: #A52A2A; -moz-background-size: 100%;
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

<br><br><br><br><br><br>

<div class="container">
  <div class="row">
     <div class="col">
        <form action="photographPofile.php" method="POST" enctype="multipart/form-data">
         <p>Добавить аватар</p>
         <input type="file" name="avatarUpload"><br><input type="submit" name="upload_1" value="Загрузить">
         <?php
           if(isset($_POST['upload_1'])) {
             if(!empty($_FILES['avatarUpload']['tmp_name'])) $img = addslashes(file_get_contents($_FILES['avatarUpload']['tmp_name']));
             //$dbc = mysqli_connect('localhost', 'mysql', 'mysql', 'db_photography');
             $cleardb_url      = "CLEARDB_DATABASE_URL";
             $cleardb_server   = "eu-cdbr-west-03.cleardb.net";
             $cleardb_username = "b12e62a1768d64";
             $cleardb_password = "81f3508e";
             $cleardb_db       = "heroku_e40b1a96c2d350f";

             $dbc = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
             $user_id = $_COOKIE['user_id'];
             $dbc->query("UPDATE users set avatar = '$img' WHERE user_id = '$user_id'");
             $dbc->close();
           }
         ?>
       </form>
    </div>
    <div class="col">
      <form action="photographPofile.php" method="POST" enctype="multipart/form-data">
       <p>Загрузить фото в портфолио</p>
       <input type="file" name="photoUpload"><br><input type="submit" name="upload_2" value="Загрузить">
       <?php
         if(isset($_POST['upload_2'])) {
           if(!empty($_FILES['photoUpload']['tmp_name'])) $img = addslashes(file_get_contents($_FILES['photoUpload']['tmp_name']));
           //$dbc = mysqli_connect('localhost', 'mysql', 'mysql', 'db_photography');
           $cleardb_url      = "CLEARDB_DATABASE_URL";
           $cleardb_server   = "eu-cdbr-west-03.cleardb.net";
           $cleardb_username = "b12e62a1768d64";
           $cleardb_password = "81f3508e";
           $cleardb_db       = "heroku_e40b1a96c2d350f";

           $dbc = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
           $user_id = $_COOKIE['user_id'];
           $dbc->query("INSERT INTO `portfolio` (`photograph_id`, `photo`) VALUES ('$user_id','$img')");
           $dbc->close();
         }
       ?>
     </form>
   </div>
  </div>
</div>

<div class="container">
    <h1 class="h3 text-center my-4">Мое портфолио</h1>
    <div class="row">
      <?php
       //$dbc = mysqli_connect('localhost', 'mysql', 'mysql', 'db_photography');
       $cleardb_url      = "CLEARDB_DATABASE_URL";
       $cleardb_server   = "eu-cdbr-west-03.cleardb.net";
       $cleardb_username = "b12e62a1768d64";
       $cleardb_password = "81f3508e";
       $cleardb_db       = "heroku_e40b1a96c2d350f";

       $dbc = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
       $user_id = $_COOKIE['user_id'];
       $result = $dbc->query("SELECT * FROM `portfolio` WHERE photograph_id = '$user_id' ORDER BY id");
       mysqli_close($dbc);
       while($row = $result->fetch_assoc()) {
         $show_photo = base64_encode($row['photo']);
     ?>
         <div class="col-lg-3 col-md-4 col-6 thumb">
             <a data-fancybox="gallery" href="data:image/jpeg;base64, <?php echo $show_photo ?>">
                 <img class="img-fluid" src="data:image/jpeg;base64, <?php echo $show_photo ?>" alt="">
             </a>
         </div>
     <?php
       }
     ?>
    </div>
</div>

<div class="container">
    <h1 class="h3 text-center my-4">Мои заказы</h1>
    <div class="row">

    </div>
</div>

<footer class="container-fluid" style="margin-top: 500px">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script></body>
</html>
