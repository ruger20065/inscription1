<?php
session_start(); // Démarrer la session

// Vérifier si l'inscription a été réussie
if (!isset($_SESSION["inscription_reussie"])) {
    header("Location: register.php"); // Rediriger vers l'inscription si pas de session active
    exit();
}

// Supprimer la variable après affichage pour éviter l'accès direct à la page
unset($_SESSION["inscription_reussie"]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription réussie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .message {
            font-size: 20px;
            color: green;
        }
        .btn {
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1 class="message">✅ Inscription réussie !</h1>
    <p>Bienvenue ! Vous êtes maintenant inscrit.</p>
    <a class="btn" href="login.php">Se connecter</a>
</body>
</html>