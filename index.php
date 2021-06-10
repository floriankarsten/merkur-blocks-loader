<?php
@include_once __DIR__ . '/vendor/autoload.php';


Kirby::plugin('floriankarsten/merkur-blocks-loader', [
	'options' => [
		'cache' => true
	],

	'hooks' => [
        'system.loadPlugins:after' => function () {
			if(option('debug')) {
				$blocks = \Merkur\Blocksloader::loadBlocks();
			} else {
				$blocksCache = kirby()->cache('floriankarsten.merkur-blocks-loader');
				$blocks = $blocksCache->get('blocks');
				ray($blocks);

				if($blocks === null) {
					$blocks = \Merkur\Blocksloader::loadBlocks();
					$blocksCache->set('blocks', $blocks, 600);
				}
			}

			if(!empty($blocks['blueprints']) || !empty($blocks['snippets'])) {
				kirby()->extend([
					'blueprints' => $blocks['blueprints'],
					'snippets' => $blocks['snippets'],
				], kirby()->plugin('floriankarsten.merkur-blocks-loader'));
			}
        }
    ]
]);
