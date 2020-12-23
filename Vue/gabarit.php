<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title><?= $titre ?></title> <!-- $titre = Élément spécifique ==>> déclenche le rendu de notre gabarit. Pour cela, on utilise des fonctions PHP qui manipulent le flux de sortie de la page ==>> vueAccueil.php.    |  4  |  -->
</head>

<body>
    <div id="global">
        <header>
            <a href="index.php">
                <h1 id="titreBlog">Mon Blog</h1>
            </a>
            <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
        </header>
        <div id="contenu">
            <?= $contenu ?>
            <!-- $contenu = Élément spécifique ==>> déclenche le rendu de notre gabarit. Pour cela, on utilise des fonctions PHP qui manipulent le flux de sortie de la page ==>> vueAccueil.php.    |  4  |  -->
        </div>
        <footer id="piedBlog">
            Blog réalisé avec PHP, HTML5 et CSS.
        </footer>
    </div> <!-- #global -->
</body>

</html>