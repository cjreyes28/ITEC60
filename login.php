<?php
session_start();
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        if ($user['is_verify']) {
            $_SESSION['login_success'] = "Login successful. Welcome, " . htmlspecialchars($user['username']) . "!";
          
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Please verify your email address before logging in.";
        }
    } else {
        $_SESSION['login_error'] = "Invalid username or password.";
    }
    
    header("Location: index.php");
    exit();
}
?>