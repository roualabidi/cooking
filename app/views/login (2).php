<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$host = 'localhost';
$db = 'project';
$user = 'root';
$pass = 'new_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST['action'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Affichage des valeurs pour débogage
        echo "Action: $action, Username: $username, Password: $password";

        if ($action == "login") {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    /*header("Location: ajouter_recette.php");
                    exit();
                } else {
                    echo "Mot de passe incorrect.";*/
                }
            } else {
                echo "Nom d'utilisateur introuvable.";
            }
        } elseif ($action == "signup") {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':password', $passwordHash);
            
            if ($stmt->execute()) {
                echo "Inscription réussie ! Vous pouvez vous connecter.";
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
