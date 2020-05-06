<?php
//include "php/database.php";
//include "login.php";
  //$dbc = mysqli_connect('localhost', 'mysql', 'mysql', 'db_photography');
  $cleardb_url      = "CLEARDB_DATABASE_URL";
  $cleardb_server   = "eu-cdbr-west-03.cleardb.net";
  $cleardb_username = "b12e62a1768d64";
  $cleardb_password = "81f3508e";
  $cleardb_db       = "heroku_e40b1a96c2d350f";

  $dbc = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
  $result = mysqli_query($dbc, "SELECT * from `users` where role = 1");




  // if(isset($_POST['sendOrder'])) {
  //   $firstNameForOrder = filter_var(trim($_POST['$firstNameForOrder']),FILTER_SANITIZE_STRING);
  //   $secondNameForOrder = filter_var(trim($_POST['$secondNameForOrder']),FILTER_SANITIZE_STRING);
  //   $email = filter_var(trim($_POST['emailForOrder']),FILTER_SANITIZE_STRING);
  //   if(!empty($email)) {
  //     $query = "INSERT INTO orders ()";
  //     $data = mysqli_query($dbc, $query);
  //   } else {
  //     echo "Заполните все поля для оформления заказа";
  //   }
  // }

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
    <title>Фото-сайт. Услуги</title>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">
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
<body style="background: url(../static/img/photo3.jpg) no-repeat; -moz-background-size: 100%;
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


<div class="container-fluid">
    <div class="row">
      <?php
      while($user = mysqli_fetch_assoc($result)) {
        $avatar = base64_encode($user['avatar']);
        $user_id = $user['user_id'];
        //echo $user_id;
      ?>
        <div class="col-md-3" style="margin-top: 100px;">
            <div class="card mb-4 box-shadow">
              <?php if(empty($avatar)):
              ?>
                <img class="card-img-top" src="../static/img/unnamed.jpg" alt="Avatar" style="height: 225px; width: 100%; display: block; margin: 0; overflow: hidden;">
              <?else: ?>
                <img class="card-img-top" src="data:image/jpeg;base64, <?php echo $avatar ?>" alt="Avatar" style="height: 225px; width: 100%; display: block; margin: 0; overflow: hidden;">
              <?php endif;?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h5><?php echo $user['first_name']; echo " "; echo $user['second_name']?></h5>
                        </div>
                        <?php
                          if(!empty($_COOKIE['email'])):
                        ?>
                        <div class="col-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-thumbs-up"></i></button>
                        </div>
                        <div class="col-2">
                          <h8><?php echo $user['count_likes']?></h8>
                        </div>
                        <?php endif;?>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <!-- <script>
                          function myFunction(){
                          let id = document.getElementById("myinput").value;

                          }
                          </script> -->
                        <!--  <form action="portfolio.php" method="POST" name="">-->
                          <input type="hidden" value="<?php echo "id_"; echo $user_id; ?>" id="myinput">
                          <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modalPortfolio" name="mybutton">
                              Портфолио
                          </button>
                        <!--  </form>-->



                          <div class="modal fade" id="modalPortfolio" tabindex="-1" role="dialog" aria-labelledby="modalPortfolio" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="portfolio">Портфолио</h5>

                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="container">
                                    <div class="row">
                                      <?php
                                        //mysqli_close($dbc);
                                        //$photograph_id = $_POST['photographId'];
                                        //echo $photograph_id;
                                        //$dbc = mysqli_connect('localhost', 'mysql', 'mysql', 'db_photography');
                                        //$resultPortfolio = $dbc->query("SELECT * FROM `portfolio` WHERE photograph_id = '$user_id' ORDER BY id");
                                        $resultPortfolio = $dbc->query("SELECT * FROM `portfolio` ORDER BY photograph_id");
                                        //while($row = $resultPortfolio->fetch_assoc()) {
                                        if(!empty($resultPortfolio)) {
                                          while($row = $resultPortfolio->fetch_assoc()) {
                                           $show_photo = base64_encode($row['photo']);
                                           ?>
                                           <div class="col-lg-3 col-md-4 col-6 thumb">
                                               <a data-fancybox="gallery" href="data:image/jpeg;base64, <?php echo $show_photo ?>">
                                                   <img class="img-fluid" src="data:image/jpeg;base64, <?php echo $show_photo ?>" alt="">
                                               </a>
                                           </div>
                                     <?php
                                          }
                                        }
                                     ?>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modalOrder">
                              Заказать
                          </button>
                          <div class="modal fade" id="modalOrder" tabindex="-1" role="dialog" aria-labelledby="ModalRegistrationOrder" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="ModalRegistrationOrder">Оформление заказа</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name" name="firstNameForOrder" value="<?php echo $_COOKIE['first_name']?>">
                                  <br>
                                  <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name" name="secondNameForOrder" value="<?php echo $_COOKIE['second_name']?>">
                                  <br>
                                  <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="emailForOrder" value="<?php echo $_COOKIE['email']?>">
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Комментарии к заказу</label>
                                    <textarea class="form-control" id="CommentForOrder" rows="3" name="CommentForOrder"></textarea>
                                  </div>
                                  <br>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                  <button type="button" class="btn btn-primary" name="sendOrder">Отправить заказ</button>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</body>
</html>
