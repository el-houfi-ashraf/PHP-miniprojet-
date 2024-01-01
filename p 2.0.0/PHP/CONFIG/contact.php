<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\phpmailer\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\phpmailer\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\phpmailer\vendor\phpmailer\phpmailer\src\SMTP.php';

$errormessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $lname = $_POST["lname"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username   = 'schoolngn@gmail.com';
    $mail->Password   = 'lpvh rvct cjrj feno';
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('schoolngn@gmail.com', 'NGN_School');
    $mail->addAddress($email, $name);

    $mail->addReplyTo($mail->Username);
	
	if (is_array($_FILES['file']['tmp_name'])) {
        for ($i=0; $i < count($_FILES['file']['tmp_name']); $i++) { 
            $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    
        }
    } else {
        $mail->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);    
    }
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;

    $mail->Body =  "<body style=\"background-color: #f0f0f0;\">
    <table style=\"width: 600px; margin: 0 auto; background-color: #e7d1fc; border: 1px solid #cccccc;\" width=\"600\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding: 10px; text-align: center;\">
    <img width=\"61\" height=\"61\" src=\"https://cdn-icons-png.flaticon.com/512/4720/4720451.png\" alt=\"Logo de NEGGAN\" /></td></tr><tr><td style=\"padding: 20px;\">
    <h1 style=\"color: black; font-family: Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 14.5pt;\">NGN SCHOOL</h1>
    <p style=\"color: #323232; font-family: 'Arial Black', sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 12pt; margin: 0pt;\">Dear <u>$name</u> <u>$lname</u></p>
    <p style=\"color: #737373; font-family: 'Lucida Sans Unicode', sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 10pt; margin: 0pt;\"><i>$message</i></p>
    <p style=\"color: #323232; font-family: 'Arial Black', sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 12pt; margin: 0pt;\">Regards,</p>
    <p style=\"color: #323232; font-family: 'Arial Black', sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 12pt; margin: 0pt;\">Neggan Lucy</p>
    <p style=\"color: #737373; font-family: 'Lucida Sans Unicode', sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 10pt; margin: 0pt;\">General Manager</p></td></tr><tr><td style=\"padding: 10px; border-top: 1px solid #cccccc;\">
    <p style=\"color: #2b2d2d; font-family: 'Lucida Sans Unicode', sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 9pt; margin: 0pt;\"><img width=\"120\" height=\"50\" src=\"https://th.bing.com/th/id/R.1586d36732fcb856523df8789b146070?rik=%2bEbvkKcvSuyOiw&riu=http%3a%2f%2fclipart-library.com%2fimages%2fBTarnpzpc.png&ehk=PxwN8kkbSi%2fIx4%2buzMLpDi%2bZX5YH59a1GTuIyrZ8ZoE%3d&risl=&pid=ImgRaw&r=0\" />
    <a href=\"mailto:schoolngn@gmail.com\" style=\"color: #2b2d2d; font-family: 'Lucida Sans Unicode', sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 9pt;\" target=\"_blank\">schoolngn@gmail.com</a></p></td></tr></table>
    </body>";
    if($mail->send()){
        $errormessage = "Your message has been sent!";
        header("Location: contact.php");
        exit;
    }else{
        $errormessage = "Message could not be sent!";
        header("Location: contact.php");
        exit;
    }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../STYLE/style.css">
    <link rel="stylesheet" href="../../STYLE/style4.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
    <?php include("nav.php");?>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        
            <img src="" alt="">
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="alert hide">
                <span class="fas fa-check-circle"></span>
                <span class="msg">Success:Your message has been sent!</span>
                <div class="close-btn">
                <span class="fas fa-times"></span>
                </div>
                </div>
                <div class="title">
                <i class="uil uil-chat-bubble-user"></i>
                    <span class="text">Contact students</span>
                </div>
        </div>   
                <div class="contact-form">
                <form method="POST" enctype="multipart/form-data"<?php echo $_SERVER["PHP_SELF"]; ?>>
                    <label for="name">Firstname:</label>
                    <input id="name" name="name" type="name" placeholder="Firstname" required>
                    <label for="lname">Lastname:</label>
                    <input id="lname" name="lname" type="lname" placeholder="Lastname" required>
                    <label for="email">Email:</label>
                    <input id="email" name="email" type="email" placeholder="Email" required>
                    <label for="subject">Subject:</label>
                    <input name="subject" type="text" placeholder="Subject" required>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" placeholder="Compose your message.." required></textarea>
                    <input type="file" name="file">
                    <button name="submit" type="submit">Submit</button>
                </form>
                </div>
                </div>
                <script src="../../JS Folder/script.js"></script>
   </body>
</html>
