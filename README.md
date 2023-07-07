# Projet-BonneFete

Projet-BonneFete est une application de réseau social pour la société BONNEFETE. Les utilisateurs peuvent se connecter, publier des posts de 200 caractères maximum, gérer leurs informations de profil et interagir avec les posts des autres utilisateurs.

## Fonctionnalités

Connexion et gestion du profil utilisateur
<li>Publication, modification et suppression de posts par l'utilisateur</li>
<li>Visualisation des posts d'un utilisateur et des autres utilisateurs</li>
<li>Modération du site par les modérateurs, y compris la modification des rôles d'utilisateur et la suppression des posts</li>

## Spécificités du projet

<li> Tous les utilisateurs peuvent voir les posts des autres en lecture seule</li>
<li> Un simple utilisateur doit s’inscrire avant de se connecter</li>
<li> Seul un modérateur peut modifier un utilisateur pour qu’il devienne modérateur</li>
<li> Les mots de passe des utilisateurs sont cryptés et stockés en toute sécurité</li>
<li> Le mot de passe doit avoir plus de 8 caractères et contenir des chiffres et des lettres</li>
<li> Les posts sont limités à 200 caractères</li>

## Installation

Pour ce site web, il vous faut :

<li>Importez les tables de la base de donnée MySQL se trouvant dans le dossier table_sql</li>
<li>Pour Composer, écrivez composer init dans le terminal du projet.</li>
<li>Après l'installation de Xampp dans le dossier htdocs, le dossier racine du site</li>
<li>Activer le serveur Apache dans Xampp-control.exe</li>

## Technologies utilisées

- PHP
- JavaScript
- MySQL
- HTML
- CSS

## Collaborateurs

Florian Poteau https://github.com/florianpoteau
<br>
Marc-Antoine Taisant https://github.com/Weldarn

## Notes supplémentaires

- Les modérateurs ne peuvent modifier que le rôle de l'utilisateur.
- Les utilisateurs peuvent voir, créer, modifier et supprimer leur propre profil.
- Les modérateurs peuvent supprimer un post d'un autre utilisateur et voir/modifier/supprimer le profil d'un autre utilisateur.
