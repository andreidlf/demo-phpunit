default:
	echo "Please select a valid option"

build:
	docker-compose build

start:
	docker-compose up -d

stop:
	docker-compose stop

restart:
	docker-compose stop
	docker-compose up -d

cli:
	docker exec -it laravel-app-php-1 bash

cleanup:
	docker-compose down
