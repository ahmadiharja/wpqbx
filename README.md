# Qubyx Theme

A modern enterprise **WordPress Classic Theme** for QUBYX company, product, store, resource, news, and article pages. The theme stays focused on layout, while the companion importer seeds the editable WordPress content.

> Content architecture: QUBYX company site, product pages for PerfectLum, PerfectChroma, PerfectEPD, Qubyx RemoteQA, SmartSensor S1, SmartSensor S2, plus resource and blog/news SEO content.

---

## ✨ What's inside

- **Classic theme** (no Gutenberg block-theme, no Elementor/Bricks/Oxygen).
- **PHP template files** + reusable section parts (`hero`, `feature-grid`, `comparison`, `faq`, `testimonials`, `cta`, …).
- **Custom Post Types**: `product`, `resource` (+ matching taxonomies).
- **Companion importer plugin**: seeds enterprise pages, products, resources, blog/news posts, menus, and SEO meta.
- **ACF Pro-friendly** (graceful fallbacks when ACF is missing — no fatal errors).
- **theme.json** typography/color tokens for Gutenberg consistency.
- **Lightweight CSS** in `assets/css/main.css` — design tokens via CSS custom properties.
- **Vanilla JS** — sticky header, mobile menu, scroll reveal, auto-TOC. No jQuery.
- **SEO-friendly** — single H1 per template, semantic HTML5, schema.org for breadcrumbs/FAQ.

---

## 📁 Structure

```
qubyx-theme/
├── style.css                 ← Theme header (WP-required)
├── functions.php             ← Loads /inc modules
├── theme.json                ← Design tokens for Gutenberg
├── header.php / footer.php
├── front-page.php            ← Homepage (composes /sections)
├── page.php / single.php
├── single-product.php        ← Product page template
├── single-resource.php       ← Long-form resource w/ TOC
├── archive.php / index.php / 404.php / search.php
├── inc/
│   ├── theme-setup.php       ← Supports, menus, image sizes
│   ├── enqueue.php           ← Asset loading + preconnect
│   ├── custom-post-types.php ← `product` + `resource` CPTs
│   ├── acf-fields.php        ← Programmatic ACF field groups
│   └── helpers.php           ← qubyx_field(), qubyx_icon(), breadcrumb
├── template-parts/
│   ├── sections/
│   │   ├── hero.php
│   │   ├── feature-grid.php   ← Bento grid
│   │   ├── product-overview.php
│   │   ├── comparison.php
│   │   ├── faq.php            ← Native <details> w/ schema.org
│   │   ├── cta.php
│   │   ├── testimonials.php
│   │   └── resource-grid.php
│   └── components/
│       ├── button.php
│       ├── card.php
│       └── breadcrumb.php
└── assets/
    ├── css/main.css           ← The whole design system
    ├── css/editor.css         ← Gutenberg editor parity
    ├── js/main.js             ← Tiny, deferred
    └── images/
```

---

## 🎨 Design System

**Palette** — warm cream (Claude-inspired) with restrained accents:

| Token | Hex | Use |
|-------|-----|-----|
| `--color-bg`     | `#FAF9F5` | Page background |
| `--color-bg-alt` | `#F2F0E8` | Alt surfaces |
| `--color-ink`    | `#141413` | Body text, dark surfaces |
| `--color-accent` | `#CC5500` | Rust — eyebrow dots, CTAs |
| `--color-blue`   | `#2D5BFF` | Signal blue (rare, technical accents) |
| `--color-border` | `#E8E5DE` | Hairlines |

**Type pairing** — sets the premium tone:

- **`Instrument Serif`** (display headings — Google Font, italic & regular)
- **`Inter`** (body — variable, 400/500/600/700)
- **`JetBrains Mono`** (eyebrows, technical labels, code)

**Layout**: max-width `1200px`, fluid section padding `clamp(72px, 12vw, 140px)`.

---

## 🚀 Installation

1. Copy `qubyx-theme/` into `wp-content/themes/`
2. WordPress Admin → **Appearance → Themes → Activate Qubyx Theme**
3. **Settings → Permalinks → Save** (flushes rewrite rules for CPTs)
4. **Appearance → Menus**: create a menu, assign to `Primary` location
5. (Optional) Install **ACF Pro** — field groups for products/resources auto-register

### Configure the front page

- **Settings → Reading → Front page displays → A static page**
- Create a page named "Home" and select it
- The theme uses `front-page.php` automatically

### Add a Product

- **Products → Add New**
- Fill the ACF tabs: Hero, Features, Benefits, Specifications, Comparison, FAQ, Final CTA
- If ACF isn't installed, the template falls back to graceful defaults

---

## 🔌 ACF Integration

Field groups are registered programmatically in `inc/acf-fields.php`. They activate automatically when ACF Pro is installed — no field-import step.

**Existing groups:**
- `group_qubyx_front` → Front page hero
- `group_qubyx_product` → Full product page (8 tabs)
- `group_qubyx_resource` → Resource metadata (reading time, TOC, related)

**Access in templates:**

```php
$headline = qubyx_field( 'hero_headline', 'Fallback heading' );
$cta      = qubyx_field( 'cta_primary' );
qubyx_render_link( $cta, 'btn--primary btn--lg', 'Talk to sales' );
```

`qubyx_field()` always returns the fallback when ACF isn't active or the field is empty — your site never breaks because a plugin is deactivated.

---

## 🎯 SEO

- Single `<h1>` per template
- Semantic HTML5: `header`, `main`, `nav`, `section`, `article`, `aside`, `footer`
- Breadcrumbs with `schema.org/BreadcrumbList` markup
- FAQ section emits `schema.org/FAQPage` markup
- `title-tag` support → WP/Yoast manages `<title>`
- All output escaped: `esc_html()`, `esc_url()`, `esc_attr()`, `wp_kses_post()`
- Translation-ready: `__()`, `esc_html__()`, text domain `qubyx`

---

## 🤖 AI agent friendliness

The theme is intentionally built to be **edited by Codex / Claude Code**:

- Small, focused files — each section lives in its own `template-parts/sections/*.php`
- Pure PHP + plain HTML — no opaque builder JSON
- Design tokens in CSS custom properties (one place to change colors/spacing)
- ACF fields defined as PHP arrays (easy to diff in git)
- Conventional commits work cleanly because changes touch one file

**Common edits** (and the file to touch):

| Edit | File |
|------|------|
| Change colors / type / spacing | `assets/css/main.css` (top — `:root`) |
| Add a new section to the homepage | new file in `template-parts/sections/`, then call `get_template_part()` from `front-page.php` |
| Add a product field | `inc/acf-fields.php` |
| Add a CPT | `inc/custom-post-types.php` |
| Add a header link | `Appearance → Menus` or `header.php` fallback |
| Tweak the FAQ schema | `template-parts/sections/faq.php` |

---

## 🔗 Future MCP integration

This theme is structured to be controlled by an MCP server later. Recommended approach:

1. **Expose ACF over MCP** — use [`wordpress-mcp`](https://github.com/Automattic/wordpress-mcp) (or build one). The agent reads/writes product fields via `acf/v3/...` REST endpoints.
2. **Surface section templates as MCP tools** — e.g. `add_product`, `update_hero`, `publish_resource`. Each tool maps to a CPT + ACF field group.
3. **Define a `qubyx-design-system.md`** that the agent reads at boot — it documents the tokens, the section parts and the editing conventions above.
4. **Pin the agent to safe operations** — `wp_update_post`, `update_field`, never raw SQL.

With those four pieces, an MCP-enabled agent can ship a new product page or resource article end-to-end without touching the visual builder paradigm at all — because there isn't one.

---

## 📝 Next steps

1. Replace fallback hero image with a real PerfectLum dashboard screenshot
2. Upload real partner logos (currently a text marquee — swap for SVG if desired)
3. Populate **Products** and **Resources** CPTs
4. Wire **Settings → Reading → Front page** to a static "Home" page
5. Add a header logo in **Appearance → Customize → Site Identity**

---

## Qubyx Content Importer

This codebase now includes a companion plugin at `plugins/qubyx-content-importer/`.

Use it when the theme is installed and you want to seed the enterprise QUBYX website content into WordPress:

1. Copy `plugins/qubyx-content-importer/` into `wp-content/plugins/`
2. Activate **Qubyx Content Importer**
3. Open **Tools -> Qubyx Importer**
4. Click **Import or Update Qubyx Content**

The importer creates pages, solution pages, support pages, legal/trust pages, product CPT entries, resource CPT entries, blog/news posts, taxonomies, menus, front-page settings, and SEO meta. It also registers seed strings under the **Qubyx Content Importer** context for WPML String Translation.

The SEO page creation roadmap is saved at `tasks/seo-content-page-roadmap.md`.

## Reusable Agents

Reusable agent prompts are saved in `agents/`:

- `content-strategist.md`
- `seo-architect.md`
- `wordpress-importer.md`
- `wpml-localization.md`
- `theme-maintainer.md`

## License

GPL v2 or later — same as WordPress.
