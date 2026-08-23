---
type: Playbook
title: Creating a sketch
description: Scaffold a new sketch, implement its loop, and run it with the runner binary.
tags: [venusian, sketches, playbook, make]
status: draft
generated: { by: agent:cursor-okf-generator, at: 2026-08-23T03:20:00Z }
stale_after: 2026-11-22
sources:
  - id: hello-world
    resource: ../../app/Runner/Sketches/HelloWorld.php
    title: HelloWorld sketch
  - id: config-sketches
    resource: ../../config/sketches.php
    title: config/sketches.php
---

# Steps

1. **Generate the class.** From the app root:

   ```bash
   php computer make:sketch Blinker
   ```

   This writes `app/Runner/Sketches/Blinker.php` extending the app base
   `Sketch`.

2. **Implement `loop()`.** Return `SketchLoopResult::CONTINUE` to tick again or
   `SketchLoopResult::STOP` to finish. Use `boot()` / `shutdown()` for one-time
   setup and teardown. Model it on
   [`HelloWorld`](../../app/Runner/Sketches/HelloWorld.php).[^hello-world]

   ```php
   public function loop(): SketchLoopResult
   {
       $this->info('tick');

       return SketchLoopResult::CONTINUE;
   }
   ```

3. **Run it.** The short name is the kebab-case of the class:

   ```bash
   php runner blinker
   ```

   Stop a long-running sketch with `Ctrl+C` (`SIGINT`); `shutdown()` still runs.

# Notes

- Sketches under `app/Runner/Sketches/` are discovered by convention — no
  registration needed.[^config-sketches]
- To register a sketch that lives elsewhere, give it `#[Sketch('name')]` and add
  it to the `load` array in [`config/sketches.php`](../../config/sketches.php).[^config-sketches]
- Wrap invocations with cross-cutting behavior via the `middleware` array in the
  same config file.[^config-sketches]

# See also

- [Sketches](../sketches.md) — the full execution model.

[^hello-world]: HelloWorld sketch
[^config-sketches]: config/sketches.php
