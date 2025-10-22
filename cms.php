<?php
variables([
	//'link-to-section-home' => true,
	'social' => [
		[ 'type' => 'facebook', 'url' => 'https://www.facebook.com/vidyashankarchennai', 'name' => 'Vidya FB' ],
		[ 'type' => 'instagram', 'url' => 'https://www.instagram.com/vidyashankarchennai/', 'name' => 'Vidya IG' ],
		[ 'type' => 'linkedin', 'url' => 'https://www.linkedin.com/in/vidya-shankar-1453ab49/', 'name' => 'Vidya LI' ],
		[ 'type' => 'youtube', 'url' => 'https://www.youtube.com/@awaken-to-life', 'name' => 'ATL YT' ],
	],
	'footer-variation' => 'single-widget',
	//
	'no-seo-info' => !variable('local'),
	'no-search' => true,
	'link-to-node-home' => nodeIs('news-online'),
	'wants-sentencecase-for-headings' => true,
]);

function site_before_render() {
	runFeature('engage'); //needed for floating button
	variable('htmlReplaces', [
		'Vidya' => '<span class="h5 cursive">Vidya Shankar Chakravarthy</span>',
		'AwakenToLife' => '<span class="h5 cursive">' . variable('name') . '</span>',
	]);

	$noInner = nodeIsNot('articles') && !sectionIs('books');
	variables([
		//todo - undo the moron logic of messing up 2 variables!
		'skip-directory' => $noInner, //TODO: enable when each page has inner content
		'no-page-menu' => $noInner,
	]);

	/*
	if (nodeIs(SITEHOME)) {
		variable('sub-theme', 'parallax');
	}
	*/
}

function enrichThemeVars($vars, $what) {
	if ($what == 'header' && nodeIs(SITEHOME)) {
		$vars['optional-slider'] = returnLines(SITEPATH . '/data/snippets/parallax-slider.html');
	}

	return $vars;
}

function after_footer_assets() {
	if (nodeIs(SITEHOME))
		echo getSnippet('slider-footer');

	//echo getThemeSnippet('floating-button');
}
