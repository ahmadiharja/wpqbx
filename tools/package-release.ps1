param(
	[string] $ThemeVersion = "",
	[string] $PluginVersion = ""
)

$ErrorActionPreference = "Stop"

$root = Resolve-Path (Join-Path $PSScriptRoot "..")
$dist = Join-Path $root "dist"
$stage = Join-Path $dist "_stage"
$downloads = Join-Path $root "update-server\public\downloads"

function Get-RegexValue {
	param(
		[string] $Path,
		[string] $Pattern
	)
	$content = Get-Content -LiteralPath $Path -Raw
	$match = [regex]::Match($content, $Pattern, [System.Text.RegularExpressions.RegexOptions]::Multiline)
	if (-not $match.Success) {
		throw "Could not read version from $Path"
	}
	return $match.Groups[1].Value
}

if (-not $ThemeVersion) {
	$ThemeVersion = Get-RegexValue -Path (Join-Path $root "style.css") -Pattern "^\s*Version:\s*([^\r\n]+)"
}

if (-not $PluginVersion) {
	$PluginVersion = Get-RegexValue -Path (Join-Path $root "plugins\qubyx-content-importer\qubyx-content-importer.php") -Pattern "^\s*\*\s*Version:\s*([^\r\n]+)"
}

New-Item -ItemType Directory -Force -Path $dist, $downloads | Out-Null

$resolvedStage = [System.IO.Path]::GetFullPath($stage)
$resolvedDist = [System.IO.Path]::GetFullPath($dist)
if (-not $resolvedStage.StartsWith($resolvedDist, [System.StringComparison]::OrdinalIgnoreCase)) {
	throw "Refusing to clear staging outside dist: $resolvedStage"
}

if (Test-Path -LiteralPath $stage) {
	Remove-Item -LiteralPath $stage -Recurse -Force
}
New-Item -ItemType Directory -Force -Path $stage | Out-Null

$themeStage = Join-Path $stage "qubyx-theme"
$pluginStage = Join-Path $stage "qubyx-content-importer"
New-Item -ItemType Directory -Force -Path $themeStage, $pluginStage | Out-Null

Get-ChildItem -LiteralPath $root -File | Where-Object {
	$_.Name -match "\.php$|^style\.css$|^theme\.json$|^README\.md$"
} | ForEach-Object {
	Copy-Item -LiteralPath $_.FullName -Destination $themeStage
}

foreach ($dir in @("assets", "inc", "template-parts")) {
	Copy-Item -LiteralPath (Join-Path $root $dir) -Destination $themeStage -Recurse
}

Copy-Item -Path (Join-Path $root "plugins\qubyx-content-importer\*") -Destination $pluginStage -Recurse

$themeZip = Join-Path $dist "qubyx-theme-$ThemeVersion.zip"
$pluginZip = Join-Path $dist "qubyx-content-importer-$PluginVersion.zip"

Remove-Item -LiteralPath $themeZip, $pluginZip -Force -ErrorAction SilentlyContinue
Compress-Archive -LiteralPath $themeStage -DestinationPath $themeZip -Force
Compress-Archive -LiteralPath $pluginStage -DestinationPath $pluginZip -Force

Copy-Item -LiteralPath $themeZip -Destination (Join-Path $downloads (Split-Path $themeZip -Leaf)) -Force
Copy-Item -LiteralPath $pluginZip -Destination (Join-Path $downloads (Split-Path $pluginZip -Leaf)) -Force

Write-Host "Packaged:"
Write-Host " - $themeZip"
Write-Host " - $pluginZip"
Write-Host ""
Write-Host "Copied packages into update-server/public/downloads."
Write-Host "If you changed versions, update update-server/src/index.js before deploying the Worker."
