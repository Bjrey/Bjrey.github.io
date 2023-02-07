<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Recipient email address
    $to = 'bk92107@gmail.com';

    // Subject of the email
    $subject = 'New Message from ' . $name;

    // Message body
    $body = "From: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
      echo 'Your message was sent successfully.';
    } else {
      echo 'An error occurred and your message could not be sent.';
    }
  }
?>
