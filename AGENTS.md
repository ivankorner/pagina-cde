# AGENTS.md

## What this repo is

Static HTML snippets (not a standalone app) for the Concejo Deliberante de El Dorado WordPress site (`cdeldorado.gob.ar`). Each file is a component block to paste into WordPress as a Custom HTML block.

## Files

- `Header.html` — Site header with sticky nav, mobile menu, search modal, and all CSS/JS inline
- `Pag-Concejales.html` — Concejales (council members) team grid
- `Pag-Secretarias.html` — Secretarías team grid

## WordPress deployment

These files are **not deployed directly**. Copy the file content and paste it into a WordPress "HTML personalizado" block. All styles and scripts are self-contained (no external dependencies besides Google Fonts).

## API

- WordPress REST API: `https://cdeldorado.gob.ar/wp-json/wp/v2/`
- Posts (Novedades, category ID 1): `?categories=1&search={query}&_embed`
- Featured images via `_embed=wp:featuredmedia`

## Style conventions

- BEM-like naming: `cde-` prefix, double-underscore for elements, double-dash for modifiers
- CSS custom properties in `:root` (`--cde-blue`, `--cde-gold`, `--cde-gray-*`)
- Font: Plus Jakarta Sans (loaded via Google Fonts)
- Touch targets minimum 44x44px for mobile

## Gotchas

- `Header.html` contains **all** CSS and JS inline — no build step
- Mobile menu breakpoint: 1100px. Topbar hidden at 768px.
- Search is hidden on desktop ≤1100px; mobile search button is inline-styled in the mobile nav
- Image URLs use both `http://` and `https://` — some images may need protocol fix
