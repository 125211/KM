<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@kmexporter.org";
    $subject = "New Message from K&M Exporter Website";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: $name <$email>";

    if (mail($to, $subject, $email_content, $headers)) {
        http_response_code(200);
        echo "Success";
    } else {
        http_response_code(500);
        echo "Failed to send";
    }
} else {
    http_response_code(403);
    echo "Invalid request";
}
?>
