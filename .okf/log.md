# Update Log

## 2026-10-09

* **Update**: [Configuration](configuration.md) — `app.id` (`APP_ID`, default `com.venusian.app`) added to `config/app.php` and `.env.example`: the app's reverse-DNS identity the toolkit drivers and `venusian build` share.

## 2026-09-30

* **Correction**: [Overview](overview.md) — `.okf/` is not `export-ignore`d, so `create-project` ships it; deploys opt out in the app's `.gitattributes`.
* **Update**: Bundle rewritten for the 0.10 skeleton. [Overview](overview.md) — `^0.10.0` framework + probe, `RenderedInstance`, create-project hooks write `.env`, `APP_KEY`, sqlite file. [Structure](structure.md) — `computer` / `rocket`, `ComposerScripts` hook, no shipped lock, tests. [Sketches](sketches.md) — frames, mail, exit codes, discovery by path. [Configuration](configuration.md) — app config over framework defaults, 13 files, env keys. [Creating a sketch](playbooks/creating-a-sketch.md) — hand-written class, no `make:sketch`.

## 2026-08-23

* **Creation**: Seeded the bundle — index, overview, structure, sketches, configuration, creating-a-sketch playbook.
