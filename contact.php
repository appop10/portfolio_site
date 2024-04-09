<?php

$formSubmitted = false;
$confirmationMessage = "";

if (isset($_POST["submit"])) {
    $formSubmitted = true;
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $contactEmail = $_POST["contactEmail"];
    $messageSubject = $_POST["messageSubject"];
    $messageText = $_POST["messageText"];

    if (empty($_POST["contactPhone"]) && empty($_POST["preferredContact"])) {
        $to = "appoplawski10@gmail.com";
        $subject = "$messageSubject";
        $message = "$messageText";
        $message = wordwrap($message, 70);
        $headers = "From: $contactEmail";

        $confirm = mail($to, $subject, $message, $headers);

        if ($confirm == true) {
            $legendMessage = "Message Sent!";

            $confirmationMessage = "Hello $firstName $lastName,<br><br>Thank you for your message! I'll take a look at it and get back to you as soon as I can. Here's what you sent:<br><br> Contact Name: $firstName $lastName<br> Contact Email: $contactEmail<br> Message Subject: $messageSubject<br> Message: $messageText";
        } else {
            $legendMessage = "Please confirm";

            $confirmationMessage = "Hello $firstName $lastName,<br><br>Thank you for trying to contact me! It's seems there's a problem with sending your message. Here's what you tried to send:<br><br> Contact Name: $firstName $lastName<br> Contact Email: $contactEmail<br> Message Subject: $messageSubject<br> Message: $messageText";
        }
    } else {
        die("Invalid form submission, stopping program");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio site design page for Abby Poplawski">
    <title>Contact | Abigail Poplawski Portfolio Site</title>

    <link rel="icon" type="image/x-icon" href="images/logos/ap-long-logo-w-background.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">

    <link rel="stylesheet" href="stylesheets/contact-stylesheet.css">
    <script src="js-files/main-functions.js"></script>
</head>

<body onload="pageLoad()">
    <nav>
        <div class="element-wrapper">
            <div class="main-menu">
                <p>
                    <img src="images/logos/ap-logo-skinny.png" alt="AP studio logo">
                    <img src="images/logos/ap-hamburger-menu.png" alt="hamburger menu icon">
                </p>
                <ul>
                    <li><a href="index.html">Hello</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="extras.html">Extras</a></li>
                    <li class="active"><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <div class="resume-button-container"><a href="Abigail-Poplawski-Resume.pdf" target="_blank">Resume</a></div>
        </div>
    </nav>

    <footer>
        <a href="https://github.com/appop10?tab=repositories" target="_blank"><img src="images/logos/github-icon.png" alt="GitHub logo"></a>
        <a href="https://www.linkedin.com/in/abigail-poplawski/" target="_blank"><img src="images/logos/linkedin-icon.png" alt="LinkedIn logo"></a>
    </footer>

    <?php 
        if ($formSubmitted == true) {
    ?>
    <form>
        <legend><?php echo $legendMessage; ?></legend>
        <p><?php echo $confirmationMessage; ?></p>

    </form><!-- close form -->
    <?php
        } else {

    ?>
    <form method="post" action="contact.php">
        <legend>Message Me</legend>

        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" placeholder="First Name">

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" placeholder="Last Name">

        <label for="contactEmail">Email Address</label>
        <input type="email" name="contactEmail" id="contactEmail" placeholder="example@email.com">

        <label for="contactPhone">Phone Number</label>  
        <input type="tel" name="contactPhone" id="contactPhone" placeholder="123-456-7890">

        <label for="preferredContact">Preferred Contact Method</label>
        <input type="radio" name="preferredContact" id="preferredEmail" value="email">
        <label for="preferredEmail">Email</label>
        <input type="radio" name="preferredContact" id="preferredPhone" value="phone">
        <label for="preferredPhone">Phone</label>

        <label for="messageSubject">Subject</label>
        <input type="text" name="messageSubject" id="messageSubject" placeholder="Hello, Abby">

        <label for="messageText">Message</label>
        <textarea name="messageText" id="messageTExt" maxlength="250" placeholder="Max 250 characters" rows="5" cols="35"></textarea>

        <input type="submit" name="submit" id="submit" value="Send">
        <input type="reset" name="reset" id="reset">
    </form><!-- close form -->
    <?php
        }
    ?>
</body>
</html>