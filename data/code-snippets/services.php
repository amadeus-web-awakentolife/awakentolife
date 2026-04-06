<?php
$items = [
	//['image-name' => '../vidya-dias.png', 'slug' => ''],
	['image-name' => 'vidya-business-acceleration.jpg', 'slug' => 'business-acceleration'],
	['image-name' => 'vidya-parental-education.jpg', 'slug' => 'parents'],
	['image-name' => 'vidya-montessori-trainer.jpg', 'slug' => 'montessori-education'],
	['image-name' => 'vidya-sanitary-hygiene.jpg', 'slug' => 'feminine-care'],
	['image-name' => 'vidya-environment.png?fver=3', 'slug' => 'environmental-stewardship'],
	['image-name' => 'vidya-posh.jpg', 'slug' => 'posh'],
];

$start = sprintf('	<div class="col-md-%s mt-sm-2 pt-xs-3 p-2"><hr class="d-sm-none">', '3') . NEWLINE;
$optlImg = nodeIs(SITEHOME) ? '' : '<img class="img-fluid" src="%site-assets%cdn/%image-name%" />';
$tpl = replaceHtml('		<a href="%item-link%"><h3>%heading%</h3>' . $optlImg . '</a>');

$op = nodeIs(SITEHOME) ? '' : '<div class="row">' . NEWLINES2;

foreach ($items as $ix => $item) {
	if ($ix == 0 && nodeIs(SITEHOME)) continue;
	$op .= nodeIs(SITEHOME) ? '' : $start;
	$item['heading'] = replaceHtml(humanize($item['slug'] == '' ? '%AwakenToLife%' : $item['slug']));
	$item['item-link'] = pageUrl($item['slug']);
	$op .= replaceItems($tpl, $item, '%');
	$op .= nodeIs(SITEHOME) ? '' : '	</div>' . NEWLINES2; //row ends
}

$op .= nodeIs(SITEHOME) ? '' : '</div>'; //row ends

return $op;
