<?php

/* *************|  1  |************ CONNEXION ET REQUETE AFFICHAGE BILLET ***************** */

/**
 * Le code est devenu plus lisible, mais les problématiques de présentation et d'accès aux données sont toujours gérées au sein d'un même fichier PHP. En plus de limiter la modularité, ceci est contraire aux bonnes pratiques de développement PHP (norme PSR-1).

On peut aller plus loin dans le découplage en regroupant le code d'affichage précédent dans un fichier dédié nommé vueAccueil.php.==>> |  2  | DECOUPLAGE AFFICHAGE ACCUEIL
 */

 /* *************|  3  |************ DECOUPLAGE CONNEXION ET REQUETE AFFICHAGE BILLET ==>> Modele.php ***************** */

/* $bdd = new PDO(
    'mysql:host=localhost;dbname=dev_t_forum;charset=utf8',
    'root',
    ''
);
$billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
    . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
    . ' order by BIL_ID desc'); */

require 'Modele.php';

$billets = getBillets();
/* *************|  3  |************ FIN DECOUPLAGE CONNEXION ET REQUETE AFFICHAGE BILLET ==>> Modele.php ***************** */

/* *************|  1  |************ FIN CONNEXION ET REQUETE AFFICHAGE BILLET ************************ */

/* *************|  2  |************ / PHP / DÉCOUPLAGE AFFICHAGE ACCUEIL ************************ */
// Affichage
require 'vueAccueil.php';
/* *************|  2  |************ / PHP / FIN DÉCOUPLAGE AFFICHAGE ACCUEIL ************************ */

?>
<!-- /* *************|  2  |************ / HTML /  DÉCOUPLAGE AFFICHAGE ACCUEIL ************************ */ -->
<!-- <!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="CSS/style.css" />
    <title>Mon Blog</title>
</head>

<body> -->


<!-- <div id="global">
        <header>
            <a href="index.php">
                <h1 id="titreBlog">Mon Blog</h1>
            </a>
            <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
        </header>
        <div id="contenu"> -->

<!-- /* *************|  1  |************ CONNEXION ET REQUETE AFFICHAGE BILLET ************************ */ -->

<!-- //</?php
            /* $bdd = new PDO(
                'mysql:host=localhost;dbname=dev_t_forum;charset=utf8',
                'root',
                ''
            );
            $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' order by BIL_ID desc'); */ 
                
                

            /* *************|  1  |************ FIN CONNEXION ET REQUETE AFFICHAGE BILLET ************************ */-->
<!--  /** </?php
            foreach ($billets as $billet) : ?>
                <article>
                    <header>
                        <h1 class="titreBillet"></?= $billet['titre'] ?></h1>
                        <time></?= $billet['date'] ?></time>
                    </header>
                    <p></?= $billet['contenu'] ?></p>
                </article>
                <hr />
            </?php endforeach; ?> */
        </div> 
        <footer id="piedBlog">
            Blog réalisé avec PHP, HTML5 et CSS.
        </footer>
    </div>
</body>

</html> -->

<!-- /* *************|  2  |************  / HTML /  FIN DECOUPLAGE AFFICHAGE ACCUEIL ************************ */ -->