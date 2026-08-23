---
type: Reference
title: Project structure
description: Directory layout of a Venusian application — where your code, config, entrypoints, and generator stubs live.
resource: ..
tags: [venusian, structure, layout, stubs]
status: draft
generated: { by: agent:cursor-okf-generator, at: 2026-08-23T03:20:00Z }
stale_after: 2026-11-22
sources:
  - id: tree
    resource: ..
    title: Repository root tree
  - id: composer
    resource: ../composer.json
    title: composer.json autoload block
  - id: providers
    resource: ../bootstrap/providers.php
    title: bootstrap/providers.php
---

# Layout

| Path | Purpose |
|------|---------|
| [`app/`](../app) | Your application code, namespaced `App\` (PSR-4).[^composer] |
| `app/Providers/` | Service providers. [`AppServiceProvider`](../app/Providers/AppServiceProvider.php) is registered in [`bootstrap/providers.php`](../bootstrap/providers.php).[^providers] |
| `app/Runner/Sketches/` | Your [sketches](sketches.md). Base class [`Sketch`](../app/Runner/Sketches/Sketch.php) extends `Voyager\Sketches\Sketch`. |
| [`bootstrap/`](../bootstrap) | `app.php` / `runner.php` build the `Application`; `providers.php` lists app providers; `cache/` holds discovery caches. |
| [`config/`](../config) | Per-concern configuration — see [Configuration](configuration.md). |
| [`stubs/`](../stubs) | Templates used by `make:*` generators; override them to change generated code. |
| [`storage/`](../storage) | Runtime writable area (`app/`, `framework/`, `logs/`). |
| [`tests/`](../tests) | Pest test suite, namespaced `Tests\`.[^composer] |
| `computer` | Console entrypoint (Workshop CLI). |
| `runner` | Sketch entrypoint. |

# Entrypoints

Both `computer` and `runner` are `#!/usr/bin/env php` scripts that require the
Composer autoloader, build a `Voyager\System\Application` from `bootstrap/`,
then hand an `ArgvInput` to the matching kernel — `handleCommand()` for
`computer`, `handleSketch()` for `runner`. Both define a `VENUSIAN_START`
microtime for boot timing.

# Code generators

`php computer make:*` scaffolds classes from [`stubs/`](../stubs). Stubs shipped
in the skeleton include `class`, `enum`/`enum.backed`, `event`, `job`/`job.queued`,
`listener*`, `model*`, `cast*`, `observer*`, `provider`, `rule`, `scope`,
`console`, `trait`, and Pest `test`/`pest` variants. Edit a stub to change every
class generated from it.

# Autoloading

- `App\` → `app/` (`autoload.psr-4`).[^composer]
- `Tests\` → `tests/` (`autoload-dev.psr-4`).[^composer]
- `composer post-autoload-dump` runs `Voyager\System\ComposerScripts` and
  `php computer package:discover`, refreshing `bootstrap/cache/`.[^composer]

[^tree]: Repository root tree
[^composer]: composer.json autoload block
[^providers]: bootstrap/providers.php
