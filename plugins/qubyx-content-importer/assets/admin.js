(function () {
	'use strict';

	const form = document.querySelector('[data-qubyx-ai-form]');
	if (!form || typeof QubyxCI === 'undefined') {
		return;
	}

	const result = document.querySelector('[data-qubyx-ai-result]');
	const output = document.querySelector('[data-qubyx-ai-output]');
	const actions = document.querySelector('[data-qubyx-ai-actions]');
	const submit = form.querySelector('button[type="submit"]');

	function escapeHtml(value) {
		return String(value || '').replace(/[&<>"']/g, function (char) {
			return {
				'&': '&amp;',
				'<': '&lt;',
				'>': '&gt;',
				'"': '&quot;',
				"'": '&#039;'
			}[char];
		});
	}

	function setLoading(isLoading) {
		if (!submit) {
			return;
		}
		submit.disabled = isLoading;
		submit.textContent = isLoading ? QubyxCI.i18n.generating : 'Generate Draft';
	}

	function renderArticle(payload) {
		const article = payload.article || {};
		const draft = payload.draft || null;
		const citations = Array.isArray(article.citations) ? article.citations : [];
		const citationHtml = citations.length
			? '<h3>Sources</h3><ul>' + citations.map(function (item) {
				return '<li><a href="' + escapeHtml(item.url) + '" target="_blank" rel="noopener">' + escapeHtml(item.title || item.url) + '</a></li>';
			}).join('') + '</ul>'
			: '';

		output.innerHTML = [
			'<article class="qubyx-ai-preview">',
			'<p class="qubyx-kicker">Draft preview</p>',
			'<h2>' + escapeHtml(article.title) + '</h2>',
			'<p class="qubyx-ai-excerpt">' + escapeHtml(article.excerpt) + '</p>',
			'<div class="qubyx-ai-meta"><span>' + escapeHtml(article.reading_time || 6) + ' min read</span><span>' + escapeHtml(article.seo_title || '') + '</span></div>',
			'<div class="qubyx-ai-content">' + (article.content_html || '') + '</div>',
			citationHtml,
			'</article>'
		].join('');

		actions.innerHTML = draft && draft.edit_url
			? '<a class="qubyx-button qubyx-button--primary" href="' + escapeHtml(draft.edit_url) + '">Edit Draft</a>'
			: '';

		result.hidden = false;
		result.scrollIntoView({ behavior: 'smooth', block: 'start' });
	}

	function renderError(message) {
		output.innerHTML = '<div class="qubyx-notice qubyx-notice--error"><strong>Error.</strong><span>' + escapeHtml(message || QubyxCI.i18n.error) + '</span></div>';
		actions.innerHTML = '';
		result.hidden = false;
		result.scrollIntoView({ behavior: 'smooth', block: 'start' });
	}

	form.addEventListener('submit', function (event) {
		event.preventDefault();
		setLoading(true);

		const data = new FormData(form);
		data.append('action', 'qubyx_ci_ai_generate');
		data.append('nonce', QubyxCI.nonce);

		fetch(QubyxCI.ajaxUrl, {
			method: 'POST',
			credentials: 'same-origin',
			body: data
		})
			.then(function (response) {
				return response.json();
			})
			.then(function (json) {
				if (!json || !json.success) {
					throw new Error(json && json.data && json.data.message ? json.data.message : QubyxCI.i18n.error);
				}
				renderArticle(json.data);
			})
			.catch(function (error) {
				renderError(error.message);
			})
			.finally(function () {
				setLoading(false);
			});
	});
})();
