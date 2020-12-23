<?php

/* *************|  MVC 1.1  |************  */

require 'Modele/Modele.php';
//require_once 'Billet.php';

// Affiche la liste de tous les billets du blog
function accueil()
{
    $billets = getBillets();
    require 'vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($idBillet)
{
    $billet = getBillet($idBillet);
    $commentaires = getCommentaires($idBillet);
    require 'vueBillet.php';
}

// Affiche une erreur
function erreur($msgErreur)
{
    require 'vueErreur.php';
}

/* *************|  MVC 1.1  |************  */
