<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wheel - Reservation</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/css_reset.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body>


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
if (isset($_SESSION['username'])) {
    $userId = getUserIdByUsername($_SESSION['username']);
}
?>

<div class="wheel-menu-wrap">
    <div class="container-fluid wheel-bg1">
        <div class="row">
            <div class="col-sm-3"><div class="wheel-logo"><a href="index.php"><img src="images/logo3.png" alt=""></a></div></div>
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
                                <ul class="dropdown-menu"><li><a href="login.php">Login</a></li><li><a href="register.php">Register</a></li></ul>
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
                            <li class="menu-item active-color"><a href="reservation1.php">Reservation</a></li>
                    
                            <li class="menu-item menu-item-has-children"><a href="#">Pages</a><ul class="sub-menu"><li class="menu-item"><a href="contact.html">Contact</a></li><li class="menu-item"><a href="register.php">Register</a></li><li class="menu-item"><a href="about.php">About</a></li></ul></li>
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
                    <h3>Reservation</h3>
                    <ol class="breadcrumb"><li><a href="index.php">Home</a></li><li class="active">Reservation</li></ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="step-wrap">
    <div class="container padd-lr0">
        <div class="row">
            <div class="col-xs-12 padd-lr0">
                <ul class="steps">
                    <li class="title-wrap active"><div class="title"><span>1.</span>Make a reservation</div></li>
                    <li class="title-wrap active"><div class="title"><span>2.</span>Select your car</div></li>
                    <li class="title-wrap active"><div class="title"><span>3.</span>Information & review</div></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
// Get car name from ID (passed from car listing page)
$car_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$car_name = "No car selected";
if ($car_id > 0) {
    $stmt = $conn->prepare("SELECT title FROM car WHERE id = ?");
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $stmt->bind_result($car_name);
    $stmt->fetch();
    $stmt->close();
}
$conn->close();

// Display error messages if any
if (isset($_GET['error'])) {
    $error_msg = '';
    if ($_GET['error'] === 'fields_not_set') $error_msg = 'Please select both pickup and return dates.';
    if ($_GET['error'] === 'invalid_dates') $error_msg = 'Return date must be after pickup date.';
    if ($_GET['error'] === 'not_logged_in') $error_msg = 'You must be logged in to make a reservation.';
    if ($error_msg) echo '<div class="container"><p style="color: red; text-align:center;">' . $error_msg . '</p></div>';
}
?>

<div class="reservation">
    <div class="container padd-lr0 marg-lg-t100 marg-lg-b100">
        <div class="row">
            <div class="col-xs-12 padd-lr0">
                <div class="wheel-start-form wheel-start-form2">
                    <form action="store_reservation.php" method="post">
                        <div class="wheel-date">
                            <span>Car Selected:</span>
                            <span><?php echo htmlspecialchars($car_name); ?></span>
                            <input type="hidden" name="car_selected" value="<?php echo $car_id; ?>">
                        </div>
                        <div class="wheel-date">
                            <span>Pickup Date</span>
                            <label class="fa fa-calendar">
                                <input type="date" name="pickup_date" required>
                            </label>
                        </div>
                        <div class="wheel-date">
                            <span>Return Date</span>
                            <label class="fa fa-calendar">
                                <input type="date" name="return_date" required>
                            </label>
                        </div>
                        <div class="wheel-date">
                            <button type="submit" class="wheel-btn">Reserve Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="wheel-footer">
    <img src="images/bg4.jpg" alt="" class="wheel-img">
    <div class="container"><div class="row"><div class="col-md-3 col-sm-6"><div class="wheel-address"><div class="wheel-footer-logo"><a href="#"><img src="images/logo3.png" alt=""></a></div><ul><li><i class="fa fa-map-marker"></i> 121 King Street, Melbourne VIC 3000</li><li><a href="#"><i class="fa fa-phone"></i> +61 3 8376 6284</a></li><li><a href="#"><i class="fa fa-envelope"></i> contact@wheel-rental.com</a></li></ul><div class="wheel-soc"><a href="#" class="fa fa-twitter"></a><a href="#" class="fa fa-facebook"></a><a href="#" class="fa fa-linkedin"></a></div></div></div></div></div>
</footer>
<div class="wheel-footer-info wheel-bg6"><div class="container"><div class="row"><div class="col-lg-8 col-sm-6">© WHEEL 2024 | <a href="#">Templates Point</a></div><div class="col-lg-4 col-sm-6"><ul><li><a href="index.php">Home</a></li><li><a href="car-list-grid.php">Listing</a></li><li><a href="reservation1.php">Reservation</a></li></ul></div></div></div></div>

<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/idangerous.swiper.min.js"></script>
<script src="assets/js/equalHeightsPlugin.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/index.js"></script>
</body>
</html>