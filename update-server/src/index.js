const PACKAGES = {
	"qubyx-content-importer": {
		id: "qubyx-content-importer",
		name: "Qubyx Content Importer",
		version: "1.0.0",
		file: "downloads/qubyx-content-importer-1.0.0.zip",
		homepage: "https://qubyx.com",
		requires: "6.0",
		tested: "6.6",
		requires_php: "7.4",
		last_updated: "2026-05-24",
		sections: {
			description: "Imports and updates Qubyx pages, products, resources, posts, taxonomies, menus, ACF/meta fields, and SEO metadata.",
			changelog: "Initial private update channel with automatic post-update content sync."
		}
	},
	"qubyx-theme": {
		id: "qubyx-theme",
		name: "Qubyx Theme",
		version: "1.0.0",
		file: "downloads/qubyx-theme-1.0.0.zip",
		homepage: "https://qubyx.com",
		requires: "6.0",
		tested: "6.6",
		requires_php: "7.4",
		last_updated: "2026-05-24",
		sections: {
			description: "Classic WordPress theme for Qubyx pages, products, resources, articles, and store-ready layouts.",
			changelog: "Initial private update channel."
		}
	}
};

function json(data, status = 200) {
	return new Response(JSON.stringify(data, null, 2), {
		status,
		headers: {
			"content-type": "application/json; charset=utf-8",
			"cache-control": "public, max-age=300"
		}
	});
}

function manifest(request) {
	const url = new URL(request.url);
	const base = `${url.protocol}//${url.host}`;
	const packages = {};

	for (const [id, pkg] of Object.entries(PACKAGES)) {
		packages[id] = {
			...pkg,
			download_url: `${base}/${pkg.file}`
		};
		delete packages[id].file;
	}

	return {
		name: "Qubyx private WordPress updates",
		generated_at: new Date().toISOString(),
		packages
	};
}

export default {
	async fetch(request, env) {
		const url = new URL(request.url);

		if (url.pathname === "/" || url.pathname === "/manifest.json") {
			return json(manifest(request));
		}

		if (url.pathname.startsWith("/downloads/")) {
			const assetResponse = await env.ASSETS.fetch(request);
			if (assetResponse.status === 404) {
				return json({ error: "Package not found" }, 404);
			}
			const headers = new Headers(assetResponse.headers);
			headers.set("cache-control", "public, max-age=300");
			headers.set("x-content-type-options", "nosniff");
			return new Response(assetResponse.body, {
				status: assetResponse.status,
				statusText: assetResponse.statusText,
				headers
			});
		}

		return json({ error: "Not found" }, 404);
	}
};
