---
type: Reference
title: Configuration
description: How a Venusian app is configured — the config/*.php files and the .env environment they read.
resource: ../config
tags: [venusian, configuration, env, config]
status: draft
generated: { by: agent:cursor-okf-generator, at: 2026-08-23T03:20:00Z }
stale_after: 2026-11-22
sources:
  - id: config-app
    resource: ../config/app.php
    title: config/app.php
  - id: config-sketches
    resource: ../config/sketches.php
    title: config/sketches.php
  - id: env-example
    resource: ../.env.example
    title: .env.example
---

# Config files

Configuration lives in [`config/`](../config); each file returns a PHP array and
reads environment values via the `env()` helper.

| File | Covers |
|------|--------|
| [`app.php`](../config/app.php) | Name, env, timezone, locale, debug, encryption key/cipher, and magic aliases (`Config`, `Date`, `Log`).[^config-app] |
| `cache.php` | Cache store(s). |
| `database.php` | Database connections. |
| `filesystems.php` | Disks. |
| `hashing.php` | Hash driver. |
| `logging.php` | Log channels. |
| [`sketches.php`](../config/sketches.php) | Extra sketch `load` classes and runner `middleware` — see [Sketches](sketches.md).[^config-sketches] |

# Environment

Copy [`.env.example`](../.env.example) to `.env` (the `composer setup` and
`post-root-package-install` scripts do this if `.env` is missing). Keys shipped
in the example include `APP_NAME`, `APP_ENV`, `APP_KEY`, `APP_DEBUG`,
`CACHE_STORE`, the `REDIS_*` group, and the `NEO4J_*` group.[^env-example]

`config/app.php` defaults: `name` → `Venusian`, `env` → `production`,
`timezone` → `UTC`, `locale` → `en`, `cipher` → `AES-256-CBC`. `APP_KEY` must be
set for encryption.[^config-app]

# Magic Aliases

`config/app.php` maps short aliases to `Voyager\NutsAndBolts\MagicAliases\*`
classes — Venusian's equivalent of Laravel facades: `Config`, `Date`,
`Log`.[^config-app] Add your own under the `aliases` array.

[^config-app]: config/app.php
[^config-sketches]: config/sketches.php
[^env-example]: .env.example
