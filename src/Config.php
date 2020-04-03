<?php

namespace NBerces\PHPCSFixerConfig;

use BadMethodCallException;
use PhpCsFixer\Config as BaseConfig;
use PhpCsFixer\Fixer\Import\OrderedImportsFixer;

/**
 * Class Config
 */
class Config extends BaseConfig
{
    /**
     * Config constructor.
     *
     * @param string|null $name
     */
    public function __construct(?string $name)
    {
        if (empty($name)) {
            $name = 'default';
        }

        parent::__construct($name);

        $this->setRiskyAllowed(true);
    }

    /**
     * {@inheritDoc}
     */
    public function getRules()
    {
        return [
            '@PSR2' => true,
            'array_syntax' => [
                'syntax' => 'short'
            ],
            'class_attributes_separation' => [
                'elements' => [
                    'method'
                ]
            ],
            'ordered_class_elements' => [
                'order' => [
                    'use_trait',
                    'constant_public',
                    'constant_protected',
                    'constant_private',
                    'property_public',
                    'property_protected',
                    'property_private',
                    'method_public_static',
                    'method_protected_static',
                    'method_private_static',
                    'construct',
                    'destruct',
                    'magic',
                    'phpunit',
                    'method_public',
                    'method_protected',
                    'method_private'
                ],
                'sort_algorithm' => 'alpha'
            ],
            'ordered_imports' => [
                'importsOrder' => [
                    OrderedImportsFixer::IMPORT_TYPE_CLASS,
                    OrderedImportsFixer::IMPORT_TYPE_CONST,
                    OrderedImportsFixer::IMPORT_TYPE_FUNCTION,
                ],
                'sort_algorithm' => 'alpha'
            ],
            'ordered_interfaces' => [
                'direction' => 'ascend',
                'order' => 'alpha'
            ],
            'ordered_traits' => true,
            'phpdoc_order' => true
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function setRules(array $rules)
    {
        throw new BadMethodCallException(
            'This is an _opinionated_ config! Setting rules is prohibited, sorry.'
        );
    }
}
