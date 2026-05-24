<?php
session_start();
include 'connection.php';

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
if (isset($_SESSION['username'])) {
    $userId = getUserIdByUsername($_SESSION['username']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wheel - About Us</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/css_reset.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body>

<!-- ========== MENU ========== -->
<div class="wheel-menu-wrap">
    <div class="container-fluid wheel-bg1">
        <div class="row">
            <div class="col-sm-3">
                <div class="wheel-logo">
                    <a href="index.php"><img src="images/logo3.png" alt=""></a>
                </div>
            </div>
            <div class="col-sm-9 col-xs-12 padd-lr0">
                <div class="wheel-top-menu clearfix">
                    <div class="wheel-top-menu-info">
                        <div class="top-menu-item"><a href="#"><i class="fa fa-phone"></i><span>(+212) 766 314126</span></a></div>
                        <div class="top-menu-item"><a href="#"><i class="fa fa-envelope"></i><span>contact@wheel-rental.com</span></a></div>
                    </div>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <div class="wheel-top-menu-log">
                            <div class="top-menu-item"><span style="color: white">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span></div>
                            <div class="top-menu-item"><form action="logout.php" method="post"><button type="submit" class="btn btn-default">Logout</button></form></div>
                        </div>
                    <?php else : ?>
                        <div class="wheel-top-menu-log">
                            <div class="top-menu-item dropdown wheel-user-ico">
                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="login.php">Login</a></li>
                                    <li><a href="register.php">Register</a></li>
                                </ul>
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
                            <li class="menu-item"><a href="car-list-grid.php">Listing</a></li>
                            <li class="menu-item"><a href="reservation1.php">Reservation</a></li>
                            <li class="menu-item menu-item-has-children active-color">
                                <a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="contact.php">Contact</a></li>
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

<!-- ========== PAGE HEADER ========== -->
<div class="wheel-start3">
    <img src="images/bg7.jpg" alt="" class="wheel-img">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 padd-lr0">
                <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75">
                    <h3>About Us</h3>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">About</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========== MAIN CONTENT ========== -->
<div class="container padd-lr0">
    <div class="row">
        <div class="col-md-6">
            <div class="wheel-info-img marg-lg-t150 marg-lg-b150">
                <img src="images/i7.png" alt="" class="wheel-img">
            </div>
        </div>
        <div class="col-md-6">
            <div class="wheel-info-text marg-lg-t150 marg-lg-b150">
                <div class="wheel-header">
                    <h5>Who we are</h5>
                    <h3>We Love Our <span>Customers</span></h3>
                </div>
                <p>We believe that every journey should be smooth, affordable, and hassle‑free. Whether you need a compact car for a city trip, a spacious SUV for a family vacation, or a luxury vehicle for a special occasion, we have the perfect ride for you. Our dedicated team works around the clock to ensure the highest standards of cleanliness, safety, and customer service. With competitive rates, flexible booking options, and 24/7 support, we are here to make your travel experience unforgettable. Choose us for reliability, transparency, and a personal touch.</p>
                <a href="#" class="wheel-btn">Learn More</a>
            </div>
        </div>
    </div>
</div>

<!-- ========== FOOTER ========== -->
<footer class="wheel-footer">
    <img src="images/bg4.jpg" alt="" class="wheel-img">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 padd-lr0">
                <div class="wheel-address">
                    <div class="wheel-footer-logo"><a href="index.php"><img src="images/logo3.png" alt=""></a></div>
                    <ul>
                        <li><i class="fa fa-map-marker"></i> 121 King Street, Melbourne VIC 3000</li>
                        <li><a href="#"><i class="fa fa-phone"></i> +61 3 8376 6284</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> contact@wheel-rental.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 padd-lr0">
                <div class="wheel-footer-item">
                    <h3>Useful Links</h3>
                    <ul>
                        <li><a href="about.php">About us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
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
            <div class="col-lg-8 col-sm-6 padd-lr0">© WHEEL 2026 | <a href="#">Templates Point</a></div>
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

<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/index.js"></script>
</body>
</html>