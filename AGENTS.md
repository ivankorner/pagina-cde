# AGENTS.md

## What this repo is

Static HTML snippets (not a standalone app) for the Concejo Deliberante de El Dorado WordPress site (`cdeldorado.gob.ar`). Each file is a component block to paste into WordPress as a Custom HTML block.

## Files

- `Header.html` — Site header with sticky nav, mobile menu, search modal, and all CSS/JS inline
- `Footer.html` — Fixed footer with logo, links, social icons, and copyright
- `Pag-Concejales.html` — Concejales (council members) team grid
- `Pag-Secretarias.html` — Secretarías team grid

## WordPress deployment

These files are **not deployed directly**. Copy the file content and paste it into a WordPress "HTML personalizado" block. All styles and scripts are self-contained (no external dependencies besides Google Fonts).

## API

- WordPress REST API: `https://cdeldorado.gob.ar/wp-json/wp/v2/`
- Posts (Novedades, category ID 1): `?categories=1&search={query}&_embed`
- Featured images via `_embed=wp:featuredmedia`

## Design system

### Color palette (CSS custom properties)

- `--cde-blue` — Primary blue (`#1e3a5f`)
- `--cde-blue-dark` — Dark blue (`#152c4a`)
- `#2e4f7a` — Gradient start (light blue, footer + topbar)
- `#0e2038` — Gradient end (night blue, footer + topbar)
- Shared gradient: `linear-gradient(135deg, #2e4f7a 0%, var(--cde-blue) 45%, #0e2038 100%)` — must stay identical in `Header.html` (`.cde-topbar`) and `Footer.html` (`.cde-footer`)
- Gold divider: footer `border-top: 3px solid var(--cde-gold)` / topbar `border-bottom: 2px solid var(--cde-gold)`
- `--cde-gold` — Accent gold
- `--cde-gold-light` — Hover gold accent
- `--cde-white` — White text/backgrounds
- `--cde-gray-*` — Gray scale variants

### Typography

- Font: Plus Jakarta Sans (loaded via Google Fonts via `Header.html`)
- All typography inherits from header CSS variables

### Spacing & layout

- Container max-width: `1280px` (`.cde-container`)
- Touch targets minimum: `44x44px` for mobile
- Transition variable: `--cde-transition` for hover/animation effects

### Responsive breakpoints

- `1100px` — Tablet breakpoint (nav collapses, footer stacks vertically)
- `768px` — Mobile breakpoint (topbar hidden, reduced sizes)
- `480px` — Small mobile (referenced in some components)

### Naming conventions (BEM-like)

- Prefix: `cde-`
- Elements: double-underscore (`cde-footer__logo`)
- Modifiers: double-dash (`cde-nav--scrolled`)
- All CSS is scoped to `cde-*` classes to avoid WordPress conflicts

## Component patterns

### Sticky header (`Header.html`)

- `position: fixed; top: 0` with `z-index: 1000`
- Topbar uses the shared blue gradient + `border-bottom: 2px solid var(--cde-gold)`; `.cde-header` body stays white
- Topbar hidden at 768px, so gradient detail is desktop/tablet only
- Scroll detection adds `.cde-nav--scrolled` class for background change
- Mobile menu: hamburger toggles `.cde-nav__menu--open`
- Search: hidden on desktop ≤1100px; mobile search button inline-styled in mobile nav

### Fixed footer (`Footer.html`)

- `position: fixed; bottom: 0` with `z-index: 100`
- Background uses the shared blue gradient + `border-top: 3px solid var(--cde-gold)`
- Dynamic spacer via `ResizeObserver` prevents content overlap
- Container centered at `1280px`, background full-width
- Footer HTML block must be placed **after** content blocks in WordPress

## Gotchas

- `Header.html` contains **all** CSS and JS inline — no build step
- Mobile menu breakpoint: 1100px. Topbar hidden at 768px.
- Search is hidden on desktop ≤1100px; mobile search button is inline-styled in the mobile nav
- Image URLs use both `http://` and `https://` — always use `https://` for new images
- WordPress may lazy-load images with `data-src` — use `src` directly in our HTML blocks
- Footer spacer JS must run after DOM is ready — use `DOMContentLoaded` or place script at end of block
