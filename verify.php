<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verification</title>
    <style>
         
          * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
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
        .container {
            backdrop-filter: blur(100px);
            color: rgb(255, 255, 255);
            padding: 30px;
            width: 400px;
            height: 300px;
            border: 5px solid;
            border-radius: 10px;
            background-image: url("");
        }
        .icon {
            width: 45px;
            height: 45px;
            background: #eceaff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 10px;
        }
        
        .icon img {
            width: 30px;
        }

        p {
            text-align: center;
            font-size: 14px;
            color: white;
            margin-bottom: 15px;
        }

        .container h2 {
            margin-bottom: 20px;
            font-size: 18px;
            text-align: center;
        }
        .container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            backdrop-filter: blur(100px);
            background-color:rgb(4, 4, 4);
            border: none;
            border-radius: 3px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color:rgb(255, 255, 255);
        }
      
    </style>
</head>
<body>
    <div class="container">
    <div class="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Mail Icon">
        </div>
        <h2>Verification Code</h2>
        <p>Please Enter The Verification Code We Sent<br>To your email</p>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="message">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        }
        ?>
        <form action="process.php" method="post">
            <input type="text" name="verification_code" placeholder="Enter verification code" required>
            <input type="submit" value="Verify" style="margin-bottom: 10px;">
       
        <a href="index.php#registration-form" style="display: block; text-align: center; margin-top: 10px; text-decoration: underline; color:rgba(254, 254, 254, 0.95);">Back to Registration</a>
        </form>
    </div>
</body>
</html>