---
status: accepted
---

# Hosting and deploy pipeline for awkale.me

The rewritten site is built by Netlify from a fresh `awkale/awkale.me` repository
(default branch `master`), prerendering every route at build time from the
Contentful space `3iiyvj5u5c9h`. A Contentful publish webhook triggers a Netlify
build hook. DNS stays at Namecheap: an ALIAS record at the apex points to the
Netlify site, `www` follows it, and the apex remains canonical. The old
`awkale/awkale.github.io` has Pages explicitly disabled and is archived
read-only, at cutover and not before.

## Email pins the DNS zone to Namecheap

`awkale.me` carries five MX records pointing at Namecheap Email Forwarding
(`eforward1` through `eforward5.registrar-servers.com`) plus an SPF TXT scoped
to `spf.efwd.registrar-servers.com`. That is the service behind `hi@awkale.me`,
and Namecheap's free forwarding only works while the domain sits on Namecheap's
own nameservers — copying the MX records to another provider is not sufficient,
because the forwarding hosts stop accepting mail for a domain Namecheap is no
longer authoritative for.

So **delegating the zone to Netlify DNS or Cloudflare breaks email**, and any
future move must be preceded by migrating email to a real provider. This is the
single most important thing in this record: nothing in the repository hints that
the domain does anything but serve a website, and Netlify's own documentation
recommends Netlify DNS as the default. Two further TXT records — a Google
site verification and a Keybase site verification — must also survive any zone
move.

## GitHub Pages cannot issue redirects

[ADR-0001](0001-url-structure.md) commits to twelve redirects: `/portfolio/` to
`/projects/`, two `/portfolios/*` entries to their case studies, and nine
`/cheatsheets/*` URLs to external GitHub Gists. GitHub Pages has no redirect
mechanism at all — the closest approximation is twelve stub pages carrying
`<meta http-equiv="refresh">`, which return 200 rather than 301 and, for the
nine cross-origin gist targets, render a visible flash before navigating.

This, not build hooks or deploy previews, is why the site left Pages. A static
host that cannot express a redirect cannot implement the URL structure the
previous ADR settled on.

## Considered options

**Host.** GitHub Pages via Actions was the incumbent-flavoured option — no new
vendor, DNS and TLS already correct — but it fails the redirect requirement
above, and the Contentful webhook would have to reach it through a hand-rolled
`repository_dispatch` chain with a PAT. There is no existing `.github/workflows`
to extend, so this was a greenfield build either way. Netlify won on
`_redirects` giving real 301s, a build hook that pairs directly with a Contentful
webhook, and env-var secret storage that keeps tokens out of a public repository.
Cloudflare Pages is comparable but its natural pairing is Cloudflare DNS, which
the email constraint forbids. Vercel is strongest when the framework is Next,
which is a question ADR-0002 does not answer and
[AWK-8](https://linear.app/awkale/issue/AWK-8/choose-the-static-rendering-layer-above-vite)
does.

**Repository.** Rewriting in place would have kept 83 commits, the Contentful
importer, and this ADR directory with no migration work, and the repository
would have been renamed to `awkale.me` at cutover — `awkale.github.io` names a
service that will no longer exist. A fresh repository was chosen instead, at the
cost of hand-migrating `scripts/contentful/`, `Wikipedia BSO Archive.xlsx`,
`CONTEXT.md`, `docs/adr/`, `AGENTS.md`, `docs/agents/`, the `.gitignore` token
rules, and the eight Cision screenshots in `assets/images/`. Left behind:
`bower_components/` (217 tracked files of jQuery, bootstrap-sass 3 and animejs),
a committed `.sass-cache/`, all Jekyll scaffolding, `_cheatsheets/`, and the two
`_portfolios/` stubs.

`awkale/awkale` was proposed as an existing empty repository and rejected on
inspection: it is the GitHub **profile README** repository, whose `README.md`
renders at `github.com/awkale`. Using it would make the site's README the
profile page. The name carries no advantage, since Netlify is indifferent to it.

**Staging before cutover.** Netlify serves the new site at `<site>.netlify.app`
from the first deploy, so `awkale.me` can keep serving the 2016 Jekyll site for
as long as the rewrite takes. That URL is public, and a partially built site of
637 pages is exactly what a crawler will index and then rank. Site-wide password
protection is a paid Netlify feature; an edge function doing basic auth was
rejected as friction for design review, given the content is destined to be
public. The chosen answer is a sitewide `X-Robots-Tag: noindex` in `_headers`,
removed at cutover.

**Rebuild trigger.** `import_to_contentful.py --publish` publishes roughly 2,383
entries one at a time in dependency order. A naively wired publish webhook turns
that single command into roughly 2,383 builds, against a free-tier budget of 300
build minutes per month and a 637-page prerender that plausibly takes one to
three minutes. A daily scheduled build sidesteps the problem entirely but makes
a typo fix wait up to 24 hours; a debouncing function handles it automatically
but needs stateful coalescing on serverless. The chosen answer is a webhook
scoped to the content types the site renders, plus a mandatory step in
`scripts/contentful/README.md` to disable the build hook before any bulk run.
Bulk publishing is already a deliberate multi-command ritual; it gains one more
command.

**Cutover shape.** A staged cutover — flip DNS once `/projects` and the twelve
redirects work, with `/concerts` following — would retire the old site sooner and
decouple the rewrite from the archive's unresolved data problems. A single
cutover with both sections live was chosen instead, matching ADR-0001's v1
sitemap and treating the twelve redirects as one ledger.

## Consequences

**The apex stays canonical, so ALIAS support matters.** Every URL in ADR-0001,
the existing TLS certificate, and the current `CNAME` file assume `awkale.me`
rather than `www.awkale.me`. Pointing an apex at a platform hostname needs an
ALIAS/ANAME record; if Namecheap's plan does not offer one, the fallback is a
plain A record to Netlify's load balancer at `75.2.60.5`, which is a hardcoded
third-party address that will eventually need revisiting.

**There is a short TLS window at cutover.** The current certificate covers
`awkale.me` and `www.awkale.me` and expires 2026-09-30. Netlify provisions its
own via Let's Encrypt, but validation requires DNS to already resolve to
Netlify — so the certificate cannot be pre-issued, and there is a brief gap
between flipping the ALIAS and the certificate being served.

**Disabling Pages is a separate step from archiving.** `awkale.github.io` is a
user site, so after DNS moves it would continue serving the 2016 Jekyll site at
`https://awkale.github.io/` as a duplicate of content now living at `awkale.me`.
Archiving a repository does not disable Pages. Both steps belong in the cutover
runbook, in that order.

**Build duration is a recurring cost, not a one-off.** Because every content
publish triggers a rebuild, the time to prerender 637 pages consumes the monthly
build-minute budget continuously. This is a selection criterion for the static
rendering layer, and is recorded on
[AWK-8](https://linear.app/awkale/issue/AWK-8/choose-the-static-rendering-layer-above-vite).

**An unpublished import renders an empty site.** The build reads the Contentful
Delivery API, which returns only published entries, and the importer creates
drafts by default with publishing behind a separate `--publish` flag. If the BSO
import ran but was never published, the site prerenders successfully with no
content. Verifying this is
[AWK-9](https://linear.app/awkale/issue/AWK-9/audit-the-contentful-space).

**Two Contentful tokens with different homes.** The build needs a read-only
Delivery token, held in Netlify env vars alongside `CONTENTFUL_SPACE_ID` and
`CONTENTFUL_ENVIRONMENT`. The `CFPAT-…` Content Management token can write and
must never enter CI — it stays local, in `~/.contentful-cma-token`, because the
repository is public.

**The nine gist targets now have exactly one durable record.** ADR-0001's
redirect ledger names the cheatsheet URLs but not their gists, and the ids
existed only in `_cheatsheets/*.md` in a repository scheduled for archival:
`bash` → `2a4c8f344b04bc29deb500aad2d72636`, `git` → `6116732`, `homebrew` →
`922318f72934b500ce468d0ae36fc3fa`, `javascript` →
`e9be49111319b0b28b206b5aa217f7fb`, `rails` → `459ffd17364956d98bd0`, `ruby` →
`5b1c5b8f63de792b6c86`, `terminal` → `1128e3349d5c2e79cc5e`, `vim` →
`2de8e3b6334f1f1514b8`, all under `gist.github.com/awkale/`, with
`/cheatsheets/` itself going to `gist.github.com/awkale`.
