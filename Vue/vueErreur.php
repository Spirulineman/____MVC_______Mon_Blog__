<?php 

/* *************|  6.3.1  |************  On peut souhaiter conserver l'affichage du gabarit des vues même en cas d'erreur. Il suffit de définir une vue vueErreur.php dédiée à leur affichage. ==> 

***************** */

$titre = 'Mon Blog'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?= $msgErreur ?></p>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; 

/* *************|  6.3.1  |************  FIN : On peut souhaiter conserver l'affichage du gabarit des vues même en cas d'erreur. Il suffit de définir une vue vueErreur.php dédiée à leur affichage. ==> 

***************** */

?>