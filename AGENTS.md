# AGENTS.md

Instructions for coding agents working in this repository.

## Agent skills

### Issue tracker

Issues live in **Linear** — workspace `awkale`, team **AWKALE** (key `AWK`) —
reached via the `linear-server` MCP. Not GitHub Issues.
See `docs/agents/issue-tracker.md`.

### Triage labels

The five canonical roles, used verbatim (`needs-triage`, `needs-info`,
`ready-for-agent`, `ready-for-human`, `wontfix`) as a mutually-exclusive Linear
label group. See `docs/agents/triage-labels.md`.

### Domain docs

`CONTEXT.md` at the repo root. See `docs/agents/domain.md`.

**The ADRs have moved.** `docs/adr/` and the performance-participation checklist
now live in **[awkale/awkale.me](https://github.com/awkale/awkale.me)** — the
repo that replaces this one per ADR-0002 — at `docs/adr/` and
`docs/archive/participation-checklist.md`. They were moved on 2026-08-03 so they
would not be stranded when this repo is archived. Read them there; this repo no
longer holds a copy, deliberately, so the two cannot drift.

Still here and **still to be carried across before this repo is archived**:
`CONTEXT.md`, `scripts/contentful/` (the parser carrying the `shares` fix,
`bso-graph.json`, and the importer) and `Wikipedia BSO Archive.xlsx`. ADR-0002
anticipated that migration cost; it is not done.
