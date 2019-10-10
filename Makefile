build:	check
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

down-wipe:
	docker-compose down -v

logs:
	docker-compose logs -f

check:
	./provisioning/check_environment.sh

restore-data:
	./provisioning/restore_data.sh

prod: down build up
