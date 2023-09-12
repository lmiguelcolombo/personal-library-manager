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

create-model:
	@docker-compose exec app php artisan make:model $(MODEL_NAME)
.PHONY: create-model

create-model-with-migration:
	@docker-compose exec app php artisan make:model $(MODEL_NAME) -m
.PHONY: create-model

create-migration:
	@docker-compose exec app php artisan make:migration $(MIGRATION_NAME)
.PHONY: create-migration

create-event:
	@docker-compose exec app php artisan make:event $(EVENT_NAME)
.PHONY: create-event

create-controller:
	@docker-compose exec app php artisan make:controller $(CONTROLLER_NAME)
.PHONY: create-controller

create-request:
	@docker-compose exec app php artisan make:request $(REQUEST_NAME)
.PHONY: create-request