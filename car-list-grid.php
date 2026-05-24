<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wheel - Car Listing</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/css_reset.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
   
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <script src="assets/js/script.js"></script>
</head>
<body class="wheel-bg2">


    <?php
    session_start();
    include 'connection.php';

    // Get user ID from username for admin menu (optional)
    function getUserIdByUsername($username) {
        global $conn;
        $stmt = $conn->prepare("SELECT id FROM client WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();
        return $userId;
    }

    $userId = null;
    $isLoggedIn = isset($_SESSION['username']);  // ✅ consistent login check
    if ($isLoggedIn) {
        $userId = getUserIdByUsername($_SESSION['username']);
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

                        <?php if ($isLoggedIn) : ?>
                            <!-- ✅ Show welcome & logout -->
                            <div class="wheel-top-menu-log">
                                <div class="top-menu-item">
                                    <span style="color: white">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                                </div>
                                <div class="top-menu-item">
                                    <form action="logout.php" method="post">
                                        <button type="submit" class="btn btn-default">Logout</button>
                                    </form>
                                </div>
                            </div>
                        <?php else : ?>
                            <!-- Show login/register dropdown -->
                            <div class="wheel-top-menu-log">
                                <div class="top-menu-item">
                                    <div class="dropdown wheel-user-ico">
                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                            Account <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="login.php">Login</a></li>
                                            <li><a href="register.php">Register</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="wheel-navigation">
                        <nav id="dl-menu">
                            <ul class="main-menu dl-menu">
                                <li class="menu-item"><a href="index.php">Home</a></li>
                                <li class="menu-item current-menu-parent menu-item-has-children active-color"><a href="car-list-grid.php">Listing</a></li>
                                <li class="menu-item"><a href="reservation1.php">Reservation</a></li>
                                
                                <li class="menu-item menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="contact.html">Contact</a></li>
                                        <li class="menu-item"><a href="register.php">Register</a></li>
                                        <li class="menu-item"><a href="about.php">About</a></li>
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

    <div class="wheel-start3">
        <img src="images/bg7.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Listing - List View</h3>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Listing</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="prosuct-wrap">
        <div class="container padd-lr0 xs-padd">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3"></div>
                <div class="col-xs-12 col-sm-6 col-md-3"></div>
                <div class="col-xs-12 col-sm-6 col-md-3"></div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="wheel-car-list-btn">
                        <a href="#" class="fa fa-th-list active" data-list='product-elem-style1'></a>
                        <a href="#" class="fa fa-th" data-list='product-elem-style2'></a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Fetch all cars from 'car' table (matches your SQL schema)
        $sql = "SELECT id, title, price, image1, image2, seats, bags, doors FROM car";
        $result = $conn->query($sql);
        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        if ($result->num_rows > 0) {
            $html = '';
            while ($row = $result->fetch_assoc()) {
                $html .= '<div class="container padd-lr0 xs-padd">
                            <div class="product-list product-list2 wheel-bgt clearfix">
                                <div class="row"><div class="col-xs-12">
                                    <div class="product-elem-style1 product-elem-style wheel-bg1 clearfix">
                                        <div class="product-table2"><div class="img-wrap img-wrap2 product-cell"><img src="'. htmlspecialchars($row['image1']) .'" alt="img" class="img-responsive"></div></div>
                                        <div class="product-table3">
                                            <div class="text-wrap text-wrap2 product-cell"><div class="title">' . htmlspecialchars($row['title']) . '</div><div class="price-wrap product-cell"><span>$' . number_format($row['price'], 2) . '</span><sup>00</sup>/Day</div></div>
                                            <div class="img-wrap img-wrap3 product-cell"><img src="'. htmlspecialchars($row['image2']) .'" alt="img" class="img-responsive"></div>
                                            <div class="text-wrap text-wrap3 product-cell">
                                                <ul class="metadata metadata2">
                                                    <li>' . (int)$row['seats'] . ' seats</li>
                                                    <li>' . (int)$row['bags'] . ' bags</li>
                                                    <li>' . (int)$row['doors'] . ' doors</li>
                                                </ul>
                                                <!-- Reserve Now button links to reservation1.php with car ID -->
                                                <div class="wheel-view-link">
                                                    <a href="reservation1.php?id=' . (int)$row['id'] . '" class="wheel-btn">Reserve Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div></div>
                            </div>
                        </div>';
            }
            echo $html;
        } else {
            echo "<div class='container'><p>No cars found</p></div>";
        }
        $conn->close();
        ?>

        <!-- Pagination (static example) -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0 text-center">
                    <div class="wheel-page-pagination marg-lg-t60 marg-lg-b25">
                        <a class="prev page-numbers fa fa-arrow-left" href="#"></a>
                        <a class="page-numbers" href="#">1</a>
                        <span class="page-numbers current">2</span>
                        <a class="next page-numbers fa fa-arrow-right" href="#"></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end .prosuct-wrap -->

    <!-- FOOTER (same as before) -->
    <footer class="wheel-footer">
        <img src="images/bg4.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 padd-lr0">
                    <div class="wheel-address">
                        <div class="wheel-footer-logo"><a href="index.php"><img src="images/logo3.png" alt=""></a></div>
                        <ul>
                            <li><span><i class="fa fa-map-marker"></i>121 King Street, Melbourne<br>VIC 3000, Australia</span></li>
                            <li><a href="#"><span><i class="fa fa-phone"></i> +61 3 8376 6284</span></a></li>
                            <li><a href="#"><span><i class="fa fa-envelope"></i>contact@wheel-rental.com</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 padd-lr0">
                    <div class="wheel-footer-item">
                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="about.php">About us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Site Map</a></li>
                            <li><a href="#">Terms & condition</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 padd-lr0">
                    <div class="wheel-footer-gallery">
                        <h3>Photo Gallery</h3>
                        <div class="clearfix">
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
                <div class="col-lg-8 col-sm-6 padd-lr0"><span>&#169; WHEEL 2026 | <a href="#">Templates Point</a></span></div>
                <div class="col-lg-4 col-sm-6 padd-lr0">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="car-list-grid.php">Listings</a></li>
                        <li><a href="reservation1.php">Reservation</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="assets/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src='assets/js/jquery.countTo.js'></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt5tJTim4lOO3ojbGARhPd1Z3O3CnE-C8" type="text/javascript"></script>
    <script type="text/javascript" src="assets/js/idangerous.swiper.min.js"></script>
    <script type="text/javascript" src="assets/js/equalHeightsPlugin.js"></script>
    <script type="text/javascript" src="assets/js/jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/js/index.js"></script>
</body>
</html>