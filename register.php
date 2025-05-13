<?php
include_once 'config.php'; // Connexion à la base
session_start(); // Démarrer la session

// Vérifier si la requête est bien envoyée en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    // Vérifier si toutes les données sont bien envoyées
    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["contact"]) || empty($_POST["gender"]) || empty($_POST["password"])) {
        die("❌ Erreur : Certaines données sont manquantes !");
    }

    // Nettoyage des données
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $contact = htmlspecialchars(trim($_POST["contact"]));
    $gender = $_POST["gender"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(50));

    // Vérification email existant
    $check_email = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email->store_result();

    if ($check_email->num_rows > 0) {
        die("❌ Erreur : Cet email est déjà utilisé !");
    }
    $check_email->close();

    // Insertion sécurisée
    $stmt = $conn->prepare("INSERT INTO users (name, email, contact, gender, password, token) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("❌ Erreur lors de la préparation de la requête : " . $conn->error);
    }

    $stmt->bind_param("ssssss", $name, $email, $contact, $gender, $password, $token);

    if ($stmt->execute()) {
        // Stocker la réussite dans la session pour rediriger vers la page de confirmation
        $_SESSION["inscription_reussie"] = true;
        header("Location: confirmation.php");
        exit();
    } else {
        echo "❌ Erreur SQL : " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>