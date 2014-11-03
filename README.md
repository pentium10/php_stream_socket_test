php_stream_socket_test
======================

http://stackoverflow.com/q/26612780/243782


Output when running running php email_worker.php

```
$ php email_worker.php
2014-11-02 12:09:37     SERVER -> CLIENT: 220 localhost ESMTP service ready
2014-11-02 12:09:37     CLIENT -> SERVER: EHLO localhost
2014-11-02 12:09:37     SERVER -> CLIENT: 250-127.0.0.1
                                          250-8BITMIME
                                          250-SIZE 20480000
                                          250-AUTH=PLAIN LOGIN
                                          250-AUTH PLAIN LOGIN
                                          250 STARTTLS
2014-11-02 12:09:37     CLIENT -> SERVER: STARTTLS
2014-11-02 12:09:37     SERVER -> CLIENT: 220 Begin TLS negotiation now
2014-11-02 12:09:37     CLIENT -> SERVER: EHLO localhost
2014-11-02 12:09:37     SERVER -> CLIENT: 250-127.0.0.1
                                          250-8BITMIME
                                          250-SIZE 20480000
                                          250-AUTH=PLAIN LOGIN
                                          250 AUTH PLAIN LOGIN
2014-11-02 12:09:37     CLIENT -> SERVER: AUTH LOGIN
2014-11-02 12:09:37     SERVER -> CLIENT: 334 {EDITED}
2014-11-02 12:09:37     CLIENT -> SERVER: {EDITED}
2014-11-02 12:09:37     SERVER -> CLIENT: 334 {EDITED}
2014-11-02 12:09:37     CLIENT -> SERVER: {EDITED}
2014-11-02 12:09:38     SERVER -> CLIENT: 235 Authentication successful.
>>>>>>>>>>>>>>>>>>>>>>>> CHILD BEGIN
>>>>>>>>>>>>>>>>>>>>>>>> Email call begin
2014-11-02 12:09:38     CLIENT -> SERVER: MAIL FROM:<test@dispostable.com>
2014-11-02 12:09:38     SERVER -> CLIENT: 250 Sender address accepted
2014-11-02 12:09:38     CLIENT -> SERVER: RCPT TO:<test@dispostable.com>
2014-11-02 12:09:38     SERVER -> CLIENT: 250 Recipient address accepted
2014-11-02 12:09:38     CLIENT -> SERVER: DATA
2014-11-02 12:09:38     SERVER -> CLIENT: 354 Continue
2014-11-02 12:09:38     CLIENT -> SERVER: Date: Sun, 2 Nov 2014 12:09:38 +0000
2014-11-02 12:09:38     CLIENT -> SERVER: To: John Doe <test@dispostable.com>
2014-11-02 12:09:38     CLIENT -> SERVER: From: First Last <test@dispostable.com>
2014-11-02 12:09:38     CLIENT -> SERVER: Subject: Email instance_no: 0
2014-11-02 12:09:38     CLIENT -> SERVER: Message-ID: <b8a7285fe3b60476181f05435db6dac6@localhost>
2014-11-02 12:09:38     CLIENT -> SERVER: X-Priority: 3
2014-11-02 12:09:38     CLIENT -> SERVER: X-Mailer: PHPMailer 5.2.9 (https://github.com/PHPMailer/PHPMailer/)
2014-11-02 12:09:38     CLIENT -> SERVER: MIME-Version: 1.0
2014-11-02 12:09:38     CLIENT -> SERVER: Content-Type: multipart/alternative;
2014-11-02 12:09:38     CLIENT -> SERVER:       boundary="b1_b8a7285fe3b60476181f05435db6dac6"
2014-11-02 12:09:38     CLIENT -> SERVER: Content-Transfer-Encoding: 8bit
2014-11-02 12:09:38     CLIENT -> SERVER:
2014-11-02 12:09:38     CLIENT -> SERVER: --b1_b8a7285fe3b60476181f05435db6dac6
2014-11-02 12:09:38     CLIENT -> SERVER: Content-Type: text/plain; charset=us-ascii
2014-11-02 12:09:38     CLIENT -> SERVER:
2014-11-02 12:09:38     CLIENT -> SERVER: body 2014-11-02T12:09:38+00:00
2014-11-02 12:09:38     CLIENT -> SERVER:
2014-11-02 12:09:38     CLIENT -> SERVER:
2014-11-02 12:09:38     CLIENT -> SERVER: --b1_b8a7285fe3b60476181f05435db6dac6
2014-11-02 12:09:38     CLIENT -> SERVER: Content-Type: text/html; charset=us-ascii
2014-11-02 12:09:38     CLIENT -> SERVER:
2014-11-02 12:09:38     CLIENT -> SERVER: body 2014-11-02T12:09:38+00:00
2014-11-02 12:09:38     CLIENT -> SERVER:
2014-11-02 12:09:38     CLIENT -> SERVER:
2014-11-02 12:09:38     CLIENT -> SERVER:
2014-11-02 12:09:38     CLIENT -> SERVER: --b1_b8a7285fe3b60476181f05435db6dac6--
2014-11-02 12:09:38     CLIENT -> SERVER:
2014-11-02 12:09:38     CLIENT -> SERVER: .
2014-11-02 12:09:38     SERVER -> CLIENT: 250 Delivery in progress
2014-11-02 12:09:38     CLIENT -> SERVER: RSET
2014-11-02 12:09:38     SERVER -> CLIENT: 250 I remember nothing.
Message sent!
>>>>>>>>>>>>>>>>>>>>>>>> Email call end
>>>>>>>>>>>>>>>>>>>>>>>> CHILD EXIT CALL
>>>>>>>>>>>>>>>>>>>>>>>> CHILD BEGIN
>>>>>>>>>>>>>>>>>>>>>>>> Email call begin
2014-11-02 12:09:38     CLIENT -> SERVER: MAIL FROM:<test@dispostable.com>
2014-11-02 12:09:38     SERVER -> CLIENT:
2014-11-02 12:09:38     SMTP ERROR: MAIL FROM command failed:
2014-11-02 12:09:38     The following From address failed: test@dispostable.com : MAIL FROM command failed,,
Mailer Error: The following From address failed: test@dispostable.com : MAIL FROM command failed,,
>>>>>>>>>>>>>>>>>>>>>>>> Email call end
>>>>>>>>>>>>>>>>>>>>>>>> CHILD EXIT CALL
$
```

Another scenario is that after a while, like 3-4 childs I get this error message.

```
>>>>>>>>>>>>>>>>>>>>>>>> CHILD BEGIN 3
>>>>>>>>>>>>>>>>>>>>>>>> Email call begin 3
PHP Warning:  fwrite(): SSL: Broken pipe in /var/www/php_stream_socket_test/phpmailer/class.smtp.php on line 826
Mailer Error: The following From address failed: test@dispostable.com : MAIL FROM command failed,,
>>>>>>>>>>>>>>>>>>>>>>>> Email call end 3
```
