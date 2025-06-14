<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://m.media-amazon.com/images/I/71HGjx+6NcL.jpg" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color:rgb(19, 20, 19);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color:rgb(8, 8, 8);
        }
    </style>
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

        <label for="confirmation_mot_de_passe">Confirmer le mot de passe :</label>
        <input type="password" id="confirmation_mot_de_passe" name="confirmation_mot_de_passe" required>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
<?php
// inscription.php
// Connexion à la base de données
$host = "localhost";
$username = "root";
$password = "";
$dbname = "biblio_en_ligne";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirmation_mot_de_passe = $_POST['confirmation_mot_de_passe'];

    if ($mot_de_passe !== $confirmation_mot_de_passe) {
        die("Les mots de passe ne correspondent pas.");
    }

    $sql = "INSERT INTO lecteurs (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $nom, $prenom, $email, $mot_de_passe);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "Inscription réussie !";
    // Stocker les informations de l'utilisateur dans la session
    session_start();

    $_SESSION['email'] = $email; // Stocker l'email dans la session
    $_SESSION['nom'] = $nom; // Stocker le nom dans la session
    $_SESSION['prenom'] = $prenom; // Stocker le prénom dans la session
    $_SESSION['id'] = mysqli_insert_id($conn); // Stocker l'ID du lecteur dans la session
    $_SESSION['logged_in'] = true; // Marquer l'utilisateur comme connecté
    // Rediriger vers la page de recherche ou une autre page après l'inscription réussie
    header("Location: index.php");
    exit();
}
// Fermer la connexion à la base de données


mysqli_close($conn);