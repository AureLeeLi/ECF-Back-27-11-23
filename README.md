# Evaluation Continue de Formation (Back End)

# Laravel CRUD 

Sujet d'évaluation en back end, après 2 mois de formation :

Mr Dodo, qui détient Literie 3000, nous a demandé la création de son catalogue dématérialisé pour la gestion interne de ses références.
Listing-Ajout-Modification-Suppression des références.

Aticles principaux : des matelas, qui peuvent avoir une gamme, des dimensions et des marques différentes.

Création d'une base de données, MCD à définir selon la solution proposée : choix donc libre du nombre de tables ainsi que la relation entre elles. 
Fonctionnalités supplémentaires au choix !

Voici ma solution :)

## Installation

Après avoir clôné le dépôt :

```bash
git clone ...
```

Vous installez Laravel avec Composer :

```bash
composer install
```

Vous créez un fichier `.env` :

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

On génère une clé s'il n'y en a pas :

```bash
php artisan key:generate
```

Pour la base de données, on configure bien le `.env` et on peut lancer les migrations (et le seeder) :

```bash
php artisan migrate
php artisan migrate:fresh --seed
```


