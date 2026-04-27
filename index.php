<?php
session_start();
include('connection.php');


$loginMessage = '';


if (isset($_SESSION['login_success'])) {
    $loginMessage = '<div class="alert alert-success text-center" style="width: 100%;">' . $_SESSION['login_success'] . '</div>';
    unset($_SESSION['login_success']); 
} else if (isset($_SESSION['login_error'])) {
    $loginMessage = '<div class="alert alert-danger text-center" style="width: 100%;">' . $_SESSION['login_error'] . '</div>';
    unset($_SESSION['login_error']); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        
        * {
            margin: 0;
            padding: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-image: url("");
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("cvsuu.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
        }
        .login-form, .registration-form {
            backdrop-filter: blur(100px);
            color: rgb(255, 255, 255);
            padding: 40px;
            width: 500px;
            border: 5px solid;
            border-radius: 10px;
            background-image: url("");
        }
        .switch-form-Link {
            text-decoration: underline;
            cursor: pointer;
            color: rgb(173, 8, 11);
        }
       
    </style>

</head>
<body>
    <div class="main">
        <div class="login-container">
           
            <?php if (!empty($loginMessage)): ?>
                <div class="message-container">
                    <?php echo $loginMessage; ?>
                </div>
            <?php endif; ?>
            <div class="login-form" id="loginForm">
                <h2 class="text-center">LOGIN</h2>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <p>New here? <span class="switch-form-Link" onclick="showRegistrationForm()">Register</span></p>
                    <button type="submit" class="btn btn-secondary login-btn form-control" name="login">Login</button>
                </form>
            </div>
            <div class="registration-form" id="registrationForm" style="display: none;">
                <h2 class="text-center">Register</h2>
                <p class="text-center">Fill in your personal details.</p>
                <form action="register.php" method="POST">
                    <div class="form-group registration row">
                        <div class="col-6">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name">
                        </div>
                        <div class="col-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name">
                        </div>
                    </div>
                    <div class="form-group registration row">
                        <div class="col-5">
                            <label for="contactNumber">Contact No.</label>
                            <input type="number" class="form-control" id="contactNumber" name="contact_number" maxlength="11">
                        </div>
                        <div class="col-7">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group registration">
                        <label for="registerUsername">Username</label>
                        <input type="text" class="form-control" id="registerUsername" name="username">
                    </div>
                    <div class="form-group registration">
                        <label for="registerPassword">Password</label>
                        <input type="password" class="form-control" id="registerPassword" name="password">
                    </div>
                    <p>Have an account? <span class="switch-form-Link" onclick="showLoginForm()">Login</span></p>
                    <button type="submit" class="btn btn-dark login-register form-control" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loginForm = document.getElementById('loginForm');
        const registrationForm = document.getElementById('registrationForm');

        function showRegistrationForm() {
            registrationForm.style.display = "block";
            loginForm.style.display = "none";
        }

        function showLoginForm() {
            registrationForm.style.display = "none";
            loginForm.style.display = "block";
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (window.location.hash === "#registration-form") {
                document.querySelector(".login-form").style.display = "none";
                document.querySelector(".registration-form").style.display = "block";
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>