<?php
$receiving_email_address = 'karthikdeshmukh03@icloud.com';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    $to = $receiving_email_address;
    $subject = $subject;
    $messageBody = "From: $name\nEmail: $email\nMessage: $message";

    // Set additional headers
    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Attempt to send the email
    if (mail($to, $subject, $messageBody, $headers)) {
        echo "Email sent successfully";
    } else {
        echo "Failed to send the email";
    }
} else {
    echo "Invalid request";
}
?>
