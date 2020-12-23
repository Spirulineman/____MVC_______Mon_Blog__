<?php
 
/* *************|  MVC 1.3  |************   le lien vers un billet doit être modifié afin de refléter la nouvelle architecture. */


/* *************|  7.4  |************  modifier la vue vueAccueil.php afin d'ajouter un lien vers la page ==>> billet.php |  7.3  | sur le titre du billet.  ************************ */


/* *************|  4  |************  définir les valeurs des éléments spécifiques, puis de déclencher le rendu de notre gabarit. Pour cela, on utilise des fonctions PHP qui manipulent le flux de sortie de la page.  ************************ */
?>
<?php $titre = 'Mon Blog'; ?>

<?php ob_start(); ?>
<?php foreach ($billets as $billet) : ?>
    <article>
        <header>
            <!-- *************|  4  |<h1 class="titreBillet"></*?= $billet['titre'] ?></h1> -->

            <!-- <a href="</?= "billet.php?id=" . $billet['id'] ?>"> -->
<!-- /* *************| MVC 1.3 |************ -->
<a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
<!-- /* *************| MVC 1.3 |************ -->
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a>
            <time><?= $billet['date'] ?></time>
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>



<!-- /* *************|  2  |************  / HTML /  DECOUPLAGE AFFICHAGE ACCUEIL ************************ */ -->
<!-- RENDU -->
<!-- /* *************|  4  |************  à ne pas modifier ==>> CSS  -->
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="CSS/style.css" />
    <title>Mon Blog</title>
</head>
<!-- /* *************|  4  |************  FIN de : à ne pas modifier ==>> CSS  -->
<!--
                            <body>
                                <div id="global">
                                    <header>
                                        <a href="index.php">
                                            <h1 id="titreBlog">Mon Blog</h1>
                                        </a>
                                        <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
                                    </header>
                                    <div id="contenu">
                                        </?php
                                        foreach ($billets as $billet) : ?>
                                            <article>
                                                <header>
                                                    <h1 class="titreBillet"></?= $billet['titre'] ?></h1>
                                                    <time></?= $billet['date'] ?></time>
                                                </header>
                                                <p></?= $billet['contenu'] ?></p>
                                            </article>
                                            <hr />
                                        </?php endforeach; ?>
                                    </div> 
                                    <footer id="piedBlog">
                                        Blog réalisé avec PHP, HTML5 et CSS.
                                    </footer>
                                </div> 

                            </body>

                            </html> -->
<!-- /* *************|  2  |************  / HTML /  FIN DÉCOUPLAGE AFFICHAGE ACCUEIL ************************ */ -->


<!-- /* *************|  4  |************  FIN  définir les valeurs des éléments spécifiques, puis de déclencher le rendu de notre gabarit. Pour cela, on utilise des fonctions PHP qui manipulent le flux de sortie de la page.  ************************ */ -->

<!-- /* *************|  7.4  |************  modifier la vue vueAccueil.php afin d'ajouter un lien vers la page ==>> billet.php |  7.3  | sur le titre du billet.  ************************ */ -->