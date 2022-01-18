# Merkur Blocks Loader

Kirby CMS plugin for automatically loading blocks from folder (default `site/blocks`). Useful for organisation. This is part of Merkur but it can be used alone.

Kirby by default for "example" block uses files `site/blueprints/blocks/example.yml` and `site/snippets/blocks/eample.php` this plugin adds possibility to load using `site/blocks/example/example.yml` and `site/blocks/example/example.php`.

## Install
```
composer require floriankarsten/merkur-blocks-loader
```
or just download the repo and put it into `site/plugins`

## How to use
Plugin doesn't require any additional setup.
You can change name of `blocks` directory using option `floriankarsten.merkur-blocks-loader.dirname`.
You can turn off caching using `floriankarsten.merkur-blocks-loader.cache`

```php
// Default settings
[
	'floriankarsten.merkur-blocks-loader' => [
		'cache' => true,
		'dirname' => 'blocks'
	],
]
```


## Caching
There is very basic caching strategy thats turned on when option `debug` = false. I probably have to come up with something better (ideas welcome) but it works OK now. Cache can be turned off using `floriankarsten.merkur-blocks-loader.cache` === `false`

## Loading chain
Files loaded from `plugins` <  Files loaded from `Blocks Loader` < Files loaded from `default` paths

When you load multiple blueprint/template with same name it gets overwritten and the last one gets used. Kirby default paths go last so they will take precedence over everything. This plugin loads files from `system.loadPlugins:after` hook so it will take precedence over files loaded from plugins. For example if you have both `site/blueprints/blocks/example.yml` and `site/blocks/example/example.yml` then default `site/blueprints/blocks/example.yml` will be used.

# Ideas
- How to make caching better?
- Loading from multiple locations?
