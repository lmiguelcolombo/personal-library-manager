# Variables
PROJECT_NAME ?= $(shell bash -c 'read -p "Name of your project: " project; echo $$project')

# Functions
init: build up composer key 
.PHONY: init

build:
	@docker-compose build
.PHONY: build

up:
	@docker-compose up -d
.PHONY: up

down:
	@docker-compose down --remove-orphans
.PHONY: clean

start:
	@docker-compose start
.PHONY: start

stop:
	@docker-compose stop
.PHONY: stop

composer:
	@docker-compose exec app composer install
.PHONY: composer

key:
	@docker-compose exec app php artisan key:generate
.PHONY:key

migrate:
	@docker-compose exec app php artisan migrate
.PHONY:migrate

laravel-init:
	@docker-compose exec app composer create-project laravel/laravel $(PROJECT_NAME)
.PHONY: laravel-init
