<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once './html/head.php'; ?>
</head>
<body>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

if(isset($_POST['submit'])){
	$title=$_POST['title']; // Get Name value from HTML Form
	$email=$_POST['email'];  // Get Email Value
	$content=$_POST['content']; // Get Message Value

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
// echo '<pre>';
// print_r($mail);
// echo '</pre>';
// exit;

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'vuducsaobien95@gmail.com';                     // SMTP username
    $mail->Password   = 'eamebfnacckryzyk';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('example@gmail.com', 'setForm');
    $mail->addAddress($email, 'addAddress');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $title;
    $mail->Body    = '<b>'.$content.'</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	$mail->send();
	echo '<pre>';
	print_r($mail);
	echo '</pre>';

    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
	<div class="container-contact100">

		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method = "post">
				<span class="contact100-form-title">
					Send Mail Message PHPMailer Created By Vũ Văn Đức
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
					<input class="input100" type="text" name="email" placeholder="Send To (Gmail)">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" name="title" placeholder="Title">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your message">
					<textarea class="input100" name="content" placeholder="Your Content"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn"  name="submit">
						<span>
							<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
							Send
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

<?php require_once './html/script.php';?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
