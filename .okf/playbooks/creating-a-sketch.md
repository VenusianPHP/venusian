---
type: Playbook
title: Creating a sketch
description: Write a sketch class, implement loop(), run it with rocket.
tags: [venusian, sketches, playbook]
status: draft
generated: { by: claude-opus-5-5, at: 2026-09-30T00:00:00Z }
sources:
  - id: hello-world
    resource: ../../app/Runner/Sketches/HelloWorld.php
    title: HelloWorld sketch
  - id: config-sketches
    resource: ../../config/sketches.php
    title: config/sketches.php
---

# Steps

1. **Create the class** at `app/Runner/Sketches/Blinker.php`, extending app base `Sketch`. No `make:sketch` in 0.10; model it on [`HelloWorld`](../../app/Runner/Sketches/HelloWorld.php).[^hello-world]

   ```php
   <?php

   namespace App\Runner\Sketches;

   use Voyager\Contracts\Sketches\SketchLoopResult;

   class Blinker extends Sketch
   {
       protected string $description = 'Tick until stopped.';

       public function loop(array $mail = []): SketchLoopResult
       {
           $this->info('tick');

           return SketchLoopResult::CONTINUE;
       }
   }
   ```

   `boot()` / `shutdown()` for one-time setup and teardown. Override `refreshRate(): ?float` for a frame rate other than `sketches.refresh_rate`.

2. **Run it.** Name = kebab-case of the class:

   ```bash
   php rocket blinker
   ```

   `Ctrl+C` → exit 130; `shutdown()` still runs.

3. **Test it** like `tests/Feature/HelloWorldTest.php`: run `php rocket <name>` in a `Symfony\Component\Process\Process`, assert exit code and output.

# Notes

- Classes under `app/Runner/Sketches/` register by path; nothing to list.
- Elsewhere: `#[Voyager\Contracts\Sketches\Attributes\Sketch('name')]` plus the class in `load` of [`config/sketches.php`](../../config/sketches.php).[^config-sketches]

# See also

- [Sketches](../sketches.md)

[^hello-world]: HelloWorld sketch
[^config-sketches]: config/sketches.php
