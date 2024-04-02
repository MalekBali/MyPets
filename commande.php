<?php
  require_once "conn.php";
  if (isset($_POST['quantite'])){
  $nom=$_POST['nom'];
  $prix=$_POST['prix'];
  $qt=$_POST['quantite'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['adresse'];
  if (empty($email) || empty($phone) || empty($address) || empty($qt)|| empty($nom)|| empty($prix)) {
    echo "You gotta fill in required fields ";
    
  } else { 
    $req = "INSERT INTO commandes (`nomP`, `quantite`, `prix`, `email`, `phone`, `adresse`) VALUES ('$nom', '$qt', '$prix', '$email', '$phone', '$address')";
    $conn->exec($req);
  header('location:produits.php');
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

  <title>DOOL</title>

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
require_once "session.php";
verifier_session();
$nom="";
$prix="";
$login="";
$phone="";
$address="";
if (isset($_GET['id_etd']) && isset($_GET['produit'])) {
$who=$_SESSION['user'];
          $req="SELECT *FROM customers where id ='$who'";
          $res=$conn->query($req);
            
            if ($data=$res->fetchAll(PDO::FETCH_ASSOC)){
                $name=$data[0]["FullName"];
                $login=$data[0]["login"];
                $phone=$data[0]["PhoneNum"];
                $address=$data[0]["address"];
              }
              
                $id_etd = $_GET['id_etd'];
                $tab = $_GET['produit'];

              
                  $req="SELECT * FROM $tab where id='$id_etd'";
                  $res=$conn->query($req);
                  $data=$res->fetchAll(PDO::FETCH_ASSOC);
                  if (count($data)===1){
                    $nom=$data[0]["nom"];
                    $prix=$data[0]["prix"];
                  } }          
  
    // Si l'utilisateur est connecté, affichez le formulaire de commande
    echo"
    <section class='contact_section layout_padding-top'>
      <div class='container-fluid'>
        <div class='row'>
          <div >
            <div class='form_container'>
              <div class='heading_container'>
                <img src='images/heading-img.png'>
                <h2>
                  Commander 
                </h2>
                <p>
                  It is a long established fact that a reader will be distracted by the
                </p>
              </div>";
    echo "<form action='commande.php' method='POST'>";
    echo "<label>Produit: </label> ";
    echo "<input type='text' name='nom' placeholder='Nom Produit' readOnly=true value=".$nom.">";
    echo "<label> Prix unitaire: </label><br>";
    echo "<input type='number' name='prix' placeholder='Prix'readOnly=true value=".$prix.">";
    echo "<label>Quantité</label> <br>";
    echo "<input type='number' name='quantite' placeholder='Quantité' value='1'>";
    echo "<label>Numéro de téléphone</label> <br>";
    echo "<input type='text' name='phone' placeholder='Phone Number'value=".$phone.">"; 
    echo "<label>E-mail</label> <br>";  
    echo "<input type='text' name='email' placeholder='email'value=".$login.">";
    echo "<label>Adresse</label> <br>";
    echo "<input type='text' name='adresse' placeholder='Adresse'value=".$address.">";    
    //echo "<label>Prix Total".$prix*"</label>";

       
    echo "<button type='submit'>Passer la commande</button>";
    echo "</form>";
    echo"</div>
    </div> </div>
    </div>
  </section>";
 
  ?>
  
  

</body>
</html>