<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $visitor_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Set recipient email address (change this to your email)
    $to = "your-email@example.com"; 

    // Create the email body
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $visitor_email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    // Set email headers
    $headers = "From: $name <$visitor_email>" . "\r\n";
    $headers .= "Reply-To: $visitor_email" . "\r\n";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        // Redirect to a thank you page or display success message
        echo "Thank you for contacting us. We will be in touch shortly.";
        // header('Location: thank-you.html'); // Uncomment this to redirect
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    // Not a POST request, display an error
    header("HTTP/1.1 403 Forbidden");
    echo "You are not allowed to access this page directly.";
}
?>
