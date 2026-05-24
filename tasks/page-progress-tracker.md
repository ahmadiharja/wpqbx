# QUBYX Page Progress Tracker

Last updated: 2026-05-24

This tracker records pages that should exist for the QUBYX enterprise website, whether they are import-ready in `plugins/qubyx-content-importer/inc/content-data.php`, and what still needs review.

Preview note: local file preview now uses `preview/page.html?slug=...` so mega-menu and footer links can open visible static page previews instead of resolving to missing `D:/products/...` or `D:/solutions/...` paths.

## Summary

| Area | Done | Previewed | Notes |
| --- | ---: | ---: | --- |
| Product CPT pages | 6 | Yes | Product pages are imported as `product` CPT entries and linked from mega menu. |
| Solution pages | 12 | Yes | Core workflow pages plus Remote Monitor QA, DICOM Calibration, Multi-site Hospital Networks, Teleradiology, Mammography, and Pathology. |
| Industry pages | 5 | Yes | Industries hub plus Healthcare, Medical Imaging, Display Manufacturing, and Broadcast/Post-production. |
| Store/support/company pages | 18 | Yes | Navigation, support, legal, conversion, and trust pages. |
| Comparison pages | 6 | Yes | Three competitor alternatives plus two category SEO pages and Compare hub. |
| Resources/posts | 11 | Yes | Resources, news, blog, product updates, AAPM TG270, and DIN 6868-157 content exist as CPT/posts. |

## Mega Menu Pages

| Status | Type | URL | Import Key | SEO Intent | Next Action |
| --- | --- | --- | --- | --- | --- |
| Done | Product CPT | `/products/perfectlum/` | `perfectlum` | medical display calibration and DICOM QA software | Add final screenshots and confirmed pricing. |
| Done | Product CPT | `/products/perfectchroma/` | `perfectchroma` | professional display calibration software | Add product UI screenshots and trial/store links. |
| Done | Product CPT | `/products/perfectepd/` | `perfectepd` | e-paper display calibration and QA | Add verified product specifications. |
| Done | Product CPT | `/products/qubyx-remoteqa/` | `qubyx-remoteqa` | remote monitor QA and centralized fleet reporting | Add architecture diagram and security proof. |
| Done | Product CPT | `/products/qubyx-smartsensor-s1/` | `qubyx-smartsensor-s1` | compact luminance QA sensor | Add final hardware specs and photos. |
| Done | Product CPT | `/products/qubyx-smartsensor-s2/` | `qubyx-smartsensor-s2` | advanced display validation sensor | Add final hardware specs and photos. |
| Done | Page | `/solutions/` | `solutions` | display calibration solutions | Expand with visual solution cards in WordPress editor. |
| Done | Page | `/solutions/medical-display-qa/` | `solution-medical-display-qa` | medical display QA software | Add compliance proof and customer-safe claims. |
| Done | Page | `/solutions/dicom-calibration/` | `solution-dicom-calibration` | DICOM calibration software | Add standard-by-standard table after review. |
| Done | Page | `/solutions/remote-monitor-qa/` | `solution-remote-monitor-qa` | remote monitor QA software | Add RemoteQA screenshots and deployment model. |
| Done | Page | `/solutions/multi-site-hospital-networks/` | `solution-multi-site-hospital-networks` | multi-site hospital display QA | Add healthcare case study when available. |
| Done | Page | `/solutions/teleradiology-display-qa/` | `solution-teleradiology-display-qa` | teleradiology display QA | Add remote reading deployment proof. |
| Done | Page | `/solutions/mammography-display-qa/` | `solution-mammography-display-qa` | mammography monitor calibration | Add breast imaging proof and reviewed claims. |
| Done | Page | `/solutions/pathology-display-calibration/` | `solution-pathology-display-calibration` | pathology display calibration | Add digital pathology workflow proof. |
| Done | Page | `/solutions/enterprise-display-management/` | `solution-enterprise-display-management` | enterprise display management | Add fleet dashboard imagery. |
| Done | Page | `/solutions/color-critical-workflows/` | `solution-color-critical-workflows` | professional display calibration software | Add creative workflow assets. |
| Done | Page | `/solutions/oem-display-calibration/` | `solution-oem-display-calibration` | OEM display calibration | Add OEM partner proof. |
| Done | Page | `/solutions/epaper-display-qa/` | `solution-epaper-display-qa` | e-paper display QA | Add measurement examples. |
| Done | Page | `/industries/` | `industries` | display calibration by industry | Add industry thumbnails. |
| Done | Page | `/industries/healthcare/` | `industry-healthcare` | healthcare display calibration | Add healthcare trust proof. |
| Done | Page | `/industries/medical-imaging/` | `industry-medical-imaging` | medical imaging display calibration | Add radiology workflow proof. |
| Done | Page | `/industries/display-manufacturing/` | `industry-display-manufacturing` | display manufacturing calibration | Add OEM manufacturing proof. |
| Done | Page | `/industries/broadcast-post-production/` | `industry-broadcast-post-production` | broadcast monitor calibration | Add creative production imagery. |
| Done | Page | `/store/` | `store` | display calibration software store | Convert to WooCommerce flow later. |
| Done | Page | `/support/` | `support` | QUBYX support | Add actual support SLAs when confirmed. |
| Done | Page | `/downloads/` | `downloads` | QUBYX downloads | Add real installer links. |
| Done | Page | `/support/documentation/` | `documentation` | QUBYX documentation | Split into knowledge base later. |
| Done | Page | `/support/contact-support/` | `contact-support` | contact QUBYX support | Wire support form. |
| Done | Page | `/support/warranty-rma/` | `warranty-rma` | QUBYX warranty RMA | Replace with reviewed warranty terms. |
| Done | Page | `/security/` | `security` | QUBYX security | Add reviewed security documentation. |
| Done | Page | `/company/` | `company` | QUBYX display calibration company | Add official timeline and leadership if approved. |
| Done | Page | `/company/about/` | `about` | about QUBYX | Add verified company story. |
| Done | Page | `/partners/` | `partners` | QUBYX partners | Add partner form and partner tiers. |
| Done | Page | `/contact/` | `contact` | contact QUBYX | Wire routing form. |
| Done | Page | `/request-demo/` | `request-demo` | QUBYX demo | Wire demo form and CRM fields. |
| Done | Page | `/privacy/` | `privacy` | privacy policy | Needs legal review. |
| Done | Page | `/terms/` | `terms` | terms of service | Needs legal review. |
| Done | Page | `/cookies/` | `cookies` | cookie policy | Needs legal review. |

