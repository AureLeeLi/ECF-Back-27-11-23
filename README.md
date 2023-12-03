![Static Badge](https://img.shields.io/badge/Start--Coding_%3A_Jour%2060-7F5A83)


# Catalogue de Références de Matelas - Projet CRUD en PHP avec Laravel et Tailwind CSS

Ce projet a été développé pour répondre aux besoins de Mr. Dodo, qui souhaite dématérialiser son catalogue de références de matelas pour son entreprise Literie 3000. L'objectif est de créer un site intra-entreprise permettant aux employés de consulter, ajouter, modifier et supprimer des références de matelas, ainsi que de gérer leurs catégories et fournisseurs associés.

## Technologies utilisées
- Laravel
- Tailwind CSS

![Logo Laravel](https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/langfr-330px-Laravel.svg.png) 
![Logo Tailwind CSS](https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Tailwind_CSS_Logo.svg/512px-Tailwind_CSS_Logo.svg.png?20230715030042)

## Fonctionnalités du projet
- Consultation des références de matelas
- Ajout de nouvelles références
- Modification des références existantes
- Suppression des références
- Gestion des catégories de matelas
- Gestion des fournisseurs de matelas

## Installation
1. Clonez ce dépôt : `git clone https://lien_vers_le_projet.git`
2. Installez les dépendances : `composer install`
3. Configurez votre fichier `.env` avec les détails de la base de données
4. On génère une clé s'il n'y en a pas : `php artisan key:generate`
5. Lancez les migrations : `php artisan migrate`
6. Les seeders : `php artisan migrate:fresh --seed`
7. Lancez le serveur de développement : `php artisan serve`

Assurez-vous d'avoir [Composer](https://getcomposer.org/) et [Laravel](https://laravel.com/) installés.

## Usage
1. Accédez au site depuis votre navigateur
2. Connectez-vous en tant qu'employé autorisé
3. Explorez, ajoutez, modifiez ou supprimez les références, catégories et fournisseurs de matelas


## Auteurs
Ce projet a été réalisé par moi-même pour l'Evaluation Continue de Formation (DWWM) en réponse à la demande de Mr. Dodo.

### Fonctionnalités supplémentaires en cours de développement 
- Pouvoir accéder à une catégorie ou un fournisseur et voir les références associées ainsi que le stock. 
- Pouvoir créér, mettre a jour ou supprimer une catégorie ou un fournisseur.
- alerte stocks et gestion 
- Proposition d'un nouveau logo et une palette graphique pour ce site
- authentification des employés 
