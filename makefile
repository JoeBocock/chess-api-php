command = @docker run -it --rm --entrypoint $(1) -v `pwd`:/app app $(2)

.PHONY: build
build:
	@docker build -t app .

.PHONY: install
install:
	$(call command, /usr/local/bin/composer, install)

.PHONY: test
test:
	$(call command, /app/vendor/bin/pest)

.PHONY: stan
stan:
	$(call command, /app/vendor/bin/phpstan, analyse src --level 8)

.PHONY: format
format:
	$(call command, /app/vendor/bin/php-cs-fixer, fix)

.PHONY: lint
lint:
	$(call command, /app/vendor/bin/php-cs-fixer, fix --dry-run)

.PHONY: bash
bash:
	$(call command, /bin/bash)
