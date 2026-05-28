#/bin/sh

test -f .env || cp .env.dist .env
composer install
php yii migrate
php yii migrate --migrationPath=@yii/rbac/migrations
php yii rbac/init
php yii seed/create-user
