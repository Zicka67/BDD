<?php
session_start(); //Cette instruction démarre une nouvelle session ou reprend une session existante pour cet utilisateur.
include "nbProduit.php"; //Cette ligne inclut le fichier functions.php dans le code actuel.
require_once('db-functions.php');//Cette ligne inclut le fichier db-functions.php dans le code actuel, mais qu'une seule fois.
?>

<!DOCTYPE html>
<html lang="fr"> 
<head>
  <title>Le Havre Vert</title>
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

 <!-- <?php spl_autoload_register(function ($class_name) {
                require_once $class_name . '.php';
              });
              ?>  -->

  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Les fruits et légumes arrivent ...</p>
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
             
                <div class="rd-navbar-brand"><a href="index.php"></a></div>
              </div>
              <div class="rd-navbar-main-element">
                <div class="rd-navbar-nav-wrap">
           
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index.php">Home</a>
                    </li>
             
                    <li class="rd-nav-item"><a class="rd-nav-link" href="recap.php">Panier</a> 
                    </li>
              
                    <li class="rd-nav-item"><a class="rd-nav-link" href="#">bio</a>
                    </li>
               
                    <li class="rd-nav-item"><a class="rd-nav-link" href="#">Contacts</a>
                    </li>
                  </ul><a class="button button-white button-sm" href="recap.php">Panier</a>
                </div>
              </div>
              <!-- Ajouter une icone pour le panier -->
              <a class="button button-white button-sm" href="recap.php">Panier -  
                <?php
                 if (isset($_SESSION["products"])) {
                     $panier_count = count($_SESSION["products"]);
                 
                     echo "&nbsp Articles : " . $panier_count;
                 } else {
                     echo "&nbsp Article : 0";
                 }
                 ?>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <section class="section section-lg section-main-bunner section-main-bunner-filter text-center">
      <div class="main-bunner-img" style="background-image: url(&quot;images/panierbio.jpg&quot;); background-size: cover;"></div>
      <div class="main-bunner-inner">
        <div class="container">
          <div class="box-default">
            <h1 class="box-default-title">Le Havre Vert</h1>
            <div class="box-default-decor"></div>
            <p class="big box-default-text">Venez récupérer votre panier de légumes et fruits traités naturellement et cueillis à la main.</p>
          </div>
        </div>
      </div>
    </section>
    <div class="bg-gray-1">
      <section class="section-transform-top">
        <div class="container">
          <div class="box-booking">
            <form class="rd-form rd-mailform booking-form">
              <div>
                <p class="booking-title">Name</p>
                <div class="form-wrap">
                  <input class="form-input" id="booking-name" type="text" name="name" data-constraints="@Required">
                  <label class="form-label" for="booking-name">Your name</label>
                </div>
              </div>
              <div>
                <p class="booking-title">Phone</p>
                <div class="form-wrap">
                  <input class="form-input" id="booking-phone" type="text" name="phone" data-constraints="@Numeric">
                  <label class="form-label" for="booking-phone">Your phone number</label>
                </div>
              </div>
              <div>
                <p class="booking-title">Date</p>
                <div class="form-wrap form-wrap-icon"><span class="icon mdi mdi-calendar-text"></span>
                  <input class="form-input" id="booking-date" type="text" name="date" data-constraints="@Required" data-time-picker="date">
                </div>
              </div>
              <div>
                <p class="booking-title">no. of people</p>
                <div class="form-wrap">
                  <select data-placeholder="2">
                    <option label="placeholder"></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                  </select>
                </div>
              </div>
              <div>
                <button class="button button-lg button-gray-600" type="submit">Disponibility</button>
              </div>
            </form>
          </div>
        </div>
      </section>
      
    </div>
    
    <section class="section section-lg bg-default">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-9 col-lg-7 wow-outer">
            <div class="wow slideInDown">
              <h2>Produits bio</h2>
              <p class="text-opacity-80">Nos variétés de fruits bio, cueillis à la main et achetable au kilo.</p>
            </div>
          </div>
        </div>


        <!-- <?php
            require_once('db-functions.php');

            

            $db = findAll();
        
            foreach ($db as $produit) {
            ?>
                <article>
                <a href="product.php?id=<?= $produit['id'] ?>">   
                        <div>                         
                            <img src="<?= $produit['photo'] ?>" alt="<?= ucFirst($produit['name']) ?>">
                            <a href="traitement.php?action=addToCart&id=<?= $produit['id'] ?>">
                            </a>
                                <div>
                                    <?= ucFirst($produit['name'])?> 
                        </div>
                    
                    <div>
                            <?= $produit['description']?>
                    </div>
                        <div>
                            <?php //"<?=" va echo id de $produit
                            ?>                       
                            <p><?= $produit['price']; ?> €</p>
                            <a href="traitement.php?action=addToCart&id=<?= $produit['id'] ?>">Acheter</a>
                            
                        </div>
                </article>
            <?php
            }
            ?> -->

            <?php
            //récupération du produit ayant l'id 1
            $bdd = new PDO('mysql:host=localhost;dbname=store_gk', 'root', '');
            $produit = $bdd->query('SELECT * FROM product WHERE id = 1')->fetch();
            ?>

        <div class="row row-20 row-lg-30">
          <div class="col-md-6 col-lg-4 wow-outer">
            <div class="wow fadeInUp">
              <div class="product-featured">
                <div class="product-featured-figure"><img src="<?= $produit['photo'] ?>"/>
                  <div class="product-featured-button"><a class="button button-primary" href="traitement.php?action=addToCart&id=<?= $produit['id'] ?>">Ajouter</a></div>
                </div>
                <div class="product-featured-caption">
                  <h4 class="product-featured-title"><?= ucFirst($produit['name']) ?></h4>
                  <p class="big"><?= $produit['price']; ?>€</p>
                </div>
              </div>
            </div>
          </div>

          <?php
            //récupération du produit ayant l'id 2
            $bdd = new PDO('mysql:host=localhost;dbname=store_gk', 'root', '');
            $produit = $bdd->query('SELECT * FROM product WHERE id = 2')->fetch();
            ?>

          <div class="col-md-6 col-lg-4 wow-outer">
            <div class="wow fadeInUp">
              <div class="product-featured">
                <div class="product-featured-figure"><img src="<?= $produit['photo'] ?>"/>
                  <div class="product-featured-button"><a class="button button-primary" href="traitement.php?action=addToCart&id=<?= $produit['id'] ?>">Ajouter</a></div>
                </div>
                <div class="product-featured-caption">
                  <h4 class="product-featured-title"><?= ucFirst($produit['name']) ?></h4>
                  <p class="big"><?= $produit['price']; ?>€</p>
                </div>
              </div>
            </div>
          </div>

          <?php
            //récupération du produit ayant l'id 3
            $bdd = new PDO('mysql:host=localhost;dbname=store_gk', 'root', '');
            $produit = $bdd->query('SELECT * FROM product WHERE id = 3')->fetch();
            ?>

          <div class="col-md-6 col-lg-4 wow-outer">
            <div class="wow fadeInUp">
              <div class="product-featured">
                <div class="product-featured-figure"><img src="<?= $produit['photo'] ?>"/>
                  <div class="product-featured-button"><a class="button button-primary" href="traitement.php?action=addToCart&id=<?= $produit['id'] ?>">Ajouter</a></div>
                </div>
                <div class="product-featured-caption">
                  <h4 class="product-featured-title"><?= ucFirst($produit['name']) ?></h4>
                  <p class="big"><?= $produit['price']; ?>€</p>
                </div>
              </div>
            </div>
          </div>


         <?php
            //récupération du produit ayant l'id 4
            $bdd = new PDO('mysql:host=localhost;dbname=store_gk', 'root', '');
            $produit = $bdd->query('SELECT * FROM product WHERE id = 4')->fetch();
            ?>

          <div class="col-md-6 col-lg-4 wow-outer">
            <div class="wow fadeInUp">
              <div class="product-featured">
                <div class="product-featured-figure"><img src="<?= $produit['photo'] ?>"/>
                  <div class="product-featured-button"><a class="button button-primary" href="traitement.php?action=addToCart&id=<?= $produit['id'] ?>">Ajouter</a></div>
                </div>
                <div class="product-featured-caption">
                  <h4 class="product-featured-title"><?= ucFirst($produit['name']) ?></h4>
                  <p class="big"><?= $produit['price']; ?>€</p>
                </div>
              </div>
            </div>
          </div>


         <?php
            //récupération du produit ayant l'id 5
            $bdd = new PDO('mysql:host=localhost;dbname=store_gk', 'root', '');
            $produit = $bdd->query('SELECT * FROM product WHERE id = 5')->fetch();
            ?>

          <div class="col-md-6 col-lg-4 wow-outer">
            <div class="wow fadeInUp">
              <div class="product-featured">
                <div class="product-featured-figure"><img src="<?= $produit['photo'] ?>"/>
                  <div class="product-featured-button"><a class="button button-primary" href="traitement.php?action=addToCart&id=<?= $produit['id'] ?>">Ajouter</a></div>
                </div>
                <div class="product-featured-caption">
                  <h4 class="product-featured-title"><?= ucFirst($produit['name']) ?></h4>
                  <p class="big"><?= $produit['price']; ?>€</p>
                </div>
              </div>
            </div>
          </div>

          <?php
            //récupération du produit ayant l'id 6
            $bdd = new PDO('mysql:host=localhost;dbname=store_gk', 'root', '');
            $produit = $bdd->query('SELECT * FROM product WHERE id = 6')->fetch();
            ?>

          <div class="col-md-6 col-lg-4 wow-outer">
            <div class="wow fadeInUp">
              <div class="product-featured">
                <div class="product-featured-figure"><img src="<?= $produit['photo'] ?>"/>
                  <div class="product-featured-button"><a class="button button-primary" href="traitement.php?action=addToCart&id=<?= $produit['id'] ?>">Ajouter</a></div>
                </div>
                <div class="product-featured-caption">
                  <h4 class="product-featured-title"><?= ucFirst($produit['name']) ?></h4>
                  <p class="big"><?= $produit['price']; ?>€</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="row isotope-wrap">
   
        <div class="col-lg-12">
          <div class="isotope" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" data-lg-thumbnail="false">
            <div class="row no-gutters row-condensed">
              <div class="col-12 col-sm-6 col-md-4 isotope-item wow-outer" data-filter="*">
                <div class="wow slideInDown">
                  <div class="gallery-item-classic"><img src="images/gallery-masonry-1-640x429.jpg" alt="" width="640" height="429"/>
                    <div class="gallery-item-classic-caption"><a href="images/gallery-masonry-1-original.jpg" data-lightgallery="item">zoom</a></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 isotope-item wow-outer" data-filter="Category 3">
                <div class="wow slideInDown">
                  <div class="gallery-item-classic"><img src="images/gallery-masonry-2-640x429.jpg" alt="" width="640" height="429"/>
                    <div class="gallery-item-classic-caption"><a href="images/gallery-masonry-2-original.jpg" data-lightgallery="item">zoom</a></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-4 isotope-item wow-outer" data-filter="Category 3">
                <div class="wow slideInDown">
                  <div class="gallery-item-classic"><img src="images/gallery-masonry-3-640x429.jpg" alt="" width="640" height="429"/>
                    <div class="gallery-item-classic-caption"><a href="images/gallery-masonry-3-original.jpg" data-lightgallery="item">zoom</a></div>
                  </div>
                </div>
              </div>
              
            </div>
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
                <li><a href="#">Contacts</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">About</a></li>
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