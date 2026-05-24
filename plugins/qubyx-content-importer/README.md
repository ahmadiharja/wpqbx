# Qubyx Content Importer

Companion plugin for the Qubyx classic theme.

## What It Imports

- Front page content and ACF/post meta
- Core pages: Solutions, Store, Blog, Support, Downloads, Company, About, Partners, Contact, Request Demo
- Solution pages: Medical Display QA, Enterprise Display Management, Color-Critical Workflows, OEM Display Calibration, E-paper Display QA
- Support pages: Documentation, Contact Support, Warranty and RMA
- Legal/trust pages: Privacy, Terms, Cookies, Security
- Product CPT entries: PerfectLum, PerfectChroma, PerfectEPD, Qubyx RemoteQA, SmartSensor S1, SmartSensor S2
- Resource CPT entries for SEO guides, comparisons, compliance, and technical notes
- Blog/news posts
- Product, resource, and post categories
- Primary and footer menus
- WordPress front page and posts page settings

## How To Use

1. Copy `plugins/qubyx-content-importer` into `wp-content/plugins/`.
2. Activate **Qubyx Content Importer**.
3. Go to **Tools > Qubyx Importer**.
4. Click **Import or Update Qubyx Content**.

The importer is idempotent. It updates items by the `_qubyx_seed_key` meta value instead of creating duplicates.

## Private Updates

The plugin can also act as the private updater for itself and the Qubyx theme.

- Manifest URL setting: **Tools > Qubyx Importer > Automatic Updates**
- Default manifest: `https://updates.qubyx.com/manifest.json`
- Theme package ID: `qubyx-theme`
- Plugin package ID: `qubyx-content-importer`

When a Qubyx theme or importer update finishes, the plugin can automatically run the content importer so pages, products, resources, posts, categories, menus, ACF/meta fields, and SEO metadata stay in sync with the packaged codebase.

See `docs/automatic-updates.md` in the theme repo for the Cloudflare Worker deployment flow.

## WPML Notes

Seed strings are registered under the **Qubyx Content Importer** WPML String Translation context.

For translated pages, products, resources, and ACF fields, use:

- WPML post translation
- ACFML for ACF field translations
