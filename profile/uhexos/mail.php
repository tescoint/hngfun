<?php $name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="From: $name \n Message: $message";
$recipient = "uhexos@gmail.com";
$subject = $_POST["subject"];
$mailheader = "From: $email \r\n";
echo $recipient, $subject, $formcontent, $mailheader;
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>