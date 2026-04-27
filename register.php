<?php
session_start();
include('connection.php');

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $contact = htmlspecialchars(trim($_POST['contact_number']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $username = htmlspecialchars(trim($_POST['username']));
    $passwordRaw = $_POST['password'];
    $verificationCode = rand(100000, 999999); 

    if (!$email) {
        die("Invalid email address.");
    }

    // Check if email or username already exists
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
zz
    if ($stmt->rowCount() > 0) {
        echo "<script>
            alert('Email or username already exists.');
            window.location.href = 'verify.php';
        </script>";
        exit();
    }

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO tbl_user 
        (first_name, last_name, contact_number, email, username, password, verification_code) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$firstName, $lastName, $contact, $email, $username, $passwordRaw, $verificationCode]);

    // Send verification email
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'cjkyot177013@gmail.com'; 
        $mail->Password = 'gfgcvoueaqschfqz'; // App password (Don't expose in production)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('cjkyot177013@gmail.com', 'Your App Name'); // Update this
        $mail->addAddress($email, "$firstName $lastName");

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = "
            <p>Good Day, <strong>$firstName</strong>,</p>
            <p>Thank you for registering. Please use the following code to verify your email address :p/p>
            <h2>$verificationCode</h2>
            <p>If you didn't request this, please ignore this email.</p>
            <br>
            <p>Best regards,<br>Sigma sigma boy</p>
        ";

        $mail->send();

        // Redirect after success
        header("Location: verify.php?email=" . urlencode($email));
        exit();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
