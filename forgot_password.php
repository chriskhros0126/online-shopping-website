<?php
require 'config/_base.php';
include 'partials/_head.php';

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Adjust the path if PHPMailer is installed manually

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the users table
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Generate a token
        $token = bin2hex(random_bytes(16)); // 32 character token
        $expires = time() + 3600; // Token expires in 1 hour

        // Insert token into the password_resets table
        $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires) VALUES (?, ?, ?)");
        $stmt->execute([$email, $token, $expires]);

        // Set up PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'AACS3173@gmail.com';
            $mail->Password = 'npsg gzfd pnio aylm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('alpha@alpha.com', 'Alpha Watches');
            $mail->addAddress($email);

            // Content
            $resetLink = "localhost/online-shopping-website/reset_password.php?token=$token";
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click the following link to reset your password: <a href='$resetLink'>$resetLink</a>";

            $mail->send();
            echo "<p>Reset link has been sent to your email address.</p>";
        } catch (Exception $e) {
            echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
        }
    } else {
        echo "<p>No user found with that email address.</p>";
    }
}
?>

<link rel="stylesheet" href="asset/css/login.css">
<!-- Forgot Password Form -->
<form action="" method="post">
    <h2>Forgot Password</h2>
    <label for="email">Enter your email address</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Send Reset Link</button>
</form>
