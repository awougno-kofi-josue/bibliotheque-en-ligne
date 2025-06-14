<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "biblio_en_ligne";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id === 0) {
    die("ID invalide.");
}

$sql = "SELECT titre FROM livres WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) === 0) {
    die("Livre introuvable.");
}

$row = mysqli_fetch_assoc($result);
$titre = trim($row['titre']);

// Encoder proprement le titre pour l’URL Gallica
$titre_enc = urlencode($titre);

// Construire le lien SRU vers Gallica
$url = "https://gallica.bnf.fr/services/engine/search/sru?operation=searchRetrieve&version=1.2&query=(gallica%20all%20%22" . $titre_enc . "%22)&lang=fr&suggest=0";

// Redirection
header("Location: $url");
exit;
?>
