<?php
session_start();//Cette instruction démarre une nouvelle session ou reprend une session existante pour cet utilisateur.
include "nbProduit.php"; //Création d'un fichier a part pour cette function, en la mettant dans db-function ca bug
?>

<!DOCTYPE html>
<html lang="fr"> 
  <head>
    <title>Panier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images\favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CPT+Serif:400,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Chargement du panier</p>
      </div>
    </div>
    <div class="page">

      <header class="section page-header">
     
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
             
                <div class="rd-navbar-panel"> 
                
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                 
                  <div class="rd-navbar-brand"></div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                   
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Home</a>
                      </li>
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="recap.php">Panier</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#">Contacts</a>
                      </li>
                    <!-- </ul><a class="button button-white button-sm" href="#">book now</a> -->
                  </div>
                </div><a class="button button-white button-sm" href="#">Panier</a>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section class="parallax-container overlay-1" data-parallax-img="images/panierbio.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">Panier</h2>
                <ul class="breadcrumbs-custom-path">
                  <li><a href="index.php">Home</a></li>
                  <li class="active">Panier</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-lg bg-white text-center">
        <div class="container">
          <?php

          if (isset($_SESSION["products"])) {
              $panier_count = count($_SESSION["products"]);

              echo "&nbsp Articles : " . $panier_count;
          } else {
              echo "&nbsp Article : 0";
          }
          ?>
      </div>
  </ul>
</nav>

<?php
// Soit clé "produits" du tab de session n'existe pas : !isset()
if (!isset($_SESSION["products"]) || empty($_SESSION["products"])) { // soit cette clé existe mais est vide : empty()
 
  echo "<p> Aucun produit en session ... </p>";
  // unset($_SESSION['message']);
} else {
  echo "<table>",
      "<thead>",
      "<tr>",
      // "<th>#</th>",
      "<th>Nom</th>",
      "<th>Prix</th>",
      "<th>Quantité</th>",
      "<th>Total</th>",
      "</tr>",
      "</thead>",
      "<tbody>";

  $totalGeneral = 0;

  foreach ($_SESSION["products"] as $index => $produit) {
      echo "<tr>",
          // "<td>" . $index . "</td>",
          "<td style='font-size:25px'>" . ucfirst($produit["name"])  . "</td>", // ucFirst() pour mettre la première lettre en maj
          "<td>" . number_format($produit["price"], 2, ",", "") . " €</td>",
          "<td><a href='traitement.php?action=lowerQtt&id=$index'>&nbsp - &nbsp &nbsp </a>" . $produit["qtt"] . "<a class='red' href='traitement.php?action=addQtt&id=$index'>&nbsp &nbsp + &nbsp &nbsp </a>" . "<a href='traitement.php?action=" . $index . "'></a></td>",
          "<td>" . number_format($produit["total"], 2, ",", "") . " € </a>" . "<a href='traitement.php?action=deleteProduct&id=" . $index . "'> <img src='img\poubelle.png' alt=''/> </a></td>",
          "</tr>";
      $totalGeneral += $produit["total"];
  }
  echo "<tr>",
      "<td colspan=3>Total général : </td>",
      "<td><strong>" . number_format($totalGeneral, 2, "," , "") . " €</strong></td>",
      "<tr>",
      "</tbody>",
      "</table>";
}
if (isset($_SESSION['messageError'])) { //Vérifie si une variable "messageError" est définie dans la session actuelle.
  echo $_SESSION['messageError']; //Affiche la valeur de la variable "messageError" si elle est définie.
  unset($_SESSION['messageError']);//Supprime la variable "messageError" de la session actuelle.
} 
?>
<a class="panier-input2" href="traitement.php?action=deletePanier">Supprimer le panier</a>

        </div>
      </section>
    
      <section class="section section-lg bg-gray-1 text-center">
        <div class="container">
          <h2>Achats similaires</h2>
          <div class="row row-30">
            <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/bell-peppers-499068_960_720.jpg" alt="" width="270" height="119"/></a></div>
            <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/zucchini-1630518_960_720.jpg" alt="" width="270" height="119"/></a></div>
            <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/red-onions-vegetables-499066_960_720.jpg" alt="" width="270" height="119"/></a></div>
            <div class="col-6 col-md-3"><a class="clients-default" href="#"><img src="images/carrots-1508847_960_720.jpg" alt="" width="270" height="119"/></a></div>
          </div>
        </div>
      </section>

      <section class="section section-lg bg-gray-1">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-6 pr-xl-5"><img src="images/salad-2756467_960_720(1).jpg" alt="" width="518" height="434"/>
            </div>
            <div class="col-lg-6">
              <h2>Nos valeurs</h2>
              <div class="text-with-divider">
                <div class="divider"></div>
                <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas exercitationem deleniti.</h4>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur</p>
            </div>
          </div>
        </div>
      </section>

      <footer class="section footer-minimal context-dark">
        <div class="container wow-outer">
          <div class="wow fadeIn">
            <div class="row row-60">
              <div class="col-12">
                <ul class="footer-minimal-nav">
                  <li><a href="#">Menu</a></li>
                  <li><a href="#">Blog</a></li>
                  <li><a href="contacts.html">Contacts</a></li>
                  <li><a href="#">Gallery</a></li>
                  <li><a href="about-us.html">About</a></li>
                </ul>
              </div>
              <div class="col-12">
                <ul class="social-list">
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook" href="#"></a></li>
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram" href="#"></a></li>
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-twitter" href="#"></a></li>
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-youtube-play" href="#"></a></li>
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-pinterest-p" href="#"></a></li>
                </ul>
              </div>
            </div>
            <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>Le Havre Vert</span><span>.&nbsp;</span><span>All Rights Reserved.</span><span>&nbsp;</span><a href="#">Privacy Policy</a>.</p>
          </div>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>