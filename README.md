# IG45 #
## Installation ##
### Pré-requis ###

+ Apache
+ PHP 7  
+ mysql
+ Composer ( Téléchargez le [ici](https://getcomposer.org/download/) )

### Procedure ###

Cloner le projet

    git pull https://gitlab.com/Francisco/IG45

Installer les dépendances

    composer install

Mettre à jour la base de données

    php bin/console doctrine:database:create
    php bin/console doctrine:schema:update --force

Si vous êtes sur Apache, le serveur devrait être accessible de façon classique, sinon vous pouvez utiliser le serveur PHP interne :

    php bin/console server:run

## Procédure de développement ##

Il est conseillé de fork le dépot [principal](https://gitlab.com/Francisco/IG45.git)

Pour intégrer son code à la master du projet, créer des pull resquest, pour notifier par mail, ajouter Théo et François en reviewers.

Exemple type de bonne pratique :

+ S'attribuer une feature
+ Créer une branche
+ Coder votre feature
+ Commiter
+ Push sa feature sur son fork
+ Créer une merge request depuis sa branche vers le master de François (avec Théo et François en reviewers )
+ Une fois sa branche mergée, il reste plus qu'à pull le master
