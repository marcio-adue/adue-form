<?php

$finder = \PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests')
    ->exculde(__DIR__.'/tests/views');

$config = \PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'single_quote' => true,
        'ordered_imports' => ['sort-algorithm' => 'alpa'],
        'visibility_required' => false
    ])
    ->setFinder($config)

return $config;