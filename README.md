# Init nuovo progetto #

### Files and Folders ###
* Crea la cartella del nuovo progetto
* Clona al suo interno questa [repository](https://bitbucket.org/corilla/corilla-cs2-wordpress/src/master/)
* `rm -rf .git` 
* Crea le cartelle 'tmp' e 'private' sulla root
* `chmod 777 tmp` 
* `chmod 777 private`
* In web/sites/default crea la cartella 'files'
* `chmod 777 files`

### Init ###
* Dentro la cartella _dev troverai un dump del DB aggiornato e file da inserire in web/sites/default
* `ddev config`
* Opzionale: specificare il cms
* `ddev start`
* Opzionale: `ddev get ddev/ddev-phpmyadmin`
* Importare il DB
* `ddev composer install`
* `ddev drush cr` o `ddev exec drush cr`
* `ddev drush cim` qualora il DB non sia aggiornato

### Update CS2 style ###
* Controllare la versione dello stile CS2 riportata nel `README.md` in 'webpack'
* Nel caso in cui non sia aggiornata all'utima versione
* Cancella tutti i file all'interno di 'webpack'
* Clona al suo interno l'ultima [versione](https://bitbucket.org/corilla/corilla-cs2-style/src/master)
* `rm -rf .git` 
* `rm -rf .gitignore`# laribalta
# laribalta
