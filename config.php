<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "utilisateurs";

// Connexion à la base de données
$conn = new mysqli($server, $username, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("❌ Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Définir l'encodage UTF-8
$conn->set_charset("utf8");
?>
