<?php
variables([
	'link-to-sub-node-home' => true,
	'siteAIReplaces' => [
		'https://wiseowls.life/imran-ali-namazi/' => replaceNetworkUrls('%urlOf-imran%'),
		'https://imran.wiseowls.life/2025-' => replaceNetworkUrls('%urlOf-imran%2025-'),
		'https://Imran.wiseowls.life/' =>  replaceNetworkUrls('%urlOf-imran%writing/'),
	]
]);

function site_before_render() {
	if (getPageParameterAt(1) && nodeIsOneOf(['little-things', 'wordplay']))
		variable('skip-container-for-this-page', true);

	$section = variable('section');
	if ($section != 'ideas') return;

	$node = variable('node');
	if ($section == $node) return;

	DEFINE('NODEPATH', SITEPATH . '/' . variable('section') . '/' . $node);
	variables([
		'nodeSiteName' => humanize($node),
		'nodeSafeName' => $node,
		'submenu-at-node' => true,
		'nodes-have-files' => true,
		'dont-overwrite-logo' => $section == 'ideas',
	]);
}
