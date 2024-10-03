<?php
require_once '../config/config.php'; // Inclusion du fichier de configuration
require_once '../controllers/UserController.php'; // Chemin vers UserController.php


$userController = new UserController(); // Créez une instance de UserController

if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

// Appel de la méthode pour ajouter une recette
$userController->addRecipe();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create Recipe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .main {
            height: 140vh;
            background: url('https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
            border-radius: 1rem;
        }
        .card-body {
            padding: 1.5rem 1.5rem;
        }
    </style>
</head>
<body>
<div class="main">
    <div class="container-fluid">
        <div class="container">
            <form method="POST" enctype="multipart/form-data">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h6 mb-4">Recipe Information</h3>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ingredients</label>
                            <textarea name="ingredients" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Steps</label>
                            <textarea name="steps" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Calories</label>
                            <input type="number" name="calories" class="form-control" required>
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label">Recipe Image</label>
                            <input class="form-control" type="file" name="image" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
