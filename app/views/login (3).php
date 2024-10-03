<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/login.css"> <!-- Chemin vers votre CSS -->
    <title>Login Form</title>
</head>
<body>
    <div class="main">
        <div class="box effect7">
            <div class="header">Welcome!</div>
            <form id="login-form" action="../../app/views/login.php" method="POST"> <!-- Chemin vers login.php -->
                <input type="hidden" name="action" value="login"> <!-- Action pour le formulaire de connexion -->
                <input type="text" name="username" placeholder="username" required>
                <input type="password" name="password" placeholder="password" required>
                <button type="submit" class="butt">Submit</button>
                <span class="signup">Don't have an account?&nbsp;<a href="#" class="link" id="show-signup">Sign up</a></span>
            </form>
            <form id="signup-form" action="../../app/views/login.php" method="POST" style="display: none;"> <!-- Chemin vers login.php -->
                <input type="hidden" name="action" value="signup"> <!-- Action pour le formulaire d'inscription -->
                <input type="text" name="username" placeholder="username" required>
                <input type="email" name="email" placeholder="email" required> <!-- Ajoutez email pour l'inscription -->
                <input type="password" name="password" placeholder="password" required>
                <button type="submit" class="butt">Sign Up</button>
                <span class="signup">Already have an account?&nbsp;<a href="#" class="link" id="show-login">Login</a></span>
            </form>
        </div>
    </div>
    <script src="../../../public/assets/js/login.js"></script> <!-- Chemin vers votre JS -->
</body>
</html>


<?php
session_start();
$_SESSION['user_id'] = $user_id; 
$host = 'localhost';
$db = 'project';
$user = 'root';
$pass = 'new_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie à la base de données."; // Commenté pour éviter d'afficher sur le site

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST['action'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($action == "login") {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    header("Location: ");
exit();

                } else {
                    echo "Mot de passe incorrect.";
                }
            } else {
                echo "Nom d'utilisateur introuvable.";
            }
        } elseif ($action == "signup") {
            // Ajoutez ici le champ email si nécessaire
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $_POST['email']); // Récupérer l'email du formulaire
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
?>
