<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['submit'])) {
// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $body = $_POST['message'];

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'tim0901.tpj@gmail.com';                     // SMTP username
        $mail->Password = 'Brandweer.01';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('tim0901.tpj@gmail.com', 'Joe User');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $body;

        $mail->send();
        echo 'Dank u voor de vraag, we zullen hem zo snel mogelijk beantwoorden.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/AllPage.css">
<link rel="stylesheet" type="text/css" href="css/Contact.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<html lang="en">
<head>
    <title>HOME | PrettyHairByShirley</title>
</head>
<header>
    <a href="Home.php"><img src="img/Logo.jpg" alt="Logo" id="center" width="200" height="120"></a>
</header>
<body>
<div class="topnav" id="myTopnav">
    <a href="Home.php">Home</a>
    <a href="Prijslijst.php">Prijslijst</a>
    <a href="Klant/Producten.php">Producten</a>
    <a class="active" href="Contact.php">Contact</a>
    <a class="login" href="Login.php">Inloggen</a>
</div>
    <form method="post">
        <input type="text" name="email">
        <input type="text" name="name">
        <input type="text" name="subject">
        <input type="text" name="message">
        <input type="submit" name="submit" value="Vraag versturen">
    </form>
</body>
</html>
