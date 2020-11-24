#####################
#- Common -#
#####################

## Get the app running
start: docker.up

## Stop the app from running (losing all data)
stop: docker.down

## Restart the app (losing all data)
restart: stop start

## See what's running
ps: docker.ps


############
#- Docker -#
############

## Bring containers up
docker.up:
	docker-compose up -d

## Take containers down
docker.down:
	docker-compose down -v --remove-orphans

## Build all containers
docker.build:
	docker-compose build

## Shows the output of the latest log entries
docker.logs:
	docker-compose logs

## See what's running
docker.ps:
	docker-compose ps


.DEFAULT_GOAL := help
.SILENT:

## Colors
COLOR_RESET   = \033[0m
COLOR_INFO    = \033[32m
COLOR_COMMENT = \033[33m

help:
	printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
	printf " make [target]\n\n"
	printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
	awk '/^#- [a-zA-Z\ ]* -#|[a-zA-Z\-\_0-9\.@]+:/ { \
		helpSection = match($$0, /^#- ([a-zA-Z\ ]*) -#/); \
		if (helpSection) { \
			printf "\n${COLOR_COMMENT}# %s${COLOR_RESET}\n", substr($$0, RSTART + 3, RLENGTH - 6); \
		} \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "${COLOR_INFO}%-30s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
			} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)
