# E-commerce 🛒

## Sommaire

- [Aperçu](#aperçu)
- [Caractéristiques principales](#caractéristiques-principales)
- [Pré-requis](#pré-requis)
- [Guide d'installation](#guide-dinstallation)
- [Mode d'emploi](#mode-demploi)
- [À propos de l'auteur](#à-propos-de-lauteur)

## Aperçu

Le projet **E-commerce** est une application web de vente en ligne, axée sur la commercialisation de composants informatiques. Développée en PHP avec le framework Symfony pour la partie backend et React.js pour la partie frontend, cette plateforme propose une expérience d'achat intuitive et fluide tout en limitant les problèmes de compatibilité des produits pour les clients.

## Caractéristiques principales

- **Gestion des comptes utilisateur** : Les utilisateurs peuvent s'inscrire, se connecter et modifier leurs informations personnelles. Les administrateurs bénéficient de droits avancés pour gérer les comptes des utilisateurs.
- **Catalogue produit** : Consultation d'une gamme de produits avec des descriptions détaillées, des images, des caractéristiques techniques et des prix. Les utilisateurs peuvent effectuer des recherches et filtrer les articles par nom, catégorie, et d'autres critères.
- **Panier et gestion des achats** : Les utilisateurs peuvent ajouter des produits au panier, le visualiser à tout moment, et modifier son contenu avant de finaliser l'achat.
- **Système de commande et suivi de livraison** : Les clients peuvent passer des commandes, suivre leur progression et gérer les options de livraison. Les administrateurs disposent de fonctionnalités pour ajuster les coûts de livraison et surveiller les commandes.
- **Panneau d'administration** : Les administrateurs peuvent gérer l'intégralité des produits, les promotions, les catégories de produits et les niveaux de stock via une interface dédiée.

## Pré-requis

- PHP version 7.3 ou plus
- Composer pour la gestion des dépendances PHP
- Node.js et npm pour le frontend
- Serveur MySQL via XAMPP

## Guide d'installation

### Installation du backend (Symfony)

1. Récupérez le code source en clonant le dépôt GitHub :

    ```bash
    git clone git@github.com:basim-el/e-commerce.git
    ```

2. Accédez au dossier backend de l'API :

    ```bash
    cd api
    ```

3. Installez les dépendances backend avec Composer :

    ```bash
    composer install
    ```

4. Créez une base de données MySQL à l'aide de XAMPP et configurez le fichier `.env` avec vos informations de connexion à la base de données et les clés JWT pour la gestion des tokens d'authentification :

    ```env
    DATABASE_URL="mysql://root:@127.0.0.1:3306/e-commerce"
    JWT_SECRET_KEY=%kernel.project_dir%/config/jwt/private.pem
    JWT_PUBLIC_KEY=%kernel.project_dir%/config/jwt/public.pem
    JWT_PASSPHRASE=yourpassphrase
    ```

5. Exécutez les migrations pour générer les tables nécessaires dans la base de données :

    ```bash
    php bin/console doctrine:migrations:migrate
    ```

6. Lie les ressources statiques à votre projet :

    ```bash
    php bin/console assets:install
    ```

### Installation du frontend (React.js)

1. Passez au répertoire du frontend :

    ```bash
    cd client
    ```

2. Installez les dépendances Node.js :

    ```bash
    npm install
    ```

## Mode d'emploi

### Lancer le backend

1. Positionnez-vous dans le répertoire backend de l'API :

    ```bash
    cd api
    ```

2. Démarrez le serveur Symfony pour l'API :

    ```bash
    symfony server:start
    ```

### Lancer le frontend

1. Accédez au dossier du frontend :

    ```bash
    cd client
    ```

2. Démarrez le serveur de développement React :

    ```bash
    npm start
    ```

3. Ouvrez votre navigateur et rendez-vous à l'adresse `http://localhost:3000` pour accéder à l'interface utilisateur.

## À propos de l'auteur

👤 **Basim El Sayed**

- [Portfolio](https://www.eldev.fr/)
- [LinkedIn](https://www.linkedin.com/in/basim-el-sayed/)
