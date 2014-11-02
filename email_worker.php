#!/usr/bin/env php
<?php
require_once 'myphpmailer.php';
$mail = new MyPHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';
$mail->Host = 'localhost';
$mail->Port = 25;
$mail->Username = 'uuu';
$mail->Password = 'ppp';
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = 1;
$mail->SMTPKeepAlive = true;

$mail->smtpConnect();

for ($f = 0; $f < 2; $f++) {
    $pid = pcntl_fork();
    if ($pid > 0) { // parent
        $status = null;
        pcntl_wait($status);
    } else if ($pid == -1) {
        die("Could not fork!" . PHP_EOL);
    } else { // child
        echo ">>>>>>>>>>>>>>>>>>>>>>>> CHILD BEGIN" . PHP_EOL;
        echo ">>>>>>>>>>>>>>>>>>>>>>>> Email call begin" . PHP_EOL;
        email($mail, $f);
        echo ">>>>>>>>>>>>>>>>>>>>>>>> Email call end" . PHP_EOL;
        echo ">>>>>>>>>>>>>>>>>>>>>>>> CHILD EXIT CALL" . PHP_EOL;
        exit(0);
    }
}

function email($mail, $instance_no) {
    $mail->setFrom('test@dispostable.com', 'First Last');
    $mail->addAddress('test@dispostable.com', 'John Doe');
    $mail->Subject = 'Email instance_no: ' . $instance_no;
    $mail->msgHTML("body " . date('c'));

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo . PHP_EOL;
    } else {
        echo "Message sent!" . PHP_EOL;
    }
}
