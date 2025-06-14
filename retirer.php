<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "biblio_en_ligne";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM liste_lecture WHERE id_livre = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: wishlist.php");
        exit();
    } else {
        echo "Erreur lors du retrait du livre : " . mysqli_error($conn);
        header("Location: wishlist.php?error=1");
        exit();
    }
}

mysqli_close($conn);
?>