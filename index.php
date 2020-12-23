<?php

/**
 * Mise en œuvre d'un contrôleur frontal (front controller):
---------------------------------------------------------------------------------
    L'architecture actuelle, basée sur n contrôleurs indépendants, souffre de certaines limitations :

    - elle expose la structure interne du site (noms des fichiers PHP) ;
    - elle rend délicate l'application de politiques communes à tous les contrôleurs (authentification, sécurité, etc.).

Pour remédier à ces défauts, il est fréquent d'ajouter au site un contrôleur frontal.

Le contrôleur frontal constitue le point d'entrée unique du site. Son rôle est de centraliser la gestion des requêtes entrantes. Il utilise le service d'un autre contrôleur pour réaliser l'action demandée et renvoyer son résultat sous la forme d'une vue.

Un choix fréquent consiste à transformer le fichier principal index.php en contrôleur frontal. Nous allons mettre en œuvre cette solution.

Ce changement d'architecture implique un changement d'utilisation du site. Voici comment fonctionne actuellement notre blog :

    - l'exécution de index.php permet d'afficher la liste des billets ;
    - l'exécution de billet.php?id=<id du billet> affiche les détails du billet identifié dans l'URL.

La mise en œuvre d'un contrôleur frontal implique que index.php recevra à la fois les demandes d'affichage de la liste des billets et les demandes d'affichage d'un billet précis. Il faut donc lui fournir de quoi lui permettre d'identifier l'action à réaliser. Une solution courante est d'ajouter à l'URL un paramètre action. Dans notre exemple, voici comment ce paramètre sera interprété :

    - si action vaut « billet », le contrôleur principal déclenchera l'affichage d'un billet ;
    - si action n'est pas valorisé (définit), le contrôleur déclenchera l'affichage de la liste des billets (action par défaut).

Toutes les actions réalisables sont rassemblées sous la forme de fonctions dans le fichier ==>> Controleur.php |  MVC 1.1  |.

La mise en œuvre d'un contrôleur frontal permet de préciser les responsabilités et de clarifier la dynamique de la partie Contrôleur de notre site :

    - Le contrôleur frontal analyse la requête entrante et vérifie les paramètres fournis ;
    - Il sélectionne et appelle l'action à réaliser en lui passant les paramètres nécessaires ;
    - Si la requête est incohérente, il signale l'erreur à l'utilisateur.

Autre bénéfice : l'organisation interne du site est totalement masquée à l'utilisateur, puisque seul le fichier index.php est visible dans les URL. Cette encapsulation facilite les réorganisations internes.

Remarque : l'ancien fichier contrôleur billet.php est désormais inutile et peut être supprimé.


    --------------------------------------------------------------------------------

 *************|  MVC 2  |************  Réorganisation des fichiers source :

    Par souci de simplicité, nous avons jusqu'à présent stocké tous nos fichiers source dans le même répertoire. À mesure que le site gagne en complexité, cette organisation montre ses limites. Il est maintenant difficile de deviner le rôle de certains fichiers sans les ouvrir pour examiner leur code.

    Nous allons donc restructurer notre site. La solution la plus évidente consiste à créer des sous-répertoires en suivant le découpage MVC :

        - le répertoire : Modele contiendra le fichier Modele.php ;
        - le répertoire : Vue contiendra les fichiers : 

                        . vueAccueil.php, 
                        . vueBillet.php 
                        . vueErreur.php
                        . gabarit.php (page commune)

        - le répertoire : Controleur contiendra le fichier des actions Controleur.php.

        - un répertoire : Contenu pour les contenus statiques (fichier CSS, images, etc.) 
        - un répertoire : BD pour le script de création de la base de données.


    Notre blog d'exemple est maintenant structuré selon les principes du modèle MVC, avec une séparation nette des responsabilités entre composants qui se reflète dans l'organisation des sources. 

    Notre solution est avant tout procédurale : les actions du contrôleur et les services du modèle sont implémentés sous la forme de fonctions. 
    
    L'amélioration de l'architecture passe maintenant par la mise en œuvre des concepts de ==>> la programmation orientée objet 
    * ==>>  |  MVC I-n.n  |

    -------------------------------------------------------------------------------- */
?>


<?php
/* *************|  MVC 1.2  |************  fichier index.php de notre blog, réécrit sous la forme d'un contrôleur frontal */


require('Controleur/Controleur.php');

try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'billet') {
      if (isset($_GET['id'])) {
        $idBillet = intval($_GET['id']);
        if ($idBillet != 0)
          billet($idBillet);
        else
          throw new Exception("Identifiant de billet non valide");
      }
      else
        throw new Exception("Identifiant de billet non défini");
    }
    else
      throw new Exception("Action non valide");
  }
  else {
    accueil();  // action par défaut
  }
}
catch (Exception $e) {
    erreur($e->getMessage());
}

    /* *************|  6.3.2  |************  On peut souhaiter conserver l'affichage du gabarit des vues même en cas d'erreur. Il suffit de définir une vue vueErreur.php dédiée à leur affichage. ==> vueErreur.php  |  6.3.1  |

    ***************** */

        /* *************|  6.2  |************  Le premier require inclut uniquement la définition d'une fonction et est placé en dehors du bloc try. Le reste du code est placé à l'intérieur de ce bloc. Si une exception est levée lors de son exécution, une page HTML minimale contenant le message d'erreur est affichée.

        ***************** */

        /* require 'Modele.php';

        $billets = getBillets();

        require 'vueAccueil.php'; */


        /* require 'Modele.php';

        try {
            $billets = getBillets();
            require 'vueAccueil.php';

        } catch (Exception $e) {

    /* ********|  6.3.2  |************ ERREUR  */
    /* $msgErreur = $e->getMessage();
    require 'vueErreur.php'; */

            /*********|  6.2  |==>>|  6.3.2  | echo '<html><body>Erreur ! ' . $e->getMessage() . '</body></html>';*/

    /* ********|  6.3.2  |************ ERREUR  */
        //}

        

        /* *************|  6.2  |************  FIN  Le premier require inclut uniquement la définition d'une fonction et est placé en dehors du bloc try. Le reste du code est placé à l'intérieur de ce bloc. Si une exception est levée lors de son exécution, une page HTML minimale contenant le message d'erreur est affichée.

        ***************** */

    /* *************|  6.3.2  |************  FIN : On peut souhaiter conserver l'affichage du gabarit des vues même en cas d'erreur. Il suffit de définir une vue vueErreur.php dédiée à leur affichage. ==> vueErreur.php  |  6.3.1  |

    ***************** */



/* *************|  MVC 1.2  |************  FIN : fichier index.php de notre blog, réécrit sous la forme d'un contrôleur frontal */