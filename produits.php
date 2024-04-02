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

  <title>MyPets</title>

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
    

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width")
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    }
  </script>
<?php
  require_once "conn.php";

    // Récupérer les produits de la table "alimentation"
    $sql = "SELECT * FROM alimentation";
    $result = $conn->query($sql);
    $data=$result->fetchAll(PDO::FETCH_ASSOC);
    if (count($data)>=1){
     echo "<section class='food_section layout_padding'>";
      echo"<div class='container'>";
       echo" <div class='heading_container'>";
         echo" <img src='images/heading-img.png' alt=''>";
          echo"<h2>";
echo 'Aliments';
          echo"</h2>";
  
       echo" </div>";

       echo "<div class='food_container'>";
      foreach ($data as $row) {
      echo "<div class='box'>";
      echo"<div class='img-box'>";
      echo "<img src='./images/".$row['photo']."'>";
      echo "</div>";
      echo "<div class='detail-box'>";
      echo "<h6>".$row['nom'].$row['animal']."</h6>";
      echo "<h3> <span>".$row['prix']."</h3> </span>";
      
      
   echo "<a href='commande.php?id_etd=" . $row['id'] . "&produit=alimentation'> Buy Now </a>";
      echo"</div></div>";
      }
      echo "</div>";
    echo "</div>";
    echo"</section>";
  }
  

    // Récupérer les produits de la table "accessoires"
    $sql = "SELECT * FROM accessoires";
$result = $conn->query($sql);
$data = $result->fetchAll(PDO::FETCH_ASSOC);

if (count($data)>=1){
  echo "<section class='food_section layout_padding'>";
   echo"<div class='container'>";
    echo" <div class='heading_container'>";
      echo" <img src='images/heading-img.png' alt=''>";
       echo"<h2>";
echo 'Accessoires';
       echo"</h2>";

    echo" </div>";

    echo "<div class='food_container'>";
   foreach ($data as $row) {
   echo "<div class='box'>";
   echo"<div class='img-box'>";
   echo "<img src='./images/".$row['photo']."'>";
   echo "</div>";
   echo "<div class='detail-box'>";
   echo "<h6>".$row['nom'].$row['animal']."</h6>";
   echo "<h3> <span>".$row['prix']."</h3> </span>";
   
   echo "<a href='commande.php?id_etd=" . $row['id'] . "&produit=accessoires'> Buy Now </a>";

   echo"</div></div>";
   }
   echo "</div>";
 echo "</div>";
 echo"</section>";
}

    

    // Récupérer les produits de la table "medicaments"
    $sql = "SELECT * FROM médicaments";
    $result = $conn->query($sql);
    $data=$result->fetchAll(PDO::FETCH_ASSOC);
    if (count($data)>=1){
      echo "<section class='food_section layout_padding'>";
       echo"<div class='container'>";
        echo" <div class='heading_container'>";
          echo" <img src='images/heading-img.png' alt=''>";
           echo"<h2>";
 echo 'Médicaments';
           echo"</h2>";
   
        echo" </div>";
 
        echo "<div class='food_container'>";
       foreach ($data as $row) {
       echo "<div class='box'>";
       echo"<div class='img-box'>";
       echo "<img src='./images/".$row['photo']."'>";
       echo "</div>";
       echo "<div class='detail-box'>";
       echo "<h6>".$row['nom'].$row['animal']."</h6>";
       echo "<h3> <span>".$row['prix']."</h3> </span>";
       echo "<a href='commande.php?id_etd=" . $row['id'] . "&produit=médicaments'> Buy Now </a>";
       echo"</div></div>";
       }
       echo "</div>";
     echo "</div>";
     echo"</section>";
   }
   

  ?>

</body>
  </html>
