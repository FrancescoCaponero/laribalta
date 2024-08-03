DOCKER_IMAGE=docker run -it --rm -v $(CURDIR):/usr/src/app -w="/usr/src/app" node:16-alpine
DOCKER_NPM=$(DOCKER_IMAGE) npm

DOCKER_JPG_OPT=find src/images -iname '*.jpeg' -o -iname '*.jpg' | xargs docker run --rm -v "$(CURDIR):/app" pockost/jpegoptim --max=90 --strip-all --preserve --totals -v
DOCKER_PNG_OPT=find src/images -iname '*.png' | xargs docker run -t -v "$(CURDIR):/source" buffcode/docker-optipng

style-lint:
	${DOCKER_NPM} run lint:style

style-lint-fix:
	${DOCKER_NPM} run lint:style:fix

watch:
	${DOCKER_NPM} run watch

build:
	${DOCKER_NPM} run build

npm-cli:
	${DOCKER_IMAGE} /bin/sh

optimize-images:
	${DOCKER_JPG_OPT}
	${DOCKER_PNG_OPT}

check-fsize:
	# du -ahx $(CURDIR) | sort -n -r | head -n 10
	find $(CURDIR) -not -path "$(CURDIR)/node_modules/*" -printf '%s %p\n'| sort -nr | head -10
