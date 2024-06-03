<?php
/*
Plugin Name: My Custom Plugin
Plugin URI: https://example.com/my-custom-plugin
Description: A custom plugin that includes PHPMailer for sending emails.
Version: 1.0
Author: Your Name
Author URI: https://example.com
*/

// Include the PHPMailer library files
require_once 'vendor/phpmailer/src/Exception.php';
require_once 'vendor/phpmailer/src/PHPMailer.php';
require_once 'vendor/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_email($subject, $body, $recipient_email) {
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // For example, if using Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'analytics@hypeinsight.com'; // Replace with your email address
        $mail->Password = 'pmga kliw dpdv jznk'; // Replace with your email password
        $mail->SMTPSecure = 'tls'; // For example, if using Gmail
        $mail->Port = 587; // For example, if using Gmail

        // Recipients
        $mail->setFrom('analytics@hypeinsight.com', 'Hype Insight'); // Replace with your email and name
        $mail->addAddress($recipient_email);

        // Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Send the email
        $mail->send();
        echo "Email sent successfully to " . $recipient_email;
    } catch (Exception $e) {
        echo "Error sending email: " . $e->getMessage();
    }
}

?>