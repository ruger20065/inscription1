<?php
include 'config.php'; // Connexion à la base
?>

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    $sql = "UPDATE users SET email_verified = 1 WHERE token = '$token'";

    if ($conn->query($sql) === TRUE) {
        echo "Email vérifié avec succès !";
    } else {
        echo "Lien invalide.";
    }
}
?>