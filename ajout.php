<?php
// Connexion à la base
$host = "localhost";
$user = "root";
$password = "";
$dbname = "biblio_en_ligne";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Récupération sécurisée
$id_livre = isset($_POST['id_livre']) ? intval($_POST['id_livre']) : 0;
$id_lecteur = 1; // Fixe pour test
$date_emprunt = date('Y-m-d');

echo "<style>
    body {
        font-family: Arial, sans-serif;
        background-color: white;
        color: black;
        padding: 50px;
        text-align: center;
    }

    .message {
        font-size: 20px;
        margin-bottom: 20px;
        padding: 15px;
        border: 2px solid black;
        display: inline-block;
        border-radius: 8px;
    }

    .success {
        background-color: #e6e6e6;
    }

    .warning {
        background-color: #f5f5f5;
    }

    .error {
        background-color: #ffe6e6;
        color: red;
    }

    a {
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        color: black;
        font-weight: bold;
        border: 2px solid black;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.2s;
    }

    a:hover {
        background-color: black;
        color: white;
    }
</style>";

if ($id_livre === 0) {
    echo "<div class='message error'>⛔ Livre invalide. Veuillez réessayer.</div>";
    exit;
}

// Vérifier si le livre est déjà dans la liste
$check_sql = "SELECT COUNT(*) AS count FROM liste_lecture WHERE id_livre = $id_livre AND id_lecteur = $id_lecteur";
$check_result = mysqli_query($conn, $check_sql);
$row = mysqli_fetch_assoc($check_result);
$count = $row['count'];
?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Lecture</title>
    <link rel="shortcut icon" href="https://m.media-amazon.com/images/I/71HGjx+6NcL.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
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
<?php
// Si le livre est déjà dans la liste
if ($count > 0) {
    ?>
  
    <div>⚠️ Ce livre est déjà dans votre liste de lecture.</div>
    <div id="message" style="display:none;">📚 Vous avez surement lu ce bouquin déjà .</div>


    <style>
        #message {
            font-size: 20px;
            margin-bottom: 20px;
            padding: 15px;
            border: 2px solid black;
            display: inline-block;
            border-radius: 8px;
        }
    </style>
    <script>
            document.getElementById("message").style.display = "block";
            setTimeout(() => {
                document.getElementById("message").style.display = "none";
            }, 4000);
    </script>
    <a href="wishlist.php" class="btn">Voir votre liste de lecture</a>


<?php
} else {
    $insert_sql = "INSERT INTO liste_lecture (id_livre, id_lecteur, date_emprunt)
                   VALUES ($id_livre, $id_lecteur, '$date_emprunt')";
?>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout à la Liste de Lecture</title>
    <link rel="shortcut icon" href="https://m.media-amazon.com/images/I/71HGjx+6NcL.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
    
    <main class="contenu">
    <?php
    if (mysqli_query($conn, $insert_sql)) { ?>
        <div>✅ ✅ ✅</div>
         <div id="msg" style="display:none;">📚 Livre ajouté à votre liste de lecture avec succès. <br>
        Bon lecture à vous</div>

            <script>
            document.getElementById("msg").style.display = "block";
            setTimeout(() => {
                document.getElementById("msg").style.display = "none";
            }, 4000);
            </script>
        <a href="wishlist.php" class="btn">Voir votre liste de lecture</a>
    <?php
    } else { ?>
        <div>❌ Erreur lors de l'ajout : <?php echo mysqli_error($conn); ?></div>
    <?php
    }
}
?>
    </main>
    <footer>
        <p>&copy; 2025 Bibliothèque - Ma culture</p>
    </footer>
</body>
</html>
