<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Daten aus dem Formular auslesen
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $message = htmlspecialchars($_POST['message']);

    // Deine E-Mail-Adresse
    $to = "roggefabien@gmail.com";

    // Betreff der E-Mail
    $subject = "Neue Buchungsanfrage von $name";

    // Inhalt der E-Mail
    $email_body = "
    Name: $name\n
    E-Mail: $email\n
    Telefon: $phone\n
    Wunschdatum: $date\n
    Nachricht: $message
    ";

    // E-Mail-Header
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // E-Mail senden
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Vielen Dank, $name! Deine Buchungsanfrage wurde erfolgreich gesendet.";
    } else {
        echo "Entschuldigung, es gab ein Problem beim Senden deiner Anfrage. Bitte versuche es später erneut.";
    }
} else {
    echo "Ungültige Anfrage.";
}


header("Content-Type: application/json");

// Beispiel: Events aus einer Datenbank laden (hier als statisches Array)
$events = [
    [
        "title" => "Drohnenaufnahme Hochzeit",
        "start" => "2024-11-28",
        "end" => "2024-11-28",
    ],
    [
        "title" => "Eventfilm Firmenfeier",
        "start" => "2024-12-05",
        "end" => "2024-12-05",
    ],
    [
        "title" => "Landschaftsfotografie",
        "start" => "2024-12-10",
        "end" => "2024-12-12",
    ],
];

echo json_encode($events);
?>