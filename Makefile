ENGINE						  = vagrant
EXEC						  = $(ENGINE) ssh -c
SYMFONY_CONSOLE 			  = php bin/console
COMPOSER 					  = composer

init: start composer-install

start:
	$(ENGINE) up

stop:
	$(ENGINE) halt

remove:
	$(ENGINE) destroy -f
	rm -rf .vagrant

ssh:
	$(ENGINE) ssh

composer-install:
	$(EXEC) '$(COMPOSER) install'

composer-update:
	$(EXEC) '$(COMPOSER) update'

composer-require:
	$(EXEC) '$(COMPOSER) require $(COMMAND_ARGS)'

composer-require-dev:
	$(EXEC) '$(COMPOSER) require --dev $(COMMAND_ARGS)'

console:
	$(EXEC) '$(SYMFONY_CONSOLE) $(COMMAND_ARGS)'

clear-cache:
	$(EXEC) '$(SYMFONY_CONSOLE) cache:clear --no-warmup'
	$(EXEC) '$(SYMFONY_CONSOLE) cache:warmup'

assets:
	$(EXEC) '$(SYMFONY_CONSOLE) assets:install'

schema-update:
	$(EXEC) '$(SYMFONY_CONSOLE) doctrine:database:create --if-not-exists'
	$(EXEC) '$(SYMFONY_CONSOLE) doctrine:schema:update --force --complete'
	$(EXEC) '$(SYMFONY_CONSOLE) doctrine:schema:validate'

SUPPORTED_COMMANDS := console composer-require composer-require-dev test test-behat
SUPPORTS_MAKE_ARGS := $(findstring $(firstword $(MAKECMDGOALS)), $(SUPPORTED_COMMANDS))
ifneq "$(SUPPORTS_MAKE_ARGS)" ""
  COMMAND_ARGS := $(wordlist 2,$(words $(MAKECMDGOALS)),$(MAKECMDGOALS))
  COMMAND_ARGS := $(subst :,\:,$(COMMAND_ARGS))
  $(eval $(COMMAND_ARGS):;@:)
endif


