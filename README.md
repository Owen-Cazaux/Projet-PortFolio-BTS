# Projet-PortFolio-BTS
Réalisation du portfolio pour mon épreuve de BTS

## Prérequis

- Docker avec Docker Compose

## Installation

```bash
docker compose up --build
```

Le site est disponible sur http://localhost:8080. Pour changer le port local, définissez `APP_PORT` dans `.env`.

## Technologie utilisée

- HTML/CSS
- Javascript
- PHP

## Deploiement 

- Créez un service Render de type **Web Service** depuis le dépôt.
- Choisissez **Docker** comme environnement et gardez `Dockerfile` comme chemin du fichier.
- Ne renseignez pas de commande de démarrage : l'image lance Nginx et PHP-FPM.
- Render fournit la variable `PORT` (10000 par défaut), utilisée par Nginx. `APP_PORT` ne sert qu'au port local Docker Compose.

## Outil de test

- 