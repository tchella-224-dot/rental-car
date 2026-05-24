<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Jewel Theme">
        <meta name="description" content="Wheel - Responsive and Modern Car Rental Website Template">
        <meta name="keywords" content="">
        <title>Wheel - Responsive and Modern Car Rental Website Template</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <!-- reset css -->
        <link rel="stylesheet" type="text/css" href="assets/css/css_reset.css">
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
       
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
        <!-- preload -->
        
        <link rel="stylesheet" type="text/css" href="assets/css/index.css">
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="">
        <!-- MAIM -->
        
        <?php
    // Start session
    session_start();

    // Include the database connection file
    include 'connection.php';

    // Function to get user ID from username
    function getUserIdByUsername($username) {
        global $conn; // Use the connection from the included file

        // Prepare and bind
        $stmt = $conn->prepare("SELECT id FROM client WHERE username = ?");
        $stmt->bind_param("s", $username);

        // Execute the statement
        $stmt->execute();

        // Bind the result
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();

        return $userId;
    }

    // Check if the session variable 'username' is set and get the user ID
    $userId = null;
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $userId = getUserIdByUsername($username);
    }
?>

<div class="wheel-menu-wrap">
    <div class="container-fluid wheel-bg1">
        <div class="row">
            <div class="col-sm-3">
                <div class="wheel-logo">
                    <a href="index.php" style="width: 300px;"><img src="images/logo3.png" alt=""></a>
                </div>
            </div>
            <div class="col-sm-9 col-xs-12 padd-lr0">
                <div class="wheel-top-menu clearfix">
                    <div class="wheel-top-menu-info">
                        <div class="top-menu-item"><a href="#"><i class="fa fa-phone"></i><span>(+212) 766 314126</span></a></div>
                        <div class="top-menu-item"><a href="#"><i class="fa fa-envelope"></i><span>contact@wheel-rental.com</span></a></div>
                    </div>

                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <!-- Display username and logout button if user is logged in -->
                        <div class="wheel-top-menu-log">
                            <div class="top-menu-item">
                                <span style="color: white">Welcome, <?php echo $_SESSION['username']; ?></span>
                            </div> 
                            <div class="top-menu-item">
                                <form action="logout.php" method="post">
                                    <button type="submit" class="btn btn-default">Logout</button>
                                </form>
                            </div>
                        </div>
                    <?php else : ?>
                        <!-- Display login and register links if user is not logged in -->
                        <div class="wheel-top-menu-log">
                            <div class="top-menu-item">
                                <div class="dropdown wheel-user-ico">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Account
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="register.php">Login</a></li>
                                        <li><a href="register.php">Register</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-9 ">
                <div class="wheel-navigation">
                    <nav id="dl-menu">
                        <!-- class="dl-menu" -->
                        <ul class="main-menu dl-menu">
                            <li class="menu-item   current-menu-parent menu-item-has-children   active-color ">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="menu-item current-menu-parent menu-item-has-children  ">
                                <a href="car-list-grid.php"> Listing </a>
                            </li>
                            <li class="menu-item">
                                <a href="reservation1.php"> Reservation</a>
                            </li>
                           
                            <li class="menu-item menu-item-has-children  ">
                                <a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li class="menu-item "><a href="contact.html">contact</a></li>
                                    <li class="menu-item "><a href="register.php">Register</a></li>
                                    <li class="menu-item "><a href="about.php">About</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="nav-menu-icon"><i></i></div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- ////////////////////////////////////////// -->
        <div class="wheel-start wheel-start2">
            <img src="images/bg5.jpg" alt="" class="wheel-img">
            <div class="container padd-lr0">
                <div class="col-lg-12  padd-lr0">
                    <div style="height: 150px;">
                        
                    </div>
                </div>
                <div class="col-lg-12">
                    <header class="wheel-header text-center marg-lg-t80 ">
                        <h1>Search - Hire - Compare - Save</h1>
                        <h5>We Help you Rent the best Car </h5>
                    </header>
                </div>
            </div>
            <div class="wheel-service-img2">
                <img src="images/i1.png" alt="" class="wheel-img2">
            </div>
        </div>
        <!-- ////////////////////////////////////////// -->
        <div class="wheel-four-block-body">
            <div class="container-fluid padd-lr0">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 padd-lr0 wheel-bg7">
                        <div class="wheel-four-block">
                            <img src="images/ico4.png" alt="">
                            <h5>Most Affordable</h5>
                            <p> Get the best prices on daily, weekly, and monthly rentals. No hidden fees, no surprises – just honest, low rates that fit your budget.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6  padd-lr0 wheel-bg8">
                        <div class="wheel-four-block">
                            <img src="images/ico2a.png" alt="">
                            <h5>Best Rated Service</h5>
                            <p>Our customers love us! 24/7 roadside assistance, clean and well‑maintained vehicles, and a friendly team ready to help you every step of the way.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 padd-lr0 wheel-bg9">
                        <div class="wheel-four-block">
                            <img src="images/ico1.png" alt="">
                            <h5>Exclusive Discounts</h5>
                            <p>Save up to 20% on long‑term rentals. Join our loyalty program and enjoy special promo codes, seasonal offers, and referral bonuses.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 padd-lr0 wheel-bg10">
                        <div class="wheel-four-block">
                            <img src="images/ico5.png" alt="">
                            <h5>Easy Booking & Searching</h5>
                            <p>Search, compare, and book your perfect car in under a minute. Our intuitive system lets you filter by price, model, or features – no hassle.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////// -->
        <div class="container padd-lr0">
            <div class="row">
                <div class="col-xs-12">
                    <header class="wheel-header text-center marg-lg-t140 marg-lg-b95  marg-md-t50 marg-md-b50">
                        <h5>We have a Great  </h5>
                        <h3>collection of <span> vehicles</span></h3>
                    </header>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="wheel-collection-slider marg-lg-b140  marg-md-b50">
                        <div class="swiper-container  " data-autoplay="0" data-touch="1" data-mouse="0" data-xs-slides="1" data-sm-slides="1" data-md-slides="1" data-lg-slides="1" data-add-slides="1" data-slides-per-view="responsive" data-loop="1" data-speed="1000">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-md-5 padd-lr0">
                                            <div class="wheel-collection-info wheel-collection-info2">
                                                <div class="wheel-collection-text">
                                                    <h4>2016 Nissan Juke</h4>
                                                    <span>Luxury Sports Car</span>
                                                    <h5><b>$79 <sup>00</sup></b>/Day</h5>
                                                    <p>Rent this amazing car at an unbeatable price. Clean, well-maintained, and ready for your next adventure. Free cancellation up to 24 hours before pickup</p>
                                                    <ul>
                                                        <li><i class="fa fa-suitcase"></i><span>2 Bags</span></li>
                                                        <li><i class="fa fa-user"></i><span>2 Passengers</span></li>
                                                       
                                                    </ul>
                                                    <a href="car-list-grid.php" class="wheel-btn">View All rental Car</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 padd-lr0">
                                            <div class="wheel-collection-img wheel-collection-img2"><img src="images/i6a.png" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                              
                                
                            </div>
                            <div class="pagination"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////// -->
       
                <div class="row">
                    <div class="col-xs-12">
                        <div class="wheel-quote-partners">
                            <a href="#"><img src="images/p1.png" alt=""></a>
                            <a href="#"><img src="images/p2.png" alt=""></a>
                            <a href="#"><img src="images/p3.png" alt=""></a>
                            <a href="#"><img src="images/p4.png" alt=""></a>
                            <a href="#"><img src="images/p5.png" alt=""></a>
                            <a href="#"><img src="images/p6.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////// -->
        <div class="container padd-lr0">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="wheel-info-img  marg-lg-t150 marg-lg-b150 marg-md-t100 marg-md-b100">
                        <img src="images/i7.png" alt="" class="wheel-img">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="wheel-info-text  marg-lg-t150 marg-lg-b150 marg-md-t100 marg-md-b100 marg-sm-t50 marg-sm-b50">
                        <div class="wheel-header">
                            <h5>Who we are  </h5>
                            <h3>We Love Our <span>Customers</span></h3>
                        </div>
                        
                        <p>we believe that every journey should be smooth, affordable, and hassle‑free. Whether you need a compact car for a city trip, a spacious SUV for a family vacation, or a luxury vehicle for a special occasion, we have the perfect ride for you. Our dedicated team works around the clock to ensure the highest standards of cleanliness, safety, and customer service. With competitive rates, flexible booking options, and 24/7 support, we are here to make your travel experience unforgettable. Choose us for reliability, transparency, and a personal touch.</p>
                        <a href="#" class="wheel-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- //////////////////////////////////////////-->
        <div class="wheel-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="wheel-header text-center marg-lg-t140 marg-lg-b90  marg-md-t50">
                            <h5>How it works </h5>
                            <h3>Easy Process for<span> You</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 padd-l0  padd-md-lr15">
                        <div class="wheel-works text-center marg-lg-b150 marg-md-b50 ">
                            <div class="wheel-works-ico"><img src="images/ico6.png" alt=""></div>
                            <h5>Make Plans</h5>
                            <p>Choose your travel dates, pickup location, and budget. Browse our wide range of vehicles to find the perfect match for your journey – from compact cars to luxury SUVs</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wheel-works text-center marg-lg-b150 marg-md-b50 ">
                            <div class="wheel-works-ico"><img src="images/ico7.png" alt=""></div>
                            <h5>Find a Car</h5>
                            <p>Compare prices, read detailed car specs, and check availability in real time. Our easy‑to‑use filters help you narrow down options by price, seats, or luggage capacity.</p>
                        </div>
                    </div>
                    <div class="col-md-4 padd-r0 padd-md-lr15">
                        <div class="wheel-works text-center marg-lg-b150 marg-md-b50 ">
                            <div class="wheel-works-ico"><img src="images/ico8.png" alt=""></div>
                            <h5>Enjoy the trip</h5>
                            <p>Pick up your clean, well‑maintained car and hit the road with 24/7 roadside assistance. Return it hassle‑free – we’ll handle the rest. Enjoy every mile!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////// -->
        <!-- FOOTER -->
        <!-- ///////////////// -->
        <footer class="wheel-footer">
            <img src="images/bg4.jpg" alt="" class="wheel-img">
            <div class="container">
                <div class="row">
                    <div class="col-md-3  col-sm-6  padd-lr0">
                        <div class="wheel-address">
                            <div class="wheel-footer-logo"><a href="#"><img src="images/logo3.png" alt=""></a></div>
                            <ul>
                                <li><span><i class="fa fa-map-marker"></i>121 King Street, Melbourne <br>
                                    VIC 3000, Australia  </span>
                                </li>
                                <li><a href="#"><span><i class="fa fa-phone"></i> +61 3 8376 6284</span></a></li>
                                <li><a href="#"><span><i class="fa fa-envelope"></i>contact@wheel-rental.com</span></a></li>
                            </ul>
                           
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6  padd-lr0">
                        <div class="wheel-footer-item">
                            <h3>Useful Links</h3>
                            <ul>
                                <li><a href="about.html" class="">About us</a></li>
                                <li><a href="contact.html" class="">Contact Us</a></li>
                                <li><a href="#" class="">Privacy policy</a></li>
                                <li><a href="#" class="">Site Map</a></li>
                                <li><a href="#" class="">Terms & condition</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-6 padd-lr0">
                        <div class="wheel-footer-gallery">
                            <h3>Photo Gallery</h3>
                            <div class="  clearfix">
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i11.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i12.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i13.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i14.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i15.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i16.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i17.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i18.jpg" alt=""></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="wheel-footer-info wheel-bg6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-6  padd-lr0"><span>&#169; WHEEL 2026 | <a href="#">Templates Point</a> </span></div>
                    <div class="col-lg-4 col-sm-6 padd-lr0">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="car-list-grid.php"> Listings</a></li>
                            <li><a href="reservation1.php"> Reservation</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts project -->
        <script type="text/javascript" src="assets/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <!-- count -->
        <script type="text/javascript" src='assets/js/jquery.countTo.js'></script>
        <!-- google maps -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt5tJTim4lOO3ojbGARhPd1Z3O3CnE-C8" type="text/javascript"></script>
        <!-- swiper -->
        <script type="text/javascript" src="assets/js/idangerous.swiper.min.js"></script>
        <script type="text/javascript" src="assets/js/equalHeightsPlugin.js"></script>
        <script type="text/javascript" src="assets/js/jquery.datetimepicker.full.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="assets/js/index.js"></script>
        <!-- sixth block end -->
    </body>

</html>