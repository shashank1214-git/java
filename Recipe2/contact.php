<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .alert,.success {
      width: 400px;
      text-align: center;
      position: absolute;
      top: 135px;
      left: 50%;
      transform: translateX(-50%);
      color: whitesmoke;
      padding: 8px 0;
    }

    .alert { background-color: rgb(252, 59, 59); }
    .success { background-color: rgb(44, 158, 24); }
  </style>
</head>
<body>

<header>
  <nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="search.html">Search</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
  </nav>
</header>

<main>
  <section id="contact">
    <h1>Contact Us</h1>
    <form id="contact-form" action="" method="POST">
      <input type="text" name="name" id="name" placeholder="Your Name" required>
      <input type="email" name="email" id="email" placeholder="Your Email" required>
      <textarea name="message" id="message" placeholder="Your Message" required></textarea>
      <button type="submit" name="send" class="btn">Send</button>
    </form>
  </section>
</main>

<footer>
  <p>&copy; 2024 Cooking Chapters. All Rights Reserved.</p>
</footer>

</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

  //Load Composer's autoloader
  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'dhrumilkadchha@gmail.com';                     //SMTP username
    $mail->Password = 'zvgjwadocxxzezbn';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dhrumilkadchha@gmail.com', 'Recipe');
    $mail->addAddress('dhrumilkadchha2845@gmail.com', 'Our Website');     //Add a Recipients

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recipe Contact Form';
    $mail->Body = "Sender Name = $name <br> Sender Email = $email <br> Message = $message";
    $mail->send();
    echo "<div class='success'>! MESSAGE HAS BEEN SENT !</div>";
  } catch (Exception $e) {
    echo "<div class='alert'>! MESSAGE HAS NOT BEEN SENT !</div>";
  }
}
?>