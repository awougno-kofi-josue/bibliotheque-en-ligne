<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "biblio_en_ligne";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$sql = "SELECT livres.titre, livres.auteur, liste_lecture.date_emprunt, livres.id, liste_lecture.date_retour
FROM liste_lecture
JOIN livres ON liste_lecture.id_livre = livres.id
WHERE liste_lecture.id_lecteur = 1";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erreur de requête : " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Lecture</title>
    <link rel="shortcut icon" href="https://m.media-amazon.com/images/I/71HGjx+6NcL.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body >
    <header >
        <h1>Liste de Lecture</h1>
         <button onclick="window.location.href='index.php'" style="
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

    <main class="contenu">
        <h2>Vos Livres Empruntés</h2>
        <div>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="livre">
                    <h3><?php echo htmlspecialchars($row['titre']); ?></h3>
                    <p><strong>Auteur :</strong> <?php echo htmlspecialchars($row['auteur']); ?></p>
                    <p><strong>Date d'emprunt :</strong> <?php echo htmlspecialchars($row['date_emprunt']); ?></p>
                    <p><strong>Date de retour : ---</p>
                    <div class="actions">
                        <button onclick="window.location.href='lire.php?id=<?php echo $row['id']; ?>'" target="_blank" class="btn">Lire</button>
                        <button onclick="if (confirmerSuppression()) { window.location.href='retirer.php?id=<?php echo $row['id']; ?>'; }" class="btn">Retirer</button>
                    </div>
                    <script src="script.js"></script>
                    <hr>
                </div>
            <?php } ?>
        </div>
        <p>Nombre total de livres empruntés : <?php echo mysqli_num_rows($result); ?></p>
    </main>

    <footer>
        <p>&copy; 2025 Bibliothèque - Ma culture</p>
    </footer>
</body>
</html>
<?php
} else {
    ?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Lecture</title>
    <link rel="shortcut icon" href="https://m.media-amazon.com/images/I/71HGjx+6NcL.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header >
        <h1>Liste de Lecture</h1>
        <button onclick="window.location.href='index.php'" class="btn">Retour à l'accueil</button>
    </header>
    <main class="contenu">
        <h2>Votre liste de lecture est vide.</h2>
        <p>Vous n'avez pas encore emprunté de livres. Commencez à explorer notre collection !</p>
        <button onclick="window.location.href='index.php'" class="btn">Explorer les livres</button>
    </main>
    <footer class="footer">
        <p>&copy; 2025 Bibliothèque - Ma culture</p>
    </footer>
</body>
</html>
<?php
}
mysqli_close($conn);


// Moi je compte faire de ce projet un site de bibliotheque en ligne vraiment complet
//  où l'utilisateur doit s'inscrire pour pouvoir créer une liste de lecture et y ajouter des livres.
// Merci pour l'accompagnement et l'aide que vous nous avez apporté durant ce projet.
?>