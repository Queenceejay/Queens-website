<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']); // Clean up the input to prevent XSS attacks
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address (your email)
    $to = "queenceejay183@gmail.com"; // Replace with your actual email address

    // Set the subject of the email
    $subject = "New Contact Form Submission from Queens";

    // Build the email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message: \n$message\n";

    // Set the email headers
    $headers = "From: $email" . "\r\n" . "Reply-To: $email" . "\r\n";

    // Send the email using PHP's mail function
    if (mail($to, $subject, $email_body, $headers)) {
        // Redirect to a thank you page
        header("Location: thank_you.html");
        exit();
    } else {
        echo "There was an error sending your message. Please try again.";
    }
}
?>
