<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
require_once '../config/config.php'; // Inclusion du fichier de configuration
require_once '../controllers/UserController.php'; // Chemin vers UserController.php

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cooking - Restaurants Category Bootstrap Responsive Website Template - Classes : W3Layouts</title>
    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="../../public/assets/css/style-starter.css">
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
                            <a class="nav-link" aria-current="page" href="../../public/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="classes.html">Recipes</a>
                        </li>
                        <li class="nav-item">
    <form method="POST" action="classes.php">
        <input type="hidden" name="action" value="logout">
        <button type="submit" class="btn btn-link nav-link">Logout</button>
    </form>
</li>
                    </ul>
                    
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

    <!-- inner banner -->
   
    <!-- //inner banner -->

    <!-- courses section -->
    <section class="w3l-courses py-5" id="courses">
    <div class="container py-lg-5 py-md-4 py-2">
        <h5 class="sub-title text-center">Chef</h5>
        <h3 class="title-style text-center">My recipes</h3>
        <div class="row justify-content-center">
            
            <!-- Recipe 1 -->
            <div class="col-lg-4 col-md-6 item mt-5">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <a href="../../app/views/index1.html" class="zoom d-block">
                            <img class="card-img-bottom d-block" src="../../public/assets/images/rec1.png" alt="Card image cap">
                        </a>
                        <div class="post-pos">
                            <a href="edit_recette.php?title=<?php echo urlencode($recipe['titre']); ?>" class="receipe blue">Update</a>
                            <a href="javascript:void(0);" class="receipe yellow ml-2" onclick="deleteRecipe(<?php echo $recipe['id']; ?>)">Delete</a>
                        </div>
                    </div>
                    <div class="card-body course-details">
                        <div class="price-review d-flex justify-content-between mb-1 align-items-center">
                            <ul class="rating-star">
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star-o"></span></li>
                            </ul>
                        </div>
                        <a href="../../app/views/index1.html" class="course-desc">Chicken Curry</a>
                        <div class="course-meta mt-4">
                            <div class="meta-item course-lesson">
                                <span class="fas fa-fire"></span>
                                <span class="meta-value"> 350 kcal</span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recipe 2 -->
            <div class="col-lg-4 col-md-6 item mt-5">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <a href="../../app/views/index2.html" class="zoom d-block">
                            <img class="card-img-bottom d-block" src="../../public/assets/images/rec2.png" alt="Card image cap">
                        </a>
                        <div class="post-pos">
                            <a href="edit_recette.php?title=<?php echo urlencode($recipe['titre']); ?>" class="receipe blue">Update</a>
                            <a href="javascript:void(0);" class="receipe yellow ml-2" onclick="deleteRecipe()">Delete</a>
                        </div>
                    </div>
                    <div class="card-body course-details">
                        <div class="price-review d-flex justify-content-between mb-1 align-items-center">
                            <ul class="rating-star">
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star-o"></span></li>
                            </ul>
                        </div>
                        <a href="../../app/views/index2.html" class="course-desc">Vegetable Soup</a>
                        <div class="course-meta mt-4">
                            <div class="meta-item course-lesson">
                                <span class="fas fa-fire"></span>
                                <span class="meta-value">  150 kcal</span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recipe 3 -->
            <div class="col-lg-4 col-md-6 item mt-5">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <a href="../../app/views/index3.html" class="zoom d-block">
                            <img class="card-img-bottom d-block" src="../../public/assets/images/rec3.png" alt="Card image cap">
                        </a>
                        <div class="post-pos">
                            <a href="edit_recette.php?title=<?php echo urlencode($recipe['titre']); ?>" class="receipe blue">Update</a>
                            <a href="javascript:void(0);" class="receipe yellow ml-2" onclick="deleteRecipe(<?php echo $recipe['id']; ?>)">Delete</a>
                        </div>
                    </div>
                    <div class="card-body course-details">
                        <div class="price-review d-flex justify-content-between mb-1 align-items-center">
                            <ul class="rating-star">
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star-o"></span></li>
                            </ul>
                        </div>
                        <a href="../../app/views/index3.html" class="course-desc">Lasagna</a>
                        <div class="course-meta mt-4">
                            <div class="meta-item course-lesson">
                                <span class="fas fa-fire"></span>
                                <span class="meta-value"> 600 kcal</span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recipe 4 -->
            <div class="col-lg-4 col-md-6 item mt-5">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <a href="../../app/views/index4.html" class="zoom d-block">
                            <img class="card-img-bottom d-block" src="../../public/assets/images/rec4.png" alt="Card image cap">
                        </a>
                        <div class="post-pos">
                            <a href="edit_recette.php?title=<?php echo urlencode($recipe['titre']); ?>" class="receipe blue">Update</a>
                            <a href="javascript:void(0);" class="receipe yellow ml-2" onclick="deleteRecipe(<?php echo $recipe['id']; ?>)">Delete</a>
                        </div>
                    </div>
                    <div class="card-body course-details">
                        <div class="price-review d-flex justify-content-between mb-1 align-items-center">
                            <ul class="rating-star">
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star-o"></span></li>
                            </ul>
                        </div>
                        <a href="../../app/views/index4.html" class="course-desc">Apple Tart</a>
                        <div class="course-meta mt-4">
                            <div class="meta-item course-lesson">
                                <span class="fas fa-fire"></span>
                                <span class="meta-value"> 450 kcal</span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recipe 5 -->
            <div class="col-lg-4 col-md-6 item mt-5">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <a href="../../app/views/index5.html" class="zoom d-block">
                            <img class="card-img-bottom d-block" src="../../public/assets/images/rec5.png" alt="Card image cap">
                        </a>
                        <div class="post-pos">
                            <a href="edit_recette.php?title=<?php echo urlencode($recipe['titre']); ?>" class="receipe blue">Update</a>
                            <a href="javascript:void(0);" class="receipe yellow ml-2" onclick="deleteRecipe(<?php echo $recipe['id']; ?>)">Delete</a>
                        </div>
                    </div>
                    <div class="card-body course-details">
                        <div class="price-review d-flex justify-content-between mb-1 align-items-center">
                            <ul class="rating-star">
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star-o"></span></li>
                            </ul>
                        </div>
                        <a href="../../app/views/index5.html" class="course-desc">tuna rillettes</a>
                        <div class="course-meta mt-4">
                            <div class="meta-item course-lesson">
                                <span class="fas fa-fire"></span>
                                <span class="meta-value"> 250 kcal</span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recipe 6 -->
            <div class="col-lg-4 col-md-6 item mt-5">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <a href="../../app/views/index6.html" class="zoom d-block">
                            <img class="card-img-bottom d-block" src="../../public/assets/images/rec6.png" alt="Card image cap">
                        </a>
                        <div class="post-pos">
                            <a href="edit_recette.php?title=<?php echo urlencode($recipe['titre']); ?>" class="receipe blue">Update</a>
                            <a href="javascript:void(0);" class="receipe yellow ml-2" onclick="deleteRecipe(<?php echo $recipe['id']; ?>)">Delete</a>
                        </div>
                    </div>
                    <div class="card-body course-details">
                        <div class="price-review d-flex justify-content-between mb-1 align-items-center">
                            <ul class="rating-star">
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star"></span></li>
                                <li><span class="fas fa-star-o"></span></li>
                            </ul>
                        </div>
                        <a href="../../app/views/index6.html" class="course-desc">Chocolate Cake</a>
                        <div class="course-meta mt-4">
                            <div class="meta-item course-lesson">
                                <span class="fas fa-fire"></span>
                                <span class="meta-value">  550 kcal</span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

              
<section class="w3l-courses py-5" id="courses">
    <div class="container py-md-5 py-4">
        <div class="row">
            <div class="col-lg-6 col-md-8 title-content py-md-5">
                <button id="addRecipeBtn" class="btn btn-style mt-5">Add a recipe</button>
                
            </div>
        </div>
        </div>
    </div>
</section>

<script>
    // Redirection vers la page pour ajouter une recette
    document.getElementById("addRecipeBtn").addEventListener("click", function() {
        window.location.href = "ajouter_recette.php";
    });

    function updateRecipe(recipeId) {
    window.location.href = `/updateRecipe.php?id=${recipeId}`;
}

function deleteRecipe(recipeId) {
    if (confirm("Are you sure you want to delete this recipe?")) {
        window.location.href = `/deleteRecipe.php?id=${recipeId}`;
    }
}

</script>

    <!-- //about 3grids section -->

   
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
    <script src="../../public/assets/js/jquery-3.3.1.min.js"></script>
    <!-- //common jquery plugin -->

    <!-- theme switch js (light and dark)-->
    <script src="../../public/assets/js/theme-change.js"></script>
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
    <script src="../../public/assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap -->
    <!-- //Js scripts -->
</body>

</html>