<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://m.media-amazon.com/images/I/71HGjx+6NcL.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil Bibliothèque -Ma culture</title>
</head>
<body>
    <header>

        <h1>Bienvenue à la Bibliothèque - Ma culture</h1>
        <nav class="navigation">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#collections">Collections</a></li>
                <li><a href="#recherche">Recherche</a></li>
                <li><a href="wishlist.php">Ma Liste de Lecture</a></li>
            </ul>
           
        </nav>
    </header>
    <main>
       <section id="accueil" class="contenu">
    <h2>Accueil</h2>
    <p>
        Bienvenue sur le site de la Bibliothèque <strong>Ma culture</strong>.
        Explorez nos collections et découvrez des ressources pour enrichir votre culture.
    </p>
    <p>
        Notre bibliothèque offre un large éventail de livres, revues et ressources numériques pour tous les âges et tous les intérêts.
        Nous sommes ouverts du <strong>lundi au samedi, de 9h à 18h</strong>.
    </p>
    <p>
        Pour plus d'informations, consultez notre section <a href="#contact">Contact</a>.
        Vous pouvez également <strong>rechercher, consulter et ajouter des ouvrages</strong> à votre liste de lecture  .
    </p>
    <p>
        Nous vous invitons à explorer nos collections et à profiter de nos services.
    </p>
    <p>S'inscrire sur notre site pour pouvoir créer une liste de lecture et y ajouter des livres.</p>
</section>

        <section id="collections" class="contenu">
            <h2>Nos Collections</h2>
            <p>Découvrez notre vaste collection de livres, revues et ressources numériques.</p>
            <ul>
                <li><strong>Fiction</strong> - Romans, nouvelles, et plus.</li>
                <li><strong>Non-fiction</strong> - Histoire, sciences, arts, etc.</li>
                <li><strong>Revues</strong> - Accès à des publications périodiques.</li>
                <li><strong>Ressources numériques</strong> - Livres électroniques et audiobooks.</li>
            </ul>
        </section>
<section id="recherche" class="contenu">
    <h2>Recherche</h2>
    <p>Utilisez notre moteur de recherche pour trouver des ouvrages spécifiques.</p>
    <form action="resultat.php" method="get">
        <fieldset>
            <legend>Filtrer la recherche</legend>

            <input type="radio" name="filtre" id="titre" value="titre" >
            <label for="titre">Titre</label>

            <input type="radio" name="filtre" id="auteur" value="auteur" checked>
            <label for="auteur">Auteur</label>
        </fieldset>


        <br>

        <label for="recherche">Mot-clé :</label>
        <input type="text" id="recherche" name="recherche" placeholder="Rechercher un livre, un auteur..." required>

        <button type="submit">Rechercher</button>
    </form>
</section>

        </section>
        <section id="contact" class="contenu">
            <h2>Contact</h2>
            <p>Pour toute question, n'hésitez pas à nous contacter.</p>
        </section>

    </main>
    <footer>
        <p>&copy; 2025 Bibliothèque - Ma culture</p>
    </footer>
</body>
</html>
