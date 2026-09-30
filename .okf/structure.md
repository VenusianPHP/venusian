---
type: Reference
title: Project structure
description: Layout of a Venusian application — code, config, binaries, tests, Composer hooks.
resource: ..
tags: [venusian, structure, layout, composer]
status: draft
generated: { by: claude-opus-5-5, at: 2026-09-30T00:00:00Z }
sources:
  - id: composer
    resource: ../composer.json
    title: composer.json autoload and scripts
  - id: providers
    resource: ../bootstrap/providers.php
    title: bootstrap/providers.php
  - id: computer-bin
    resource: ../computer
    title: computer
  - id: rocket-bin
    resource: ../rocket
    title: rocket
  - id: phpunit
    resource: ../phpunit.xml
    title: phpunit.xml
---

# Layout

| Path | Purpose |
|------|---------|
| [`app/`](../app) | App code, `App\` (PSR-4).[^composer] |
| `app/Providers/` | Service providers. [`AppServiceProvider`](../app/Providers/AppServiceProvider.php) listed in [`bootstrap/providers.php`](../bootstrap/providers.php).[^providers] |
| `app/Runner/Sketches/` | [Sketches](sketches.md). Base [`Sketch`](../app/Runner/Sketches/Sketch.php) extends `Voyager\Sketches\Sketch`. |
| [`bootstrap/`](../bootstrap) | `app.php` builds the app; `providers.php` app providers; `cache/` discovery and config caches (ignored). |
| [`config/`](../config) | See [Configuration](configuration.md). |
| [`database/`](../database) | `seeders/` (`Database\Seeders\`); `database.sqlite` created by Composer hook, ignored. |
| [`storage/`](../storage) | Writable: `app/` (`private`, `public` disks), `framework/cache/data`, `logs/venusian.log`. |
| [`tests/`](../tests) | Pest, `Tests\`: `Unit/`, `Feature/`.[^phpunit] |
| `computer` | Console binary. |
| `rocket` | Sketch binary. |

No `stubs/` until `php computer stub:publish`; `make:*` then prefer those copies.

# Binaries

Both define `VENUSIAN_START`, require `vendor/autoload.php` and `bootstrap/app.php`, pass `ArgvInput` to the `RenderedInstance`:

- `computer` → `handleInquiry()` → console kernel: framework commands, `make:*`, `package:discover`, `probe`.[^computer-bin]
- `rocket` → `handleSketch()` → sketch kernel: one command per sketch, plus `probe`.[^rocket-bin]

# Autoload and Composer hooks

- `App\` → `app/`, `Database\Seeders\` → `database/seeders/`; dev `Tests\` → `tests/`.[^composer]
- `post-autoload-dump`: `Voyager\Core\ComposerScripts::postAutoloadDump` clears cached config, services, packages, signals; then `php computer package:discover` rebuilds `bootstrap/cache/packages.php` from `extra.venusian.providers` of installed packages.[^composer]
- Root `extra.venusian.dont-discover` lists packages to skip.[^composer]
- `composer.lock` not shipped; the app's own install writes and commits it.

# Tests

`phpunit.xml` forces `APP_ENV=testing`, fails on an empty suite. `tests/Unit/ExampleTest.php`; `tests/Feature/HelloWorldTest.php` runs `php rocket hello-world` in a child process, expects exit 0 and the greeting.[^phpunit]

[^composer]: composer.json autoload and scripts
[^providers]: bootstrap/providers.php
[^computer-bin]: computer
[^rocket-bin]: rocket
[^phpunit]: phpunit.xml
