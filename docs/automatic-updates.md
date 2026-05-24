# Qubyx Automatic WordPress Updates

This repo is set up so Qubyx code and seeded content can update without manually copying files into WordPress.

## Architecture

1. Push changes to GitHub.
2. GitHub Actions packages:
   - `qubyx-theme-{version}.zip`
   - `qubyx-content-importer-{version}.zip`
3. The action deploys `update-server/` to Cloudflare Workers.
4. WordPress checks the Cloudflare manifest:
   - `https://updates.qubyx.com/manifest.json`
5. WordPress updates the private theme/plugin through the normal updater.
6. The importer runs automatically after a Qubyx theme/plugin update if enabled in **Tools > Qubyx Importer**.

## Cloudflare Setup

Create a Worker route or custom domain for:

```text
https://updates.qubyx.com
```

The Cloudflare account ID is already wired into the GitHub workflow and `wrangler.toml`:

```text
c75d1c874847bf74e930e26b30615d9d
```

Add this GitHub repository secret:

```text
CLOUDFLARE_API_TOKEN
```

The token needs permission to deploy Workers for the Cloudflare account.

The GitHub repository configured for this project is:

```text
https://github.com/ahmadiharja/wpqbx.git
```

## Versioning

Update both files when releasing:

```text
style.css
plugins/qubyx-content-importer/qubyx-content-importer.php
```

Then update package versions in:

```text
update-server/src/index.js
```

The ZIP filenames in `update-server/src/index.js` must match the package output:

```text
qubyx-theme-1.0.0.zip
qubyx-content-importer-1.0.0.zip
```

## Local Packaging

Run from the repo root:

```powershell
powershell -ExecutionPolicy Bypass -File .\tools\package-release.ps1
```

The script creates ZIPs in `dist/` and copies them into:

```text
update-server/public/downloads/
```

## Local Cloudflare Deploy

If deploying locally instead of through GitHub Actions, set `CLOUDFLARE_API_TOKEN` in your terminal session and run:

```powershell
cd .\update-server
npm install
npm run deploy
```

Do not commit API tokens into this repository.

## WordPress Setup

1. Install and activate the Qubyx theme once.
2. Install and activate **Qubyx Content Importer** once.
3. Go to **Tools > Qubyx Importer**.
4. Confirm the manifest URL:

```text
https://updates.qubyx.com/manifest.json
```

5. Leave **Run the importer automatically after Qubyx theme or plugin updates** enabled.

After that, updates can flow through the WordPress update screen or WordPress auto-updates.

## Content Sync Behavior

The importer remains idempotent. It identifies seeded content with `_qubyx_seed_key`, then updates pages, products, resources, posts, taxonomies, menus, ACF/meta fields, and SEO metadata from `inc/content-data.php`.

For production sites where editors heavily modify imported body copy in WordPress, add a preservation policy before enabling automatic imports.
