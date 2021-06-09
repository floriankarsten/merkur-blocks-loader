<?php
@include_once __DIR__ . '/vendor/autoload.php';

$blocks = \Merkur\Blocksloader::loadBlocks();

Kirby::plugin('floriankarsten/merkur-blocks-loader', [
	'blueprints' => $blocks['blueprints'],
	'snippets' => $blocks['snippets'],
]);