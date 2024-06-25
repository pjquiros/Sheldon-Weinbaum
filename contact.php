<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;  
    $mail->Username   = 'your_email_address@gmail.com';  
    $mail->Password   = 'your_email_password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port       = 587;  

    $to = "weinbaum@ccny.cuny.edu"; // Replace sa email ni weinbaum
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        echo "Mail sent successfully!";
    } else {
        echo "Error sending email.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>