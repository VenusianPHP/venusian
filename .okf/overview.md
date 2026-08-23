---
type: Application
title: Venusian Application (skeleton)
description: A project built on venusian/framework. Two entrypoints — the computer console and the runner sketch loop — bootstrap the same Voyager\System\Application.
resource: ../composer.json
tags: [venusian, voyager, application, skeleton, php]
status: draft
generated: { by: agent:cursor-okf-generator, at: 2026-08-23T03:20:00Z }
stale_after: 2026-11-22
sources:
  - id: composer
    resource: ../composer.json
    title: venusian/venusian composer.json
  - id: readme
    resource: ../README.md
    title: Skeleton README
  - id: computer-bin
    resource: ../computer
    title: computer console entrypoint
  - id: runner-bin
    resource: ../runner
    title: runner sketch entrypoint
  - id: bootstrap
    resource: ../bootstrap/app.php
    title: bootstrap/app.php
---

# What this is

This repository is a **Venusian application** — the skeleton you build on top of
[`venusian/framework`](../composer.json) `^0.8.0`.[^composer] Venusian is a
Laravel-like PHP framework whose code lives under the `Voyager\` namespace. Your
own code lives under `App\` (PSR-4 → [`app/`](../app)).[^composer]

The `.okf/` bundle ships **with** the skeleton so agents keep this context in
local development. Exclude it from deploy archives by adding `/.okf export-ignore`
to `.gitattributes` when you ship to a target.[^readme]

> Note: `README.md` and `.env.example` still carry the upstream **ScrapyardIO**
> branding, while `composer.json` and `config/app.php` use **Venusian**. Same
> skeleton; the README copy is what lags.[^readme][^composer]

# Requirements

- PHP `^8.4|^8.5|^8.6`.[^composer]
- `venusian/framework ^0.8.0` (installed via the path repository in
  `composer.json` during local development).[^composer]
- Dev tooling: Pest `^4`, Mockery, Faker, Collision.[^composer]

# Running it

Two console binaries both bootstrap the same
`Voyager\System\Application`:[^bootstrap]

| Command | Kernel | Purpose |
|---------|--------|---------|
| `php computer <cmd>` | `System\Console\Kernel` | Workshop-style CLI — code generators (`make:*`), `package:discover`, etc.[^computer-bin] |
| `php runner <sketch>` | `System\Sketches\Kernel` | Boots a [sketch](sketches.md) and ticks its `loop()` until it stops.[^runner-bin] |

The default sketch is `App\Runner\Sketches\HelloWorld`; run it with
`php runner hello-world`.

First-time setup:

```bash
composer install
cp .env.example .env    # composer setup / post-root-package-install does this too
```

# See also

- [Project structure](structure.md)
- [Sketches](sketches.md)
- [Configuration](configuration.md)
- [Creating a sketch](playbooks/creating-a-sketch.md)

[^composer]: venusian/venusian composer.json
[^readme]: Skeleton README
[^computer-bin]: computer console entrypoint
[^runner-bin]: runner sketch entrypoint
[^bootstrap]: bootstrap/app.php
