1. composer install
2. php artisan migrate:install
3. php artisan migrate

Vous commencez avec le code disponible au https://github.com/nitriques/41b-ex-2
Créez une nouvelle base de donnée nommée `ex-2-<code etudiant>`. Nommez aussi votre dossier ainsi. Configurez cette valeur dans le fichier .env et roulez les commandes qui figure dans le fichier README.

ok!

Votre tâche consiste à ajouter un modèle Editeur, qui possède juste un champs 'nom', représenté une string de 100 caractères. (1pts)



Ce modèle a une relation de plusieurs à plusieurs avec le model Auteur. Vous devez donc faire la relation avec la méthode `belongsToMany`  (Voir https://laravel.com/docs/9.x/eloquent-relationships#many-to-many).

ok!

Veuillez à créer un fichier de migration pour la table `editeurs` ainsi que pour la table de jonction/table intermédiaire `auteurs_editeurs`. (1pts)

ok!


Veuillez aussi à faire une classe de Seeder pour créer 10 editeurs. (1pts)

ok!

Par la suite, vous devez compléter les méthodes du controlleur AuteursEditeursController et des vues associées pour être en mesure d'associer un Editeur a un Auteur. (2pts)

