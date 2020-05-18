<?php
if(isset($_POST['submit'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "aweber0777@gmail.com";
    $email_subject = "Message from Your Website!";

    $name = $_POST['name'];
    $email_from = $_POST['email'];
    $message = $_POST['message'];

    $email_message = "Form details below.\n\n";

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";

    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

  }
 ?>
