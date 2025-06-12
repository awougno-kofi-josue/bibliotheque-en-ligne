<?php

$host="localhost";
$user="root";
$password= "";
$dbname="biblio_en_ligne";



$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM livres WHERE id = $id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erreur de requête : " . mysqli_error($conn));
}

$row = mysqli_fetch_array($result);






?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Livre</title>
    <link rel="shortcut icon" href="https://m.media-amazon.com/images/I/71HGjx+6NcL.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <header>
        <h1>Détails du Livre</h1>
        <button onclick="window.location.href='index.html'" style="
    margin-bottom: 20px;
    background-color: white;
    border: 2px solid black;
    padding: 10px 15px;
    border-radius: 5px;
    color: black;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
">
  Retour à la recherche
</button>
    </header>

    <main>
        <div class="contenu">
            <h2><?php echo htmlspecialchars($row['titre']); ?></h2>
            <p><strong>Auteur :</strong> <?php echo htmlspecialchars($row['auteur']); ?></p>
            <p><strong> Nombre d'exemplaire disponible: </strong> <?php echo htmlspecialchars($row['nombre_exemplaire']); ?></p>
            <p><strong>Maison d'edition :</strong> <?php echo htmlspecialchars($row['maison_edition']); ?></p>
            <p><strong>Description :</strong> <?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
        </div>
    </main>

   <footer>
        <p>&copy; 2025 Bibliothèque - Ma culture</p>
    </footer>

</body>
</html>
