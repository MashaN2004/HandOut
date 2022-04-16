<?php
  session_start();
  if(isset($_SESSION['id'])){
    echo $_SESSION['id'];
    $conn = mysqli_connect('127.0.0.1','root','root','lesson31');
    $select = "SELECT * FROM users WHERE id = {$_SESSION['id']}";
    $select2 = "SELECT * FROM posts ";
    $select3 = "SELECT * FROM arciv ";
    $select_query = mysqli_query($conn,$select);
    $select_query2 = mysqli_query($conn,$select2);
    $select_query3 = mysqli_query($conn,$select3);
    $user = mysqli_fetch_assoc($select_query);
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>eNno Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eNno - v4.7.0
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jura:wght@700&display=swap" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" class="logo"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Главная</a></li>
          <li><a class="nav-link scrollto" href="#services">Расписание</a></li>
          <li><a class="nav-link scrollto" href="#contact">Курсы</a></li>
          <li><a class="nav-link scrollto" href="#arc">Архив</a></li>
          <li><a class="nav-link scrollto" href="#footer">Контакты</a></li>
          <li><a class="nav-link scrollto" href="login.php">Выйти</a></li>
          <li><a class="getstarted scrollto" href="portfolio-details.php">Личный кабинет</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">


      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 class="gradient-text">SHARING [K]NOW</h1>
          <h5>Hand Out научит тебя в реальном времени</h5>
          <h1>Hello <?php echo $user['login']?></h1>
          <div class="d-flex">
            <a href="#services" class="btn-get-started scrollto">Записаться</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/home.png" class="img-fluid " alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Расписание</h2>
        </div>

        <div class="row">
          <?
            for ($i=0; $i < mysqli_num_rows($select_query2); $i++) { 
              $post = mysqli_fetch_assoc($select_query2);
          ?>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <img src="<?php echo $post["image"] ?>" class="col-12 rounded" >
              <h4 class="row pt-2 col-12"><a href="post.php?id=<?php echo $post["id"]?>"><?php echo $post["name"] ?></a></h4>
              <div class="row pt-5">
                  <div class="col-7">
                    <p><?php echo $post["time"] ?></p>
                  </div>
                  <div class="justify-content-end col-5">
                    <a href="post.php?id=<?php echo $post["id"]?>" class="btn-get-started scrollto aad">Подробнее</a>
                  </div>
              </div>
            </div>
          </div>
        <?
          }
        ?>
          

          
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Курсы</h2>
        </div>



        <div class="row justify-content-center">

          <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch courses">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <img src="https://i.stack.imgur.com/PaOA2.png" class="col-12 rounded">
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <h4>Иван Иванов</h4>
                  <h1>Основа в Python</h1>
                  <div class="row">
                    <div>
                      <img src="">
                    </div>
                    <div class="">
                      <h4>23 мая 2022</h4>
                    </div>
                  </div>
                  <div class="row">
                    <div>
                      <img src="">
                    </div>
                    <div class="">
                      <h4>23 мая 2022</h4>
                    </div>
                  </div>
                  <div class="pt-3">
                    <h4>Цена  5000 ₽</h4>
                  </div>
                  <div class="pt-3 col-12 row">
                    <div class="col-7">
                      
                    </div>
                    <div class="col-5">
                      <a href="" class="btn-get-started scrollto aad">Подробнее</a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
        <div class="row justify-content-center">

          <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch courses">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <img src="https://i.stack.imgur.com/PaOA2.png" class="col-12 rounded">
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <h4>Иван Иванов</h4>
                  <h1>Основа в C++</h1>
                  <div class="row">
                    <div>
                      <img src="">
                    </div>
                    <div class="">
                      <h4>23 мая 2022</h4>
                    </div>
                  </div>
                  <div class="row">
                    <div>
                      <img src="">
                    </div>
                    <div class="">
                      <h4>23 мая 2022</h4>
                    </div>
                  </div>
                  <div class="pt-3">
                    <h4>Цена  5000 ₽</h4>
                  </div>
                  <div class="pt-3 col-12 row">
                    <div class="col-7">
                      
                    </div>
                    <div class="col-5">
                      <a href="" class="btn-get-started scrollto aad">Подробнее</a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Services Section ======= -->
    <section id="arc" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Архивы курсов</h2>
        </div>

        <div class="row">
          <?
            for ($i=0; $i < mysqli_num_rows($select_query3); $i++) { 
              $arc = mysqli_fetch_assoc($select_query3);
          ?>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <img src="<?php echo $arc["image"] ?>" class="col-12 rounded" >
              <h4 class="row pt-2 col-12"><a href="arc.php?id=<?php echo $arc["id"]?>"><?php echo $arc["name"] ?></a></h4>
              <div class="row pt-5">
                  <div class="col-7">
                    <p><?php echo $arc["time"] ?></p>
                  </div>
                  <div class="justify-content-end col-5">
                    <a href="arc.php?id=<?php echo $arc["id"]?>" class="btn-get-started scrollto aad">Подробнее</a>
                  </div>
              </div>
            </div>
          </div>
        <?
          }
        ?>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row  justify-content-center">
          <div class="col-lg-6">
            <h3>HandOut</h3>
            <p></p>
          </div>
        </div>

        <div class="row footer-newsletter justify-content-center">
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>

        <div class="social-links">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>

      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>eNno</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/enno-free-simple-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php
  }else{
?>
  <a href="signup.php" >Регистрация</a>
  <a href="login.php">Войти</a>
<?php
  }
?>