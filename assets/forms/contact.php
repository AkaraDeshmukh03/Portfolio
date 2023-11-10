<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer Autoload file
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



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
        $mail->Username   = 'ahaofficialott@gmail.com';            
        $mail->Password   = 'mprfnlgrtsdjvycw';                  
        $mail->SMTPSecure = 'ssl';        
        $mail->Port       = 465;                                   


        $mail->setFrom('ahaofficialott@gmail.com');
        $mail->addAddress($email);

        
        $mail->isHTML(true);                        
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
