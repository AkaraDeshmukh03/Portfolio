<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer Autoload file
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$receiving_email_address = 'karthikdeshmukh03@icloud.com';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                     
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'karthikdeshmukh@gmail.com';            
        $mail->Password   = 'your_smtp_password';                  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
        $mail->Port       = 465;                                   

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($receiving_email_address); // Add a recipient

        // Content
        $mail->isHTML(false);                                  // Set email format to plain text
        $mail->Subject = $subject;
        $mail->Body    = "From: $name\nEmail: $email\nMessage: $message";

        // Send the email
        $mail->send();
        echo "Email sent successfully";
    } catch (Exception $e) {
        echo "Failed to send the email. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request";
}
?>
