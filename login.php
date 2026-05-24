<?php
session_start();
include 'connection.php';

if (isset($_POST["login_submit"])) {
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    if (empty($username_or_email) || empty($password)) {
        header("Location: register.php?error=empty");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, username, email, password FROM client WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username_or_email, $username_or_email);
    $stmt->execute();
    $stmt->bind_result($user_id, $db_username, $db_email, $db_password);

    if ($stmt->fetch() && password_verify($password, $db_password)) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $db_username;
        $_SESSION['email'] = $db_email;
        session_regenerate_id(true);
        $stmt->close();
        header("Location: index.php");
        exit();
    } else {
        header("Location: register.php?error=invalid");
        exit();
    }
    $stmt->close();
}
$conn->close();
?>