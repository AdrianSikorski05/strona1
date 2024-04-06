

<?php
        
        require("PHPMailer/class.phpmailer.php"); 
		require("PHPMailer/class.smtp.php"); 

        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $msg = $_POST['msg'];

    
        

        $mail = new PHPMailer;
 
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->CharSet = 'UTF-8';
        //$mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers      
        $mail->SMTPAuth = true;                              // Enable SMTP authentication
        $mail->Username = 'adrian.sikorski62@gmail.com';                 // SMTP username
        $mail->Password = 'filnmfxbqejtodpv';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                     // TCP port to connect to
 
        $mail->setFrom($email, $name);
        $mail->addAddress('adrian.sikorski62@gmail.com');       // Name is optional
        $mail->addReplyTo($email, $name);
 
        $mail->isHTML(true);
        $mail->Subject = 'Nowa wiadomość od ' . $name;
        $mail->Body    = "Imię i Nazwisko: $name<br>Email: $email<br>Numer telefonu: $tel<br>Wiadomość: $msg";
 
        if(!$mail->send()) {
            echo 'Wiadomość nie została wysłana.';
            echo 'Błąd: ' . $mail->ErrorInfo;
        } else {
            // Przekierowanie na stronę thanks.html
            header('Location: thanks.html');
            exit(); // Upewniamy się, że żadna dodatkowa zawartość nie jest wysyłana użytkownikowi
        }
    
 
?>