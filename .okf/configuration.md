---
type: Reference
title: Configuration
description: config/*.php layered over the framework's own config, and the .env keys they read.
resource: ../config
tags: [venusian, configuration, env, config]
status: draft
generated: { by: claude-opus-5-5, at: 2026-09-30T00:00:00Z }
sources:
  - id: config-app
    resource: ../config/app.php
    title: config/app.php
  - id: env-example
    resource: ../.env.example
    title: .env.example
  - id: bootstrap
    resource: ../bootstrap/app.php
    title: bootstrap/app.php
---

# Layering

Framework ships a default for every file below. At boot each app file is merged over the framework's file of the same name: top-level keys replace; `cache.stores`, `database.connections`, `filesystems.disks`, `logging.channels`, `queue.connections`, `broadcasting.connections`, and `io-pools` `event_loop` / `pool_waiters` / `promise_engines` / `pool_workers` merge one level deeper, so an app adds a store or channel without restating the rest. A file deleted from `config/` falls back to the framework's whole. `->dontMergeFrameworkConfiguration()` on the instance turns layering off.

Skeleton `config/` = framework 0.10 defaults verbatim, so every setting is visible to edit.

| File | Covers |
|------|--------|
| [`app.php`](../config/app.php) | name, env, cipher, key, previous keys, providers.[^config-app] |
| `broadcasting.php` | Broadcast connections: pusher, reverb, redis, log, null. |
| `cache.php` | Stores: array, database, file, memcached, redis; key prefix. |
| `concurrency.php` | Concurrency driver and pool. |
| `database.php` | sqlite, mysql, mariadb, pgsql, sqlsrv; redis; neo4j. |
| `filesystems.php` | Disks: local, public, s3. |
| `hashing.php` | bcrypt / argon. |
| `http.php` | Async driver: auto, curl, pcurl. |
| `io-pools.php` | Event loop pace and mail handler, waiter backend, promise engine, process/thread workers. |
| `logging.php` | Channels: stack, single, daily, stderr, syslog, errorlog, null. |
| `queue.php` | Connections, batching, failed jobs. |
| `sketches.php` | `refresh_rate`, extra sketch `load` — see [Sketches](sketches.md). |
| `workflows.php` | Workflow runtime. |

Timezone: `app.timezone` when set, else UTC.

# Environment

`.env.example` ships every key the configs read that an app commonly sets: `APP_*`, `LOG_*`, `DB_CONNECTION` (sqlite; commented mysql block), `CACHE_STORE`, `QUEUE_CONNECTION`, `BROADCAST_CONNECTION`, `FILESYSTEM_DISK`, `REDIS_*`, `NEO4J_*`, `IO_POOLS_WAITER_BACKEND`, `IO_POOLS_PROCESS_WORKERS`, `HTTP_ASYNC_DRIVER`, `CONCURRENCY_DRIVER`, `SKETCH_REFRESH_RATE`. Everything else falls back to config defaults. `null` / `(null)` read as PHP `null`.[^env-example]

`APP_KEY`: `base64:` + 32 random bytes, written by `post-create-project-cmd` when empty. 0.10 has no `key:generate`. Encryption needs it.[^config-app]

[^config-app]: config/app.php
[^env-example]: .env.example
[^bootstrap]: bootstrap/app.php
