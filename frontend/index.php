<?php
include 'config/included_functions.php';
$ob_start = ob_start();
$session_start = session_start();
$ob_end_flush = ob_end_flush();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Movies VOD">
        <meta name="keywords" content="movies, films, series, drama,action,war,fear,videos">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Movies.VOD</title>
        <link rel="icon" href="img/web-tab.png">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
        <link href="dist/lity.css" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/flaticon.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/barfiller.css" type="text/css">
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/slider-style.css" type="text/css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#news-slider").owlCarousel({
                    items: 3,
                    itemsDesktop: [1199, 2],
                    itemsDesktopSmall: [980, 2],
                    itemsMobile: [600, 1],
                    pagination: false,
                    navigationText: false,
                    autoPlay: true
                });
            });
        </script>
    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Offcanvas Menu Section Begin -->
        <div class="offcanvas-menu-overlay"></div>
        <div class="offcanvas-menu-wrapper">
            <div class="canvas-close">
                <i class="fa fa-close"></i>
            </div>
            <div class="canvas-search search-switch">
                <i class="fa fa-search"></i>
            </div>
            <nav class="canvas-menu mobile-menu">
                <ul>
                    <li class="<?php
                    if ($page == "home") {
                        echo "active";
                    }
                    ?>"><a href="index.php?p=home">Home</a></li>
                    <li><a href="index.php?p=movies">Movies</a></li>
                    <li><a href="index.php?p=series">Series</a></li>
                    <li><a href="index.php?p=contact">Contact</a></li>

                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
            <div class="canvas-social">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <!-- Offcanvas Menu Section End -->
        <!-- Header Section Begin -->
        <header class="header-section">
            <div class="container-fluid">
                <?php if (isset($_SESSION["isUserloggedin"])) { ?>

                    <div class="row ">
                        <div class="col-4"></div>
                        <div class="col-4 text-center"><h3 style="color: darkblue"><?= 'Welcome,' . ucwords($_SESSION['fullname']) ?></h3> </div>
                        <div class="col-4"></div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="index.php?p=home">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="nav-menu">
                            <ul >
                                <li class="<?php
                                if ($page == "home") {
                                    echo "active";
                                }
                                ?>"><a href="index.php?p=home" style="color: blue">Home</a></li>
                                <li><a href="index.php?p=movies" style="color: blue">Movies</a></li>
                                <li><a href="index.php?p=series" style="color: blue">Series</a></li>
                                <li><a href="index.php?p=contact" style="color: blue">Contact</a></li>
                                <?php if (!(isset($_SESSION['isUserloggedin']) && ($_SESSION['isUserloggedin'] == 1))) { ?>
                                    <li class="<?php
                                    if ($page == "login") {
                                        echo "active";
                                    }
                                    ?>" ><a href="index.php?p=login" style="color: blue"><i class="fas fa-sign-in-alt"></i> Log In</a></li> 


                                <?php } ?>
                                <?php if (isset($_SESSION["isUserloggedin"])) { ?>


                                    <li class="<?php
                                    if ($page == "logout") {
                                        echo "active";
                                    }
                                    ?>" >

                                        <a href="index.php?p=logout" style="color: blue">logout   <i class="fas fa-sign-in-alt"></i> </a></li>
                                <?php } ?>

                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="top-option">

                            <div class="to-social" >
                                <a href="#" style="color: darkblue"><i class="fab fa-facebook"></i></a>
                                <a href="#" style="color: blue"><i class="fab fa-twitter"></i></a>
                                <a href="#" style="color: red"><i class="fab fa-youtube"></i></a>
                                <a href="#" style="color: darkred"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas-open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>
        <!-- Header End -->



        <?php
        $switch_pages = new switch_pages();
        $switch_pages->pages($page);
        ?>


        <!-- Footer Section Begin -->
        <section class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="fs-about">
                            <div class="fa-logo">
                                <a href="index.php?p=home"><img src="img/logo.png" alt=""></a>
                            </div>
                            <p>Video on demand (VoD) is a system that allows users to select and watch 
                                video content of their choice on their TVs or computers. 
                                Video on demand is one of the dynamic features offered by Internet Protocol TV.
                                VoD provides users with a menu of available videos from which to choose
                                . The video data is transmitted via Real-Time Streaming Protocol.</p>
                            <div class="fa-social">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fas fa-envelope-square"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="fs-widget">

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="fs-widget">
                            <h4>Support</h4>
                            <ul>
                                <li><a href="index.php?p=login">Login</a></li>
                                <li><a href="index.php?p=contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="copyright-text">
                            <p>
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is powered  <i class="fa fa-heart" aria-hidden="true"></i> by URM
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer Section End -->

        <!-- Search model Begin -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">+</div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>
        <!-- Search model end -->
        <!--slider script begin-->
        <script>
            $(document).ready(function () {
                    $("#news-slider").owlCarousel({
                            items: 3,
                            itemsDesktop: [1199, 2],
                            itemsDesktopSmall: [980, 2],
                            itemsMobile: [600, 1],
                            navigation: false,
                            pagination: false,
                            autoPlay: true
                    });
            });
        </script>
        <!--slider script end-->
        <!-- Js Plugins -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/masonry.pkgd.min.js"></script>
        <script src="js/jquery.barfiller.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>

        <script src="vendor/jquery.js"></script>
        <script src="dist/lity.js"></script>




    </body>

</html>