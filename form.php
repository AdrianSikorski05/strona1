<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Zdefiniuj odbiorcę e-mail
    $to = "adi52@tlen.pl";

    // Pobierz dane z formularza
    $name = $_POST["name"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $comment = $_POST["comment"];

    // Utwórz wiadomość e-mail
    $subject = "Nowa wiadomość od $name";
    $message = "Imię i nazwisko: $name\n";
    $message .= "Email: $email\n";
    $message .= "Telefon: $tel\n";
    $message .= "Wiadomość: $comment\n";

    // Ustaw nagłówki wiadomości
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Wyślij e-mail
    if (mail($to, $subject, $message, $headers)) {
        // Przekieruj użytkownika na stronę podziękowania
        header("Location: ThankYou.html");
        exit; // Upewnij się, że żadne inne treści nie są wysyłane
    } else {
        echo "Wystąpił problem podczas wysyłania wiadomości.";
    }
}
?>