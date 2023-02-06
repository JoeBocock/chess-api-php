command = @docker run $(3) -t --rm --entrypoint $(1) -v `pwd`:/app app $(2)

.PHONY: build
build:
	@docker build -t app .

.PHONY: install
install:
	$(call command, /usr/local/bin/composer, install)

.PHONY: test
test:
	$(call command, /app/vendor/bin/pest, --parallel --coverage --min=100, -e XDEBUG_MODE='coverage')

.PHONY: stan
stan:
	$(call command, /app/vendor/bin/phpstan, analyse src --level 8)

.PHONY: format
format:
	$(call command, /app/vendor/bin/php-cs-fixer, fix)

.PHONY: lint
lint:
	$(call command, /app/vendor/bin/php-cs-fixer, fix --dry-run)
