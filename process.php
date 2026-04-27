<?php
session_start();
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verificationCode = trim($_POST['verification_code']);

    if (empty($verificationCode)) {
        $_SESSION['message'] = "Verification code is required.";
        header("Location: verify.php");
        exit();
    }

    // Check if the code exists and user is not already verified
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE verification_code = ? AND is_verify = 0");
    $stmt->execute([$verificationCode]);
    $user = $stmt->fetch();

    if ($user) {
        $stmt = $conn->prepare("UPDATE tbl_user SET is_verify = 1 WHERE tbl_user_id = ?");
        $stmt->execute([$user['tbl_user_id']]);

        $_SESSION['user_id'] = $user['tbl_user_id']; // Optional

        echo "<script>
            alert('Your email has been successfully verified!');
            window.location.href = 'index.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Invalid or already used verification code.');
            window.location.href = 'verify.php';
        </script>";
        exit();
    }
}
?>
