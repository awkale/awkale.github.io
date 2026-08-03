# AGENTS.md

**This repo is retired. The spec, the domain docs and the archive pipeline have
moved to [awkale/awkale.me](https://github.com/awkale/awkale.me).**

Per [ADR-0002][adr2], `awkale.github.io` is replaced by a prerendered React site
on Netlify. Everything an agent needs was migrated on 2026-08-03 so that
archiving this repo strands nothing:

| Was here | Now at `awkale/awkale.me` |
| --- | --- |
| `docs/adr/` | `docs/adr/` |
| `CONTEXT.md` | `CONTEXT.md` |
| `docs/agents/` | `docs/agents/` |
| `docs/research/` | `docs/research/` |
| `scripts/contentful/` | `scripts/contentful/` |
| `Wikipedia BSO Archive.xlsx` | `Wikipedia BSO Archive.xlsx` (repo root — the parser's default path) |
| `scripts/contentful/participation-checklist.md` | `docs/archive/participation-checklist.md` |

Each was verified byte-identical before removal here, and deleted rather than
copied, so there is exactly one copy of each and the two repos cannot drift.

## What is still here

Only the site being replaced: the 2016-era Jekyll source, its `bower_components`,
and the `CNAME` that points `awkale.me` at GitHub Pages. Nothing here is a
reference for the rewrite.

**Do not add specs, ADRs or domain docs to this repo.** They belong in the new
one.

## Until cutover

This repo still *serves* `awkale.me`, so it is not inert:

- The apex resolves to GitHub Pages A records (`185.199.108–111.153`). The cutover
  removes those four and adds one ALIAS.
- `CNAME` stays until then.
- `awkale.me/user-story-best-practice/` returns 200 but is served from the
  `gh-pages` branch of **another repo**, resolving under the apex only because
  this repo holds the `CNAME`. It is redirect thirteen and nothing in this
  codebase reveals it exists.

Issues live in **Linear** — workspace `awkale`, team **AWKALE** (key `AWK`) — not
GitHub Issues. The tracker doc moved with everything else.

[adr2]: https://github.com/awkale/awkale.me/blob/master/docs/adr/0002-hosting-and-deploy-pipeline.md
