<?php

$host="localhost";
$user="root";
$password= "";
$dbname="biblio_en_ligne";



$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$motCle = "%" . $_GET['recherche'] . "%";
$filtre = $_GET['filtre'] ?? 'auteur'; // valeur par défaut : auteur



$sql = "";
$params = [];
$types = "";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='https://m.media-amazon.com/images/I/71HGjx+6NcL.jpg' type='image/x-icon'>
    <link rel='stylesheet' href='css/style.css'>
    <title>Résultats de la Recherche</title>
    
</head>
<body>
    <header>
        <h1>Résultats de la Recherche</h1>
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
<?php

if ($filtre === 'titre') {
    $sql = "SELECT  id,titre, auteur FROM livres WHERE titre LIKE ?";
    $params = [$motCle];
    $types = "s";
} elseif ($filtre === 'auteur') {
    $sql = "SELECT  id,titre, auteur FROM livres WHERE auteur LIKE ?";
    $params = [$motCle];
    $types = "s";
} else { ?>


    <header>
        <h1>Erreur de Recherche</h1>
    </header>
    <main>
        <p class='resultat'>Veuillez vérifier le filtre de recherche et votre saisie.</p>
        <button onclick="window.location.href='index.php'" class="btn">Retour à la recherche</button>

<?php
    exit;
}

if ($stmt = mysqli_prepare($conn, $sql)) {
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class='resultat'>
                <h3><?php echo htmlspecialchars($row['titre']); ?></h3>

                <h3><strong>Auteur :</strong> <?php echo htmlspecialchars($row['auteur']); ?></h3>

                <a href="details.php?id=<?php echo $row['id']; ?>" class="btn">Voir détails</a>
            </div>
        <?php
        }
    } else { ?>
        <div class='resultat'>
            <p>Aucun résultat trouvé.</p>
        </div>
    </header>
        <p class='resultat'>Aucun résultat trouvé.</p>
    <?php
    }

    mysqli_close($conn);
} else {
    echo "Erreur de préparation de la requête : " . mysqli_error($conn);
}


    

if (!empty($types)) {
    mysqli_stmt_close($stmt);
} else {
    echo "Erreur de connexion à la base de données : " . mysqli_connect_error();
}
?>
    </main>
    <footer>
        <p>&copy; 2025 Bibliothèque - Ma culture</p>
    </footer>
</body>
</html>

