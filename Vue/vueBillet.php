<?php

/* *************|  7.2  |************  affichage des détails d'un billet : le clic sur le titre d'un billet du blog doit afficher sur une nouvelle page le contenu et les commentaires associés à ce billet.  

 cette vue définit les éléments dynamiques $titre et $contenu, puis inclut le gabarit commun.

***************** */

$titre = "Mon Blog - " . $billet['titre']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        <time><?= $billet['date'] ?></time>
    </header>
    <p><?= $billet['contenu'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire) : ?>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>

<!-- RENDU -->

<!-- /* ******************** CSS ************************ */ -->

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="CSS/style.css" />
    <title>Mon Blog</title>
</head>

<!-- /* ******************** CSS ************************ */ -->

<?
/* *************| 7.2 |************ affichage des détails d'un billet : le clic sur le titre d'un billet du blog doit afficher sur une nouvelle page le contenu et les commentaires associés à ce billet. ***************** */
?>