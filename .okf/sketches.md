---
type: Concept
title: Sketches
description: The execution unit of a Venusian app. php rocket <name> boots a sketch, calls loop() every frame until STOP, shuts down once.
resource: ../app/Runner/Sketches
tags: [venusian, voyager, sketches, rocket, loop]
status: draft
generated: { by: claude-opus-5-5, at: 2026-09-30T00:00:00Z }
sources:
  - id: hello-world
    resource: ../app/Runner/Sketches/HelloWorld.php
    title: HelloWorld sketch
  - id: base-sketch
    resource: ../app/Runner/Sketches/Sketch.php
    title: App base Sketch class
  - id: bootstrap
    resource: ../bootstrap/app.php
    title: withSketches paths
  - id: rocket-bin
    resource: ../rocket
    title: rocket
  - id: config
    resource: ../config/sketches.php
    title: config/sketches.php
---

# What a sketch is

Arduino-shaped unit: `boot()` once, `loop(array $mail = []): SketchLoopResult` every frame, `shutdown()` once. App sketches live in [`app/Runner/Sketches/`](../app/Runner/Sketches), extend app base [`Sketch`](../app/Runner/Sketches/Sketch.php) → `Voyager\Sketches\Sketch` (console IO: `info()`, `line()`, …).[^base-sketch]

[`HelloWorld`](../app/Runner/Sketches/HelloWorld.php) prints `Hello, world.`, returns `SketchLoopResult::STOP` on first frame.[^hello-world]

# Frames

Runner rides the app event loop. Frame rate: `sketches.refresh_rate` Hz (`SKETCH_REFRESH_RATE`, 60; below 1 clamps to 1). A sketch overriding `refreshRate(): ?float` with non-null sets it for its run; the key is re-read each frame, so a sketch can retune itself.[^config]

`$mail` = loop mail delivered since the last frame, `[]` when none. `CONTINUE` → next frame; `STOP` → exit 0. SIGINT → 130, SIGTERM → 143. `shutdown()` runs once in every case, a throw from `boot()` or `loop()` included.

# Running

```bash
php rocket list          # every sketch, plus probe
php rocket hello-world
```

`rocket` → `RenderedInstance::handleSketch()` → sketch kernel, one command per sketch.[^rocket-bin] Sketch names are not `computer` commands.

# Discovery

- Path: `bootstrap/app.php` passes `app/Runner/Sketches` to `withSketches()`; every concrete sketch class there registers.[^bootstrap]
- Name: `#[Voyager\Contracts\Sketches\Attributes\Sketch('name')]` when present, else kebab-case of class basename (`HelloWorld` → `hello-world`). Duplicate names throw.
- Elsewhere: list the class in `load` in [`config/sketches.php`](../config/sketches.php), or add its path to `withSketches()`.[^config]

# Related

- [Creating a sketch](playbooks/creating-a-sketch.md)
- [Configuration](configuration.md)

[^hello-world]: HelloWorld sketch
[^base-sketch]: App base Sketch class
[^bootstrap]: withSketches paths
[^rocket-bin]: rocket
[^config]: config/sketches.php
