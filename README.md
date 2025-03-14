# Car Rental API

Une API REST robuste développée avec Laravel pour la gestion des locations de voitures, l'authentification des utilisateurs et le traitement des paiements.

## Fonctionnalités

✅ Authentification des utilisateurs avec Laravel Sanctum  
✅ Gestion des voitures (CRUD)  
✅ Réservation et gestion des locations  
✅ Paiements sécurisés avec Stripe  
✅ Documentation API avec Swagger/OpenAPI  
✅ Validation des requêtes et gestion des erreurs  
✅ Migrations et seeders pour la base de données  

## Prérequis

- PHP 8.1+
- Composer
- MySQL/PostgreSQL
- Compte Stripe pour les paiements

## Installation

1. **Cloner le projet**  
   ```bash
   git clone https://github.com/Youcode-Classe-E-2024-2025/abdelali_latifi_CarRentalAPI.git
   ```
2. **Installer les dépendances**  
   ```bash
   composer install
   ```
3. **Configurer l’environnement**  
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Configurer la base de données**  
   ```bash
   php artisan migrate --seed
   ```

## Documentation API

Accédez à la documentation de l’API après démarrage du serveur via :  
📌 `/api/documentation`

## Principaux Endpoints

### 🔐 Authentification
- `POST /api/register` → Inscription
- `POST /api/login` → Connexion
- `POST /api/logout` → Déconnexion

### 🚗 Gestion des voitures
- `GET /api/cars` → Liste des voitures
- `POST /api/cars` → Ajouter une voiture
- `GET /api/cars/{id}` → Détails d’une voiture
- `PUT /api/cars/{id}` → Modifier une voiture
- `DELETE /api/cars/{id}` → Supprimer une voiture

### 📅 Réservations
- `GET /api/rentals` → Liste des locations
- `POST /api/rentals` → Réserver une voiture
- `GET /api/rentals/{id}` → Détails d’une réservation
- `PUT /api/rentals/{id}` → Modifier une réservation

### 💳 Paiements
- `POST /api/payments/intent` → Initier un paiement
- `POST /api/payments/confirm` → Confirmer un paiement

## Tests

Exécutez les tests avec PHPUnit :  
```bash
php artisan test
```

## Sécurité

✅ Authentification via Laravel Sanctum  
✅ Validation des entrées  
✅ Protection CSRF  
✅ Prévention des injections SQL  

## Contribution

1. Forker le projet  
2. Créer une branche pour votre fonctionnalité  
3. Commiter vos modifications  
4. Pousser la branche  
5. Créer une Pull Request  

## Licence

📜 Sous licence MIT
