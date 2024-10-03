<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login Form</title>
    <style>
        /* Reset des marges */
body {
    margin: 0;
}

/* Style des placeholders */
::-webkit-input-placeholder, /* Chrome/Opera/Safari */
::-moz-placeholder, /* Firefox 19+ */
:-ms-input-placeholder, /* IE 10+ */
:-moz-placeholder { /* Firefox 18- */
    color: white;
}

/* Container principal */
.main {
    height: 100vh;
    background: url('https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Boîte de connexion */
.box {
    height: 450px;
    width: 380px;
    background: rgba(0, 0, 0, 0.53);
    display: flex;
    color: white;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: absolute;
    z-index: 2;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    padding: 7px;
}

/* Formulaire */
form {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 100%; /* Assurez-vous que le formulaire prend toute la largeur de la boîte */
}

/* En-tête */
.header {
    font-size: 60px;
    font-family: 'Sacramento';
    opacity: 1;
}

/* Champs de saisie */
input {
    box-shadow: 0;
    border: none;
    border-radius: 0;
    background-color: transparent;
    border-bottom: 2px solid white;
    font-family: 'Roboto', sans-serif;
    width: 270px; /* Ajusté pour s'adapter aux deux formulaires */
    height: 40px;
    margin-top: 20px;
    color: white;
    font-size: 16px;
    padding-left: 5px;
}

input:focus {
    outline: none;
    border-bottom: 2px solid #ef5350;
    transition: border-color 0.5s cubic-bezier(0, .92, .57, 1.07);
}

/* Boutons */
.butt {
    height: 35px;
    width: 280px;
    background-color: #ef5350;
    border: 0;
    font-family: 'Roboto';
    box-shadow: 0 4px 7px rgba(0, 0, 0, 0.3);
    margin-top: 40px;
    color: white;
    font-size: 15px;
    border-radius: 0.15em;
}

.butt:hover {
    background-color: white;
    color: #ef5350;
    cursor: pointer;
}

/* Liens d'inscription */
.signup {
    margin-top: 17px;
    font-size: 14px;
    text-align: center; /* Centre le texte pour un meilleur alignement */
}

.link {
    text-decoration: none;
    color: #ff8a80;
}

/* Styles responsifs */
@media only screen and (max-width: 433px) {
    .box {
        height: 420px;
        width: 300px;
        margin-top: 20px;
    }

    input {
        width: 240px;
    }
}
</style>
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
    <script>
        // Gestion de l'affichage des formulaires de connexion et d'inscription
document.getElementById("show-signup").addEventListener("click", function() {
    document.getElementById("login-form").style.display = "none";
    document.getElementById("signup-form").style.display = "flex"; // Affiche le formulaire d'inscription
});

document.getElementById("show-login").addEventListener("click", function() {
    document.getElementById("signup-form").style.display = "none";
    document.getElementById("login-form").style.display = "flex"; // Affiche le formulaire de connexion
});
</script>
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
                   /* header("Location:page.html");*/
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