## Comparison Pages

| Status | URL | Import Key | SEO Intent | Next Action |
| --- | --- | --- | --- | --- |
| Done | `/compare/` | `compare` | display calibration software comparison | Add comparison matrix. |
| Done | `/compare/calman-alternative/` | `calman-alternative` | Calman alternative | Add factual comparison table after legal review. |
| Done | `/compare/displaycal-alternative/` | `displaycal-alternative` | DisplayCAL alternative | Add workflow-fit checklist. |
| Done | `/compare/datacolor-spyder-alternative/` | `datacolor-spyder-alternative` | Datacolor Spyder alternative | Add buyer transition checklist. |
| Done | `/compare/best-monitor-calibration-software/` | `best-monitor-calibration-software` | best monitor calibration software | Add neutral category comparison. |
| Done | `/compare/medical-display-calibration-software/` | `medical-display-calibration-software` | medical display calibration software | Add DICOM buyer checklist. |

## Completed SEO Expansion

| Status | URL | Intent | Why |
| --- | --- | --- | --- |
| Done | `/solutions/teleradiology-display-qa/` | teleradiology display QA | Strong medical SEO expansion with import-ready page content. |
| Done | `/solutions/mammography-display-qa/` | mammography monitor calibration | High-value clinical niche with import-ready page content. |
| Done | `/solutions/pathology-display-calibration/` | pathology display calibration | Adjacent medical imaging intent with import-ready page content. |
| Done | `/resources/aapm-tg270-display-qa-guide/` | AAPM TG270 display QA | Compliance article expansion with resource CPT content. |
| Done | `/resources/din-6868-157-display-qa/` | DIN 6868-157 display QA | Regional compliance article with resource CPT content. |

## Agent Notes

Use `agents/page-progress-tracker.md` to continue this tracker in future sessions.

2026-05-24: Static preview `preview/page.html` now renders distinct single-page templates for product, solution, store, resource, support, and company/comparison pages. All 55 preview slugs have page-specific SEO copy blocks instead of relying on generic fallback text. WordPress `page.php` now also detects page families and changes hero/body/aside layout for product hubs, solutions, store, resources, support, and company pages.

2026-05-24: Store preview at `.../preview/page.html?slug=store` was redesigned as a WooCommerce-ready catalog with quote builder hero, workflow filters, product cards, recommended bundles, and enterprise procurement content.
