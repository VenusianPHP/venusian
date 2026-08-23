---
type: Concept
title: Sketches
description: The execution unit of a Venusian app. The runner boots a sketch, ticks loop() until STOP, then shuts down exactly once.
resource: ../app/Runner/Sketches
tags: [venusian, voyager, sketches, runner, loop]
status: draft
generated: { by: agent:cursor-okf-generator, at: 2026-08-23T03:20:00Z }
stale_after: 2026-11-22
sources:
  - id: hello-world
    resource: ../app/Runner/Sketches/HelloWorld.php
    title: HelloWorld sketch
  - id: base-sketch
    resource: ../app/Runner/Sketches/Sketch.php
    title: App base Sketch class
  - id: runner-bin
    resource: ../runner
    title: runner entrypoint
  - id: config
    resource: ../config/sketches.php
    title: config/sketches.php
  - id: framework-okf
    resource: ../vendor/venusian/framework/.okf/packages/sketches.md
    title: Framework voyager/sketches concept
---

# What a sketch is

A **sketch** is the unit of a Venusian application — Arduino-shaped: boot once,
tick a `loop()` repeatedly, shut down once. Your sketches live in
[`app/Runner/Sketches/`](../app/Runner/Sketches) and extend the app base
[`Sketch`](../app/Runner/Sketches/Sketch.php), which extends
`Voyager\Sketches\Sketch`.[^base-sketch]

The shipped example [`HelloWorld`](../app/Runner/Sketches/HelloWorld.php) prints
a line and returns `SketchLoopResult::STOP` to end after a single
tick.[^hello-world]

# Lifecycle

`SketchRunner::run()` is a direct loop — no graph, no shared state:[^framework-okf]

1. `boot()` runs once.
2. `while (! shouldStop)` call `loop()`; break when it returns
   `SketchLoopResult::STOP`.
3. `shutdown()` runs exactly once in `finally` — including on exceptions,
   `stop()`, `SIGINT`, or `SIGTERM`.

`stop()` is cooperative: the current tick finishes, then the loop exits.
Constructor dependency injection is available; `boot`/`loop`/`shutdown` are not
container-called.

# Running

```bash
php runner hello-world
```

The `runner` binary bootstraps the app and calls
`Application::handleSketch()`.[^runner-bin] The sketch's short name is the
kebab-case of its class (`HelloWorld` → `hello-world`).

# Discovery and registration

- **Convention (default):** any class under `app/Runner/Sketches/` is discovered
  automatically by its kebab short name — no attribute required.[^config]
- **Attribute:** add `#[Sketch('name')]` and list the class in the `load` array
  of [`config/sketches.php`](../config/sketches.php) to register a sketch that
  lives elsewhere.[^config]
- **Middleware:** the `middleware` array in `config/sketches.php` wraps each
  sketch invocation via `voyager/pipeline`; the default stack is empty.[^config]

# Related

- [Overview](overview.md) — `runner` vs `computer`.
- [Creating a sketch](playbooks/creating-a-sketch.md).
- Framework detail: [`voyager/sketches`](../vendor/venusian/framework/.okf/packages/sketches.md).[^framework-okf]

[^hello-world]: HelloWorld sketch
[^base-sketch]: App base Sketch class
[^runner-bin]: runner entrypoint
[^config]: config/sketches.php
[^framework-okf]: Framework voyager/sketches concept
