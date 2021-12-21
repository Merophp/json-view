# Introduction

JSON view plugin for merophp/view-engine.

## Installation

Via composer:

<code>
composer require merophp/json-view
</code>

## Basic Usage

<pre><code>require_once 'vendor/autoload.php';

use Merophp\JsonViewPlugin\JsonView;

use Merophp\ViewEngine\ViewEngine;
use Merophp\ViewEngine\ViewPlugin\Collection\ViewPluginCollection;
use Merophp\ViewEngine\ViewPlugin\Provider\ViewPluginProvider;
use Merophp\ViewEngine\ViewPlugin\ViewPlugin;

$collection = new ViewPluginCollection();
$collection->add(
    new ViewPlugin(JsonView::class),
]);

$provider = new ViewPluginProvider($collection);

$viewEngine = new ViewEngine($provider);

$view = $viewEngine->initializeView();
$view->json(['foo'=>'bar');
echo $viewEngine->renderView($view);
</code></pre>
