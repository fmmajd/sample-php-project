all: say_hello

say_hello:
	@echo "Hello World!"

up:
	@echo "Upping the docker containers..."
	@docker-compose up -d

down:
	@echo "Downning the docker containers..."
	@docker-compose down --remove-orphans

restart:
	@echo "Restarting the docker containers..."
	@docker-compose restart

bash:
	@echo "Summoning the bash..."
	@docker-compose exec --user=1001 php bash

root_bash:
	@echo "Summoning the bash..."
	@docker-compose exec php bash

build:
	@echo "Building the docker containers..."
	@docker-compose build

permissions:
	@echo "Correcting all the permissions..."
	@docker-compose exec php php artisan cache:clear
	@docker-compose exec php chown -R www-data:www-data storage
	@docker-compose exec php chown -R www-data:www-data vendor
	@echo "Ownerships updated"
	@docker-compose exec php chmod -R 757 storage
	@docker-compose exec php chmod -R 757 vendor
	@echo "Permissions updated"

composer_install:
	@echo "Installing composer packages..."
	@docker-compose run --rm composer composer install

composer_autoload:
	@echo "Generating new autoload files..."
	@docker-compose run --rm composer composer dump-autoload

style:
	@echo "Checking style via phpcs..."
	@docker-compose exec phpcs phpcs

start:
	@make composer_install
	@make up
	@docker-compose exec php php artisan key:generate
