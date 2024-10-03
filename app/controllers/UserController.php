<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$db = 'project';
$user = 'root';
$pass = 'new_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

session_start();

class UserController {
    private $pdo; // Define the PDO property

    public function __construct() {
        global $pdo; // Access the global $pdo variable from the config file
        $this->pdo = $pdo; // Assign the global $pdo to the class property
    }

    public function login() {
        // Vérifie si les données sont soumises
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'] ; 
            $password = $_POST['password'];
    
            // Prépare et exécute la requête pour vérifier si l'utilisateur existe
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
    
            // Vérifie si l'utilisateur est trouvé
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Vérifie le mot de passe
                if (password_verify($password, $user['password'])) {
                    // Connexion réussie
                    $_SESSION['user_id'] = $user['id'];
                    // Redirection vers la page après connexion
                    header("Location: ../app/views/classes2.php");
                    exit(); // Sortir du script après la redirection
                } else {
                    return "Erreur : Mot de passe incorrect.";
                }
            } else {
                return "Erreur : Nom d'utilisateur introuvable.";
            }
        }
        return "Erreur : Les données de connexion sont manquantes.";
    }
    
    
    public function signup() {
        // Vérifie si la méthode de requête est POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
            // Vérifiez si le nom d'utilisateur existe déjà
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                echo "Erreur : Le nom d'utilisateur existe déjà.";
                return; // Sortir de la méthode si l'utilisateur existe
            }
    
            // Si l'utilisateur n'existe pas, procéder à l'insertion
            $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $passwordHash);
    
            if ($stmt->execute()) {
                header("Location: ../public/index.php");
                exit();
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    }
    

    public function addRecipe() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $title = $_POST['title'];
            $description = $_POST['description'];
            $ingredients = $_POST['ingredients'];
            $steps = $_POST['steps'];
            $calories = $_POST['calories'];
    
            // Gestion de l'upload d'image
            $target_dir = "/var/www/html/Cooking/public/assets/images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            // Vérifiez le type de fichier image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check === false) {
                die("File is not an image.");
            }
    
            // Déplacer l'image téléchargée
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Préparer et lier
                $stmt = $this->pdo->prepare("INSERT INTO recipes (titre, description, ingredients, etapes, calories, image, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
                
                // Utilisez bindValue au lieu de bind_param
                $stmt->bindValue(1, $title);
                $stmt->bindValue(2, $description);
                $stmt->bindValue(3, $ingredients);
                $stmt->bindValue(4, $steps);
                $stmt->bindValue(5, $calories);
                $stmt->bindValue(6, $target_file);
                $stmt->bindValue(7, $_SESSION['user_id']);
    
                // Exécuter la requête
                if ($stmt->execute()) {
                    echo "Nouvelle recette créée avec succès.";
                } else {
                    echo "Erreur : " . implode(", ", $stmt->errorInfo()); // Affiche les erreurs
                }
    
                // Fermer la connexion
                $stmt = null; // Libère les ressources
            } else {
                die("Désolé, une erreur s'est produite lors du téléchargement de votre fichier.");
            }
        }
    }
    public function deleteRecipe($id) {
        // Préparer la requête de suppression
        $stmt = $this->pdo->prepare("DELETE FROM recipes WHERE id = ? AND user_id = ?");
        
        // Bind des valeurs
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $_SESSION['user_id']);
        
        // Exécuter la requête
        if ($stmt->execute()) {
            echo "Recette supprimée avec succès.";
        } else {
            echo "Erreur : " . implode(", ", $stmt->errorInfo()); // Affiche les erreurs
        }
    
        // Fermer la connexion
        $stmt = null; // Libère les ressources
    }
    // Méthode pour mettre à jour une recette
    public function updateRecipe() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer l'ID de la recette à mettre à jour
            $id = $_GET['id'];

            // Récupérer les données du formulaire
            $title = $_POST['title'];
            $description = $_POST['description'];
            $ingredients = $_POST['ingredients'];
            $steps = $_POST['steps'];
            $calories = $_POST['calories'];

            // Gestion de l'upload d'image (facultatif)
            $target_dir = "/var/www/html/Cooking/public/assets/images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $imagePath = '';

            // Vérifiez si une nouvelle image a été téléchargée
            if (!empty($_FILES["image"]["name"])) {
                // Vérifiez le type de fichier image
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check === false) {
                    die("Le fichier n'est pas une image.");
                }

                // Déplacer l'image téléchargée
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $imagePath = $target_file; // Nouveau chemin d'image
                } else {
                    die("Désolé, une erreur s'est produite lors du téléchargement de votre fichier.");
                }
            }

            // Préparer et exécuter la requête de mise à jour
            if ($imagePath) {
                // Si une nouvelle image est fournie, mettez à jour l'image dans la requête
                $sql = "UPDATE recipes SET titre = ?, description = ?, ingredients = ?, etapes = ?, calories = ?, image = ? WHERE id = ?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$title, $description, $ingredients, $steps, $calories, $imagePath, $id]);
            } else {
                // Si aucune nouvelle image n'est fournie, ne mettez pas à jour l'image
                $sql = "UPDATE recipes SET titre = ?, description = ?, ingredients = ?, etapes = ?, calories = ? WHERE id = ?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$title, $description, $ingredients, $steps, $calories, $id]);
            }

            echo "Recette mise à jour avec succès.";
            header("Location: index.php"); // Redirigez vers la page principale après la mise à jour
            exit();
        }
    }
}
?>
