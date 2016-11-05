<!DOCTYPE html>
<!-- saved from url=(0041)http://bootstrap-3.ru/examples/jumbotron/ -->
<html lang="ru">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/1/web-1.ico">
    <title>Tur</title>

    <!-- Bootstrap core CSS -->
    <link href="./Bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Bootstrap/jumbotron.css" rel="stylesheet">
   <!--  <link rel="stylesheet" href="css/jquery.lightbox-0.5.css"> -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/hotel_carusel.css" rel="stylesheet">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/stars.js"></script>
    <script src="js/ajax.js"></script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php $page=(isset($_GET['page']))?$_GET['page']:"1";
    include_once('pages/functions.php');?>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php?page=1"><img src="images/logo.jpg" alt="logo" width="80" height="40"></a>
        </div>
        
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php echo ($page==1)?'class="active"':'';?>><a href="index.php?page=1">Главная</a></li>
            <li <?php echo ($page==2)?'class="active"':'';?>><a href="index.php?page=2">Админ</a></li>
            <li <?php echo ($page==3)?'class="active"':'';?>><a href="index.php?page=3">Отзывы</a></li> 
            <li <?php echo ($page==4)?'class="active"':'';?>><a href="index.php?page=4">Регистрация</a></li> 
          </ul>
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Login" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success" name="vhod">Войти</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div style="height: 50px"></div>
    
    <?php 
    switch ($page) {
        case 1:
          include "pages/tours.php";
          break;
        case 2:
          include "pages/admin.php";
          break;
        case 3:
          include "pages/rewiew.php";
          break;
        case 4:
          include "pages/register.php";
          break;
        case 5:
          include "pages/otel.php";
          break;
        default:
          echo "Страница не найдена";
          break;
      } 
     ?>
    <footer>
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2  col-md-1 col-sm-1 col-xs-0">
            </div>
            <div class="col-lg-2  col-md-3 col-sm-3 col-xs-12">
              <h3>Услуги</h3>
              <ul>
                <li><a href="#">Оформление виз</a></li>
                <li><a href="#">О компании</a></li>
                <li><a href="#">Страхование (тур зарубеж)</a></li>
                <li><a href="#">Страхование (тур по Украине)</a></li>
                <li><a href="#">Подарочные сертификаты</a></li>
              </ul>
            </div>
            <div style="clear:both" class="hide visible-xs"></div>
            <div class="col-lg-2  col-md-3 col-sm-3 col-xs-12">
              <h3> Новости </h3>
              <ul class="list-unstyled footer-nav">
                    <li><a href="#">Единая карта туриста в Украине</a></li>
                    <li><a href="#">Акция «Раннее Бронирование» от «Музенидис Трэвел»</a></li>
                    <li><a href="#">Названы 7 лучших островов для отдыха</a></li>
                    <li><a href="#">Черногория начинает разрабатывать туры для любителей мёда</a></li>
              </ul>
            </div>
            <div class="col-lg-2  col-md-2 col-sm-2 col-xs-12">
              <h3> Поиск </h3>
              <ul>
                <li><a href="#">Поиск туров</a></li>
                <li><a href="#">Отели мира</a></li>
                <li><a href="#">Авиабилеты</a></li>
                <li><a href="#">Круизы</a></li>
              </ul>
            </div>
            <div style="clear:both" class="hide visible-xs"></div>
            <div class="col-lg-2  col-md-3 col-sm-3 col-xs-12 ">
              <h3> КОНТАКТЫ </h3>
              <ul>
                <li>01030 Украина, г. Запорожье,<br>ул. Аррор 40-Б <br>Тел.:+38(061)222-22-22<br>Тел.:+38(061)111-10-10 <br>e-mail: info@tur.ua
                </li>
              </ul>
             
            </div>
          </div>
      </div>
      <p>© Company 2014</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="./Jumbotron Template for Bootstrap_files/jquery.min.js"></script>
    <script src="./Jumbotron Template for Bootstrap_files/bootstrap.min.js"></script> -->
   <!--  <script src="js/jquery-1.11.3.min.js"></script> -->
    <script src="js/jssor.slider-21.1.6.mini.js"></script>
    <script src="js/hotel_carusel.js"></script>
    <script src="js/script.js"></script>
  
  </body>
</html>