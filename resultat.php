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
$filtre = $_GET['filtre'] ?? 'titre'; // valeur par défaut : titre


$sql = "";
$params = [];
$types = "";

if ($filtre === 'titre') {
    $sql = "SELECT  id,titre, auteur FROM livres WHERE titre LIKE ?";
    $params = [$motCle];
    $types = "s";
} elseif ($filtre === 'auteur') {
    $sql = "SELECT  id,titre, auteur FROM livres WHERE auteur LIKE ?";
    $params = [$motCle];
    $types = "s";
} else { ?>
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
        <p class='resultat'>Veuillez vérifier le filtre de recherche et votre saisie.</p>
    </main>
    <footer>
        <p>&copy; 2025 Bibliothèque - Ma culture</p>
    </footer>
</body>
</html>
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
    <h1>Résultats de la Recherche</h1>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class='resultat'>
                <h3><?php echo htmlspecialchars($row['titre']); ?></h3>
                <p>Auteur : <?php echo htmlspecialchars($row['auteur']); ?></p>
                <a href='details.php?id=<?php echo urlencode($row['id']); ?>' class='btn'>Voir détails</a>
            </div>
        <?php
        }
    } else { ?>
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
        <p class='resultat'>Aucun résultat trouvé.</p>
    <?php
    }

    mysqli_close($conn);
} else {
    echo "Erreur de préparation de la requête : " . mysqli_error($conn);
}

?>
    </main>
    <footer>
        <p>&copy; 2025 Bibliothèque - Ma culture</p>
        
    </footer>
</body>
</html>
<?php
if (!empty($types)) {
    mysqli_stmt_close($stmt);
} else {
    echo "Erreur de connexion à la base de données : " . mysqli_connect_error();
}