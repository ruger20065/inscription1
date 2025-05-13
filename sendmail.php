<?php
require 'chemin/vers/PHPMailer/src/Exception.php';
require 'chemin/vers/PHPMailer/src/PHPMailer.php';
require 'chemin/vers/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Utilisation du serveur SMTP de Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'marcwora16@gmail.com'; // Ton adresse Gmail
    $mail->Password = 'nsno mdro hssr pwon'; // Le mot de passe généré à l'étape 2
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Expéditeur et destinataire
    $mail->setFrom('tonadresse@gmail.com', 'TonNom');
    $mail->addAddress('destinataire@example.com', 'Destinataire');

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = 'Test de mail via Gmail SMTP';
    $mail->Body    = '<b>Ça fonctionne ! 🎉</b>';
    $mail->AltBody = 'Ça fonctionne !';

    // Envoi du message
    $mail->send();
    echo '✅ Message envoyé avec succès';
} catch (Exception $e) {
    echo "❌ Message non envoyé. Erreur : {$mail->ErrorInfo}";
}
?>
