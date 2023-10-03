<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Validate the email address (you can add more validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["message" => "Invalid email address"]);
        exit;
    }

    // Save the email address to a text file (for demo purposes)
    $file = "subscribers.txt";
    $data = $email . PHP_EOL;
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    echo json_encode(["message" => "Email address successfully added to the notification list!"]);
}
?>
