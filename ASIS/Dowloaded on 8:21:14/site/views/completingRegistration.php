<html>
<head>
<style>
input { width: 100px; height: 35px; margin-left:50px;}
</style>
</head>
<body>

<section class="container" id="trojanscup-header">
<div class="row">
    <div class="twelvecol">
        <p><h2>
            Welcome, Team <?php echo $_POST["teamName"]; ?><br>
        </h2></p>
    </div>

    <div class="sevencol last">
    <p>
        <br>In order to complete your registration, you need to pay the $250 registration fees.<br>

        <?php
            $p = $_POST["payment"];
            if ($p == "inperson")
            {
                echo "Please contact Yosua (310-994-7208) or William (408-887-2311) to pay your registration fees. Your team will be added to the list in 24 hours.";
            }
            else{
                echo "An invoice will be sent to your email in 24 hours. You will be required to complete the payment through PayPal. In case you don't receive any email in 24 hours, please contact Yosua (310-994-7208) or William (408-887-2311). Your team will be added to the list in 24 hours.";
            }
        ?>
        <br><br>Thank you for participating in Trojans Cup 2013 !!<br>
    </p>
    </div>


<?php

    $to  = 'ewiraatm@usc.edu' . ', '; // note the comma
    $to .= 'yutama@usc.edu' . ', ';
    $to .= 'williamu@usc.edu';
    
    // subject
    $subject = 'Someone has registered for Trojans Cup 2013';
    
    // message
    $message =  "Someone has registered for Trojans Cup 2013!!"."<br/><br/>"."Team Name: ".$_POST["teamName"]."<br/>"."Captain: ".$_POST["captain"]."<br/>"."Email: ".$_POST["email"]."<br/>"."Phone: ".$_POST["phone"]."<br/>"."Jersey Color: ".$_POST["jcolor"]."<br/>"."Payment: ".$_POST["payment"];
   
    $from = "uscasis@usc.edu";
    
    //headers
    $headers  = "From: uscasis@usc.edu\r\n";
    $headers .= "Reply-To: uscasis@usc.edu\r\n";
    $headers .= "Return-Path: uscasis@usc.edu\r\n";
    $headers .= "X-Mailer: Drupal\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Mail it
    mail($to, $subject, $message, $headers, "-f$from");
?>

</div>
</section>


</body>
</html>