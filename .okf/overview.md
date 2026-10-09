---
type: Application
title: Venusian Application (skeleton)
description: A project on venusian/framework 0.10. Two binaries, computer and rocket, boot the same Voyager\Core\RenderedInstance.
resource: ../composer.json
tags: [venusian, voyager, application, skeleton, php]
status: draft
generated: { by: claude-opus-5-5, at: 2026-09-30T00:00:00Z }
sources:
  - id: composer
    resource: ../composer.json
    title: venusian/venusian composer.json
  - id: readme
    resource: ../README.md
    title: Skeleton README
  - id: bootstrap
    resource: ../bootstrap/app.php
    title: bootstrap/app.php
  - id: env-example
    resource: ../.env.example
    title: .env.example
---

# What this is

Venusian application skeleton on `venusian/framework` `^0.10.0`, with `venusian/probe` `^0.10.0` for the REPL.[^composer] Framework code: `Voyager\` namespace. App code: `App\` → [`app/`](../app).[^composer]

`bootstrap/app.php` builds the app: `VenusianVoyager::setup(base_path: dirname(__DIR__))`, `withExceptions()`, `withSketches([app/Runner/Sketches])`, `create()` → `RenderedInstance`.[^bootstrap]

`.okf/` ships into every new app (not `export-ignore`d). To keep it out of a deploy archive, add `/.okf export-ignore` to the app's `.gitattributes`.[^readme]

# Requirements

- PHP `^8.4|^8.5|^8.6`.[^composer]
- Dev: Pest `^4.7`, Mockery, Faker.[^composer]

# First run

```bash
composer create-project venusian/venusian my-app
```

Hooks: `post-root-package-install` copies `.env.example` → `.env`; `post-create-project-cmd` writes `APP_KEY=base64:…` (32 random bytes) when empty and creates `database/database.sqlite`.[^composer][^env-example] From a git clone: `composer setup` runs install plus both hooks.

```bash
php rocket hello-world   # Hello, world.
php computer list
php computer probe       # REPL
composer test
```

# See also

- [Project structure](structure.md)
- [Sketches](sketches.md)
- [Configuration](configuration.md)
- [Creating a sketch](playbooks/creating-a-sketch.md)

[^composer]: venusian/venusian composer.json
[^readme]: Skeleton README
[^bootstrap]: bootstrap/app.php
[^env-example]: .env.example
