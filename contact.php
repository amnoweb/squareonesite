<?php
if(isset($_POST['name']))
$name = $_POST['name'];

if(isset($_POST['email']))
$email = $_POST['email'];

if(isset($_POST['message']))
$message = $_POST['message'];

$subject = "Contact from your website!";

header('Content-Type: application/json');

if ($name === ''){
  print json_encode(array('message' => 'Name cannot be empty', 'code' => 0));
  exit();
}
if ($email === ''){
  print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
  exit();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
    exit();
  }
}
if ($message === ''){
  print json_encode(array('message' => 'Message cannot be empty', 'code' => 0));
  exit();
}

$content="From: $name \n Email: $email \n Message: $message \r\n";
$recipient = "aweber0777@gmail.com";
$mailheader = "From: $email \r\n";

$retval = mail($recipient, $subject, $content, $mailheader);
    if( $retval == true )
    {
    print json_encode(array('message' => 'Email successfully sent!', 'code' => 1));
    exit();
    }
    else
    {
    print json_encode(array('message' => 'Email not sent, try again later.', 'code' => 0));
    exit();
    }

?>
