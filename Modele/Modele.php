<?php

/* *************|  MVC I-2.2  |************ La classe Modele est désormais abstraite (mot-clé abstract) et fournit à ses classes dérivées un service d'exécution d'une requête SQL */



abstract class Modele {

    // Objet PDO d'accès à la BD
    private $bdd;

    // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null)
    {
        if ($params == null
        ) {
            $resultat = $this->getBdd()->query($sql);    // exécution directe
        } else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
    private function getBdd()
    {
        if ($this->bdd == null) {
            // Création de la connexion
            $this->bdd = new PDO(
                'mysql:host=localhost;dbname=monblog;charset=utf8',
                'root',
                '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        }
        return $this->bdd;
    }

    
}


    /* *************|  MVC I-1  |************ définir les services d'accès aux données en tant que méthodes et non comme simples fonctions. Voici une première version de la classe Modele.php.  

    la seule réelle avancée offerte par cette classe est l'encapsulation (mot-clé private) de la méthode de connexion à la base. De plus, elle regroupe des services liés à des entités distinctes (billets et commentaires), ce qui est contraire au principe de cohésion forte, qui recommande de regrouper des éléments (par exemple des méthodes) en fonction de leur problématique.

    Une meilleure solution consiste à créer un modèle par entité du domaine, tout en regroupant les services communs dans une superclasse commune. 

    On peut écrire la classe Billet, en charge de l'accès aux données des billets ==>> Billet.php |  MVC I-2  |

    */

    /* class Modele
    {

        // Renvoie la liste des billets du blog
        public function getBillets()
        {
            $bdd = $this->getBdd();
            $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' order by BIL_ID desc');
            return $billets;
        }

        // Renvoie les informations sur un billet
        public function getBillet($idBillet)
        {
            $bdd = $this->getBdd();
            $billet = $bdd->prepare('select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' where BIL_ID=?');
            $billet->execute(array($idBillet));
            if ($billet->rowCount() == 1)
            return $billet->fetch();  // Accès à la première ligne de résultat
            else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
        }

        // Renvoie la liste des commentaires associés à un billet
        public function getCommentaires($idBillet)
        {
            $bdd = $this->getBdd();
            $commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date,'
            . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
            . ' where BIL_ID=?');
            $commentaires->execute(array($idBillet));
            return $commentaires;
        }

        // Effectue la connexion à la BDD
        // Instancie et renvoie l'objet PDO associé
        private function getBdd()
        {
            $bdd = new PDO(
                'mysql:host=localhost;dbname=monblog;charset=utf8',
                'root',
                '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
            return $bdd;
        }
    } */

        /* *************|  7.1  |************  affichage des détails d'un billet : le clic sur le titre d'un billet du blog doit afficher sur une nouvelle page le contenu et les commentaires associés à ce billet.  ***************** */


                /* *************|  5  |************  DECOUPLAGE FONCTION de CONNEXION ET FONCTION de REQUETE AFFICHAGE BILLET ***************** */


                    /* *************|  3  |************ DECOUPLAGE CONNEXION ET REQUETE AFFICHAGE BILLET 

                    Dans ce fichier, nous avons déplacé la récupération des billets du blog à l'intérieur d'une fonction nommée getBillets.

                    ***************** */
                    /* function getBillets(){

                        $bdd = new PDO(
                            'mysql:host=localhost;dbname=dev_t_forum;charset=utf8',
                            'root',
                            ''
                        );
                        $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
                            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                            . ' order by BIL_ID desc');
                        return $billets;
                    } */


                    /* *************|  3  |************  FIN  DECOUPLAGE CONNEXION ET REQUETE AFFICHAGE BILLET ***************** */



                // Renvoie la liste de tous les billets, triés par identifiant décroissant
                /* function getBillets()
                {
                    $bdd = getBdd();
                    $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
                        . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                        . ' order by BIL_ID desc');
                    return $billets;
                }

                // Effectue la connexion à la BDD
                // Instancie et renvoie l'objet PDO associé
                function getBdd()
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=dev_t_forum;charset=utf8', 'root', '',
            /***********|  6.1  |************ GESTION ERREURS ==>>  */
            /* array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); */
            /***********|  6.1  |************ FIN GESTION ERREURS ==>>  */
                    /* return $bdd;
                }  */

        /* *************|  7.1  |Renvoie les informations sur un billet */

        function getBillet($idBillet)
        {
            $bdd = getBdd();
            $billet = $bdd->prepare('select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' where BIL_ID=?');
            $billet->execute(array($idBillet));
            if ($billet->rowCount() == 1)
                return $billet->fetch();  // Accès à la première ligne de résultat
            else
                throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
        }

        /* *************|  7.1  |Renvoie la liste des commentaires associés à un billet */

        function getCommentaires($idBillet)
        {
            $bdd = getBdd();
            $commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' where BIL_ID=?');
            $commentaires->execute(array($idBillet));
            return $commentaires;
        }

                /* *************|  5  |************  FIN  DECOUPLAGE FONCTION de CONNEXION ET FONCTION de REQUETE AFFICHAGE BILLET ***************** */




        /* *************|  7.1  |************  FIN affichage des détails d'un billet : le clic sur le titre d'un billet du blog doit afficher sur une nouvelle page le contenu et les commentaires associés à ce billet.  ***************** */

    /* *************|  MVC I-1  |************ FIN 

/* *************|  MVC I-2.2  |************La classe Modele est désormais abstraite (mot-clé abstract) et fournit à ses classes dérivées un service d'exécution d'une requête SQL */