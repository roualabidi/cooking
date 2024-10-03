<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../app/controllers/UserController.php';

$userController = new UserController(); // Initialiser le contrôleur

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) { // Vérifie si 'action' existe dans $_POST
        if ($_POST['action'] == 'login') {
            $message = $userController->login();
            if (isset($message)) {
                echo "<div class='message'>$message</div>"; // Affiche le message d'erreur si présent
            }
        } elseif ($_POST['action'] == 'signup') {
            $message = $userController->signup();
            if ($message === "Inscription réussie ! Vous pouvez vous connecter.") {
                header("Location: login.php");
                exit();
            }
        } elseif ($_POST['action'] == 'logout') {
            session_start();
            session_destroy();
            header("Location: ../../public/index.php");
            exit();
        }
    } else {
        // Gérer le cas où 'action' n'est pas défini
        echo "<div class='message'>Erreur : Action non spécifiée.</div>";
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cooking - Restaurants Category Bootstrap Responsive Website Template - Home : W3Layouts</title>
    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="../public/assets/css/style-starter.css">
</head>

<body>
    <!-- header -->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.php">
                    Cooking<i class="fas fa-bread-slice ms-1"></i>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../app/views/about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../app/views/classes.php">Recipes</a>
                        </li>
                        <li class="nav-item">
                            <a id="addRecipeBtn" class="nav-link">Chefs</a>
                        </li>
                    </ul>
                      <!-- Modale pour le login -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <!-- Formulaire login inclus ici -->
        <div class="modal-container">
            <div class="form-box effect7">
                <div class="form-header">Welcome!</div>
                <!-- Formulaire de connexion -->
                <!-- Formulaire de connexion -->
<!-- Formulaire de connexion -->
<form id="login-form" action="" method="POST">
    <input type="hidden" name="action" value="login"> <!-- Cela doit être là -->
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit" class="button">Se connecter</button>
    <span class="signup-link">Pas encore de compte ?&nbsp;
        <a href="javascript:void(0);" class="link" id="show-signup">S'inscrire</a>
    </span>
</form>


<!-- Formulaire d'inscription (caché par défaut) -->
<form id="signup-form" action="../public/index.php" method="POST" style="display: none;">
    <input type="hidden" name="action" value="signup">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit" class="button">S'inscrire</button>
    <span class="signup-link">Vous avez déjà un compte ?&nbsp;
        <a href="javascript:void(0);" class="link" id="show-login">Se connecter</a>
    </span>
</form>

            </div>
        </div>
        <script src="../public/assets/js/login.js"></script> <!-- Chemin vers votre JS -->
    </div>
</div>

      
    <script>
        var modal = document.getElementById("loginModal");
        var btn = document.getElementById("addRecipeBtn");
        var span = document.getElementsByClassName("close")[0];
    
        // Afficher la modale au clic du bouton
        btn.onclick = function() {
            modal.style.display = "block";
        }
    
        // Fermer la modale au clic du bouton "close"
        span.onclick = function() {
            modal.style.display = "none";
        }
    
        // Fermer la modale si l'utilisateur clique en dehors de la modale
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
                    <form action="#search" method="GET" class="d-flex search-header ms-lg-2">
                        <input class="form-control" type="search" placeholder="Enter Keyword..." aria-label="Search"
                            required>
                        <button class="btn btn-style" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!-- //header -->

    <!-- banner section -->
    <section class="w3l-main-slider" id="home">
        <div class="banner-content">
            <div id="demo-1"
                data-zs-src='["../public/assets/images/banner1.jpg", "../public/assets/images/banner2.jpg","../public/assets/images/banner3.jpg", "../public/assets/images/banner4.jpg"]'
                data-zs-overlay="dots">
                <div class="demo-inner-content text-center">
                    <div class="container">
                        <div class="banner-info">
                            <h5>Cooking is Easy</h5>
                            <h3 class="mt-2 mb-5">Passion For Cooking</h3>
                            <p>Helping You To Be Chef at Your Own House</p>
                            <a href="../app/views/about.html" class="btn btn-style mt-4">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner section -->

    <!-- about section -->
    <section class="w3l-aboutblock py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <h3 class="title-style">Learn how to cook from your house</h3>
                    <p class="mt-3">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.
                        Mumquam eius modi tempora incidunt ut labore et.</p>
                    <div class="row mt-lg-5 mt-4">
                        <div class="col-sm-6 grids_info">
                            <i class="fas fa-utensils"></i>
                            <div class="detail mt-sm-4 mt-3">
                                <h4>Easy Manual</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 grids_info mt-sm-0 mt-4">
                            <i class="fas fa-bread-slice"></i>
                            <div class="detail mt-sm-4 mt-3">
                                <h4> For Everyone</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 ps-lg-5 mt-lg-0 mt-5">
                    <div class="row align-items-center">
                        <div class="col">
                            <img src="assets/images/about1.jpg" alt="" class="img-fluid radius-image">
                        </div>
                        <div class="col">
                            <img src="assets/images/about2.jpg" alt="" class="img-fluid radius-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //about section -->



    <!-- why section -->
    <section class="w3l-whyblock py-5">
        <div class="pb-lg-5 pb-md-4 pb-2">
            <div class="row align-items-center m-0">
                <div class="col-lg-6 ps-0">
                    <img src="assets/images/about.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 ps-xl-5 ps-lg-4 mt-lg-0 mt-5">
                    <h5 class="sub-title">Our Features</h5>
                    <h3 class="title-style mb-4">Why Choose Us?</h3>
                    <p>Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</p>
                    <div class="two-grids mt-5">
                        <div class="grids_info">
                            <i class="fas fa-trophy"></i>
                            <div class="detail">
                                <h4>We Are Winners of 50 Competitions</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit.</p>
                            </div>
                        </div>
                        <div class="grids_info mt-xl-5 mt-lg-4 mt-5">
                            <i class="fas fa-user-friends"></i>
                            <div class="detail">
                                <h4>27 Professional Chefs-Trainers</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit.</p>
                            </div>
                        </div>
                        <div class="grids_info mt-xl-5 mt-lg-4 mt-5">
                            <i class="fas fa-hourglass-half"></i>
                            <div class="detail">
                                <h4>Guaranteed Fast Employment</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //why section -->

    <!-- team section -->
    



    

    <!-- instagram-feeds -->
    <div class="projects" id="special">
        <div class="projects-grids">
            <div class="istagram-feeds">
                <div class="projects-w3l-grid-info">
                    <a href="#blog"><img src="assets/images/blog-s1.jpg" class="img-fluid" alt="" />
                        <div class="content-overlay"></div>
                        <div class="content-details fadeIn-top">
                            <span class="fab fa-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="projects-w3l-grid-info">
                    <a href="#blog"><img src="assets/images/blog-s2.jpg" class="img-fluid" alt="" />
                        <div class="content-overlay"></div>
                        <div class="content-details fadeIn-top">
                            <span class="fab fa-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="projects-w3l-grid-info">
                    <a href="#blog"><img src="assets/images/blog-s6.jpg" class="img-fluid" alt="" />
                        <div class="content-overlay"></div>
                        <div class="content-details fadeIn-top">
                            <span class="fab fa-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="projects-w3l-grid-info">
                    <a href="#blog"><img src="assets/images/blog-s4.jpg" class="img-fluid" alt="" />
                        <div class="content-overlay"></div>
                        <div class="content-details fadeIn-top">
                            <span class="fab fa-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="projects-w3l-grid-info">
                    <a href="#blog"><img src="assets/images/blog-s5.jpg" class="img-fluid" alt="" />
                        <div class="content-overlay"></div>
                        <div class="content-details fadeIn-top">
                            <span class="fab fa-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="projects-w3l-grid-info">
                    <a href="#blog"><img src="assets/images/blog-s3.jpg" class="img-fluid" alt="" />
                        <div class="content-overlay"></div>
                        <div class="content-details fadeIn-top">
                            <span class="fab fa-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="projects-w3l-grid-info">
                    <a href="#blog"><img src="assets/images/blog-s7.jpg" class="img-fluid" alt="" />
                        <div class="content-overlay"></div>
                        <div class="content-details fadeIn-top">
                            <span class="fab fa-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="projects-w3l-grid-info">
                    <a href="#blog"><img src="assets/images/blog-s8.jpg" class="img-fluid" alt="" />
                        <div class="content-overlay"></div>
                        <div class="content-details fadeIn-top">
                            <span class="fab fa-instagram"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- //instagram-feeds -->
    <!-- footer -->
    <footer class="w3l-footer-16">
        <div class="footer-top-16 py-5">
            <div class="container pt-lg-5 pt-md-4 pt-2 pb-lg-4 pb-2">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <h3>About Us</h3>
                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nerihe re impedit quo
                            minus id qd maxime aceat facere.</p>
                        <div class="columns-2 mt-4">
                            <ul class="social">
                                <li><a href="#facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="#linkedin"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li><a href="#twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="#google"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 column ps-xl-5 mt-sm-0 mt-4">
                        <h3>Quick Link</h3>
                        <ul class="footer-gd-16">
                            <li><a href="../app/views/about.html">About Us</a></li>
                            <li><a href="../app/views/classes.php">Classes</a></li>
                            <li><a href="#support">Support</a></li>
                            <li><a href="#blog">Blog Posts</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-6 column ps-xl-5 pe-lg-0 mt-lg-0 mt-4">
                        <h3>Contact Info</h3>
                        <ul class="footer-contact-list">
                            <li class=""><i class="fas fa-map-marker-alt"></i><span>10001, 5th Avenue,
                                    #32841 block, USA</span></li>
                            <li class="mt-2"><i class="fas fa-phone-alt"></i><span><a href="tel:+12 23456790">+1223
                                        456 790</a></span></li>
                        </ul>
                        <div class="footer-botm mt-3">
                            <h6>Open Hours:</h6>
                            <p class="mt-2"><span>Mon – Sat</span> : 9Am – 6Pm</p>
                            <p> <span>Sunday</span> : CLOSED</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 column mt-lg-0 mt-4 ps-xl-5">
                        <h3>Subscribe</h3>
                        <form action="#" class="subscribe d-flex" method="post">
                            <input type="email" name="email" placeholder="Email Address" required="">
                            <button class="button-style"><span class="fa fa-paper-plane"
                                    aria-hidden="true"></span></button>
                        </form>
                        <p class="mt-4">Subscribe to our mailing list and get updates to your email inbox.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-section text-center py-4">
            <p class="copy-text py-1">&copy; 2022 Cooking. All rights reserved. Design by <a
                    href="https://w3layouts.com/" target="_blank"> W3Layouts</a>
            </p>
        </div>
    </footer>
    <!-- //footer -->

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-level-up-alt" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- //common jquery plugin -->

    <!-- slider-js -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/modernizr-2.6.2.min.js"></script>
    <script src="assets/js/jquery.zoomslider.min.js"></script>
    <!-- //slider-js -->

    <!-- theme switch js (light and dark)-->
    <script src="assets/js/theme-change.js"></script>
    <!-- //theme switch js (light and dark)-->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap -->
    <!-- //Js scripts -->
</body>

</html>