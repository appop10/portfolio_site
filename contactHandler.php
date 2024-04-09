<?php

    $confirmationMessage = "";

    if (isset($_POST["submit"])) {
        // variables
        $contactDate = date_create();
        $formatContactDate = date_format($contactDate, "D, m-d-Y");
        $contactName = $_POST["contactName"];
        $contactEmail = $_POST["contactEmail"];
        $contactReason = $_POST["contactReason"];
        $comments = $_POST["comments"];

        // captcha variables
        $recaptcha = $_POST["g-recaptcha-response"];
        $privateKey = "its_a_secret";
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $privateKey . '&response=' . $recaptcha;
        $response = file_get_contents($url);

        // convert Google's JSON response
        $response = json_decode($response);

        if ($response->success == true) {
            // // email variables
            // $to = "$contactEmail, appoplawski10@gmail.com";
            // $subject = "Confirmation Email";
            // $message = "Hello $contactName,\n\nYou contacted us and provided the following information:\n\n Contact Date: $formatContactDate\n Contact Name: $contactName\n Contact Email: $contactEmail\n Contact Reason: $contactReason\n Comments: $comments\n\n Thank you for your message, \nThe Summit Farms Rescue Team"
            // $message = wordwrap($message, 70);

            // // send email
            // $confirm = mail($to, $subject, $message);

            // if ($confirm == true) {
            //     echo "<legend>Message Sent!</legend>"
            // } else {
            //     echo "<legend>Please confirm</legend>"
            // }

            $confirmationMessage = "Hello $contactName,<br><br>You contacted us and provided the following information:<br><br> Contact Date: $formatContactDate<br> Contact Name: $contactName<br> Contact Email: $contactEmail<br> Contact Reason: $contactReason<br> Comments: $comments<br><br>Thank you for your message,<br>The Summit Farms Rescue Team";
        } else {
            die("reCaptcha failed, stopping program");
        }
    }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Form Project php file for processing the form">
    <meta name="author" content="Abby Poplawski">
    <title>PHP Processing Page</title>
    <link href="ec_stylesheet.css" rel="stylesheet">
    <link href="mix_stylesheet.css" rel="stylesheet">

    <!-- script links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div>
            <a href="index.html"><img src="images/footprint.png" alt="summit farms logo, pawprint on circle background" height="80"></a>

            <nav>
                <ul>
                    <li><a href="#">Adopt</a></li>
                    <li><a href="#">Breed Information</a></li>
                    <li><a href="#">Breed Care</a></li>
                    <li><a href="htmlForm.html">Contact</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav><!-- close nav -->
        </div><!-- close logo and nav div -->

        <h1>Contact Us</h1>
    </header><!-- close header -->

    <form>

        <p><?php echo  $confirmationMessage; ?></p>

    </form><!-- close form -->

    <footer>
        <section class="copyright"><!-- footer section 1 -->
            <a href="index.html"><img src="images/footprint.png" height="80"></a>

            <div>
                <h3>Summit Farms Rescue</h3>
                <p>888 Address St <br> City, State Zip Code <br> (888) - 888 - 8888</p>
            </div>
        </section><!-- close footer section 1 -->

        <section class="office-hours"><!-- footer section 2 -->
            <h3>Office Hours</h3>

            <ul>
                <li>Sunday</li>
                <li>Monday</li>
                <li>Tuesday</li>
                <li>Wednesday</li>
                <li>Thursday</li>
                <li>Friday</li>
                <li>Saturday</li>
            </ul>

            <ul>
                <li>CLOSED</li>
                <li>CLOSED</li>
                <li>9:00 AM - 5:00 PM</li>
                <li>9:00 AM - 5:00 PM</li>
                <li>9:00 AM - 5:00 PM</li>
                <li>9:00 AM - 5:00 PM</li>
                <li>11:00 AM - 3:00 PM</li>
            </ul>
        </section><!-- close footer section 2 -->
        
        <section class="copyright"><!-- footer section 3 -->
            <div>
                <h3>Pages</h3>
                <ul>
                    <li><a href="#">Adopt</a></li>
                    <li><a href="#">Breed Information</a></li>
                    <li><a href="#">Breed Care</a></li>
                    <li><a href="htmlForm.html">Contact</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
            
            <p>&copy; 2004 Summit Farms Rescue</p>
        </section><!-- close footer section 3 -->
    </footer><!-- close footer -->
</body>
</html>