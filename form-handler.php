<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Validate fields (optional additional validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }
    
    // Email subject and recipient details
    $to = "your-email@example.com"; // Change this to your email address
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from $name.\n\n".
                  "Here are the details:\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Subject: $subject\n\n".
                  "Message:\n$message";
    
    // Email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";
    
    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Unauthorized request.";
}
?>
