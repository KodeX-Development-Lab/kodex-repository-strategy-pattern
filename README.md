
## Setup

### Installation

```
git clone https://github.com/KodeX-Development-Lab/kodex-repository-strategy-pattern.git
composer install
cp .env.example .env
#edit .env for database credentials
php artisan migrate
php artisan db:seed --class=CountrySeeder
```