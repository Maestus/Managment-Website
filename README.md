ProjetWeb
=========

La base de donnée et generée de maniere automatique:
-Tout d'abord copier tout le contenu du fichier sujet1.sql (présent dans l'archive) dans mysql (phpmyadmin) cellui ci créera la table salarie.
-Ensuite lancer la commande
php bin/console doctrine:schema:update --force
dans le dossier ProjetWeb, cette commande créera la table Salariecompte
lancer ensuite le script compte.sh :
./compte.sh (après avoir donné le droit d'execution)

Vous aurez ainsi la table salarieCompte rempli. (prend enormement de temps)

POUR LES TESTS PRENDRE LE COMPTE SUIVANT :

Nom d'utilisateur : Jardine-Camille@symfony.fr
Password : testpassus



A Symfony project created on May 5, 2016, 8:26 pm.
