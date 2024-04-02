<?php
    require_once "conn.php";
    $login="";$pwd="";
    if (isset($_POST['login'])){
        $login=$_POST["login"];
        $pwd=$_POST["password"];
        try{
            $req="SELECT * FROM customers WHERE login='$login'and password='$pwd'";
            $res=$conn->query($req);
            
            if ($data=$res->fetchAll(PDO::FETCH_ASSOC)){

                $_SESSION["connecte"]="1";
                $_SESSION["user"]=$data[0]["id"];
                header('location:espace_visiteur.php');
            
            }
            else
                echo "aucun utilisateur";
                
            }catch (PDOException $e){
            echo "ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine();
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Drool</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area ">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="">
          </a>
          <div class="" id="">
            <div class="User_option">
              <form class="form-inline my-2  mb-3 mb-lg-0">
                <input type="search" placeholder="Search">
                <button class="btn   my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>

            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <ul>
                  <li><a href="index.html">Accueil</a></li>
                  <li><a href="espace_visiteur.php">Espace visiteur</a></li>
                  <li><a href="produits.php">Produits</a></li>
                  <li><a href="about.html">à propos</a></li>
                  <li><a href="contact.html">Contact</a></li>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- contact section -->
  <section class="contact_section layout_padding-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="form_container">
            <div class="heading_container">
              <img src="images/heading-img.png" alt="">
              <h2>
                Request A Call Back
              </h2>
              <p>
                It is a long established fact that a reader will be distracted by the
              </p>
            </div>
            <form action="login.php" method="post">
              <div>
                <input type="text" placeholder="login " name="login"/>
              </div>
              <div>
                <input type="password" placeholder="password" name="password" />
              </div>
              <div class="d-flex ">
                <input type = "submit" value="Sign in"/>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->


  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="info_contact">
            <h5>
              CONTACT INFO
            </h5>
            <div>
              <img src="images/call.png" alt="" />
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <img src="images/mail.png" alt="" />
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_time">
            <h5>
              Opening Hours Shop
            </h5>
            <div>
              <p>
                Monday to friday
              </p>
            </div>
            <div>
              <p>
                07:00 am to 04:00 pm
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="info_social">
            <h5>
              social media
            </h5>
            <div class="social_container">
              <div>
                <a href="">
                  <img src="images/fb.png" alt="" />
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/twitter.png" alt="" />
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/linkedin.png" alt="" />
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/instagram.png" alt="" />
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_form pl-lg-4">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="text" placeholder="Enter Your Email" />
              <button type="submit">
                Subscribe
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <p>
      &copy; 2019 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- end  footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width")
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    }
  </script>

</body>

</html>