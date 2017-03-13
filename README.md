# IG45 #
## Installation ##
### Prérequis ###

+ apache
+ php 7  
+ mysql
+ composer ( téléchargez le [ici](https://getcomposer.org/download/) )

### Procedure ###

Clone le projet avec

    git pull https://gitlab.com/Francisco/IG45

Installez les dépendances avec

    composer install

Mettez a jours la base de données avec

    php bin/console doctrine:database:create
    php bin/console doctrine:schema:update --force

si vous etes sur apache le serveur devrait etre accessible de facon classique, sinon vous pouvez utiliser le serveur php interne avec :

    php bin/console server:run
