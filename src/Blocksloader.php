<?php
namespace Merkur;

class Blocksloader {
	public static function loadBlocks() {

		$blocks = ['blueprints' => [], 'snippets' => []];
		$blocksDir = kirby()->root('site') . "/" . option('floriankarsten.merkur-blocks-loader.dirname', 'blocks');
		foreach (\Dir::dirs($blocksDir) as $folder) {
			$blueprint = $blocksDir . "/". $folder . "/" . $folder . ".yml";
			$snippet = $blocksDir . "/". $folder . "/" . $folder . ".php";
			if(\F::exists($blueprint)) {
				$blocks['blueprints']['blocks/'.$folder] = $blueprint;
			}
			if(\F::exists($snippet)) {
				$blocks['snippets']['blocks/'.$folder] = $snippet;
			}
		}
		return $blocks;
	}

}





?>