.PHONY: bump-patch
bump-patch:
	$(eval LATEST_TAG := $(shell git describe --tags --abbrev=0))

	$(eval MAJOR := $(word 1,$(subst ., ,$(LATEST_TAG:v%=%))))
	$(eval MINOR := $(word 2,$(subst ., ,$(LATEST_TAG))))
	$(eval PATCH := $(word 3,$(subst ., ,$(LATEST_TAG))))

	$(eval NEW_TAG := v$(MAJOR).$(MINOR).$(shell echo $$(($(PATCH)+1))))

	@echo "Текущий тег: $(LATEST_TAG)"
	@echo "Новый тег:   $(NEW_TAG)"

	git tag -a $(NEW_TAG) -m "Bump version to $(NEW_TAG)"

	git push origin $(NEW_TAG)

.PHONY: bump-minor
bump-minor:
	$(eval LATEST_TAG := $(shell git describe --tags --abbrev=0))

	$(eval MAJOR := $(word 1,$(subst ., ,$(LATEST_TAG:v%=%))))
	$(eval MINOR := $(word 2,$(subst ., ,$(LATEST_TAG))))

	$(eval NEW_TAG := v$(MAJOR).$(shell echo $$(($(MINOR)+1))).0)

	@echo "Текущий тег: $(LATEST_TAG)"
	@echo "Новый тег:   $(NEW_TAG)"

	git tag -a $(NEW_TAG) -m "Bump minor version to $(NEW_TAG)"

	git push origin $(NEW_TAG)


.PHONY: delete-tag
delete-tag:
	@if [ -z "$(TAG)" ]; then \
		echo "Использование: make delete-tag TAG=v0.1.3"; \
		exit 1; \
	fi

	git tag -d $(TAG)

	git push origin :refs/tags/$(TAG)

	@echo "Тег $(TAG) удален локально и в удаленном репозитории"