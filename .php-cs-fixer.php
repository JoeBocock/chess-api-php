<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in(getcwd());

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'no_superfluous_phpdoc_tags' => true,
        'php_unit_method_casing' => [
            'case' => 'snake_case',
        ],
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false,
        ],
        'not_operator_with_successor_space' => true,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'self_accessor' => true,
        'declare_strict_types' => true,
    ])
    ->setFinder($finder)
    ->setLineEnding("\n")
    ->setUsingCache(false)
    ->setRiskyAllowed(true);
