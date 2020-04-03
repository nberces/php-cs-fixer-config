<?php

namespace NBerces\PHPCSFixerConfigTests;

use BadMethodCallException;
use NBerces\PHPCSFixerConfig\Config;
use PHPUnit\Framework\TestCase;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ConfigTest
 * @package NBerces\PHPCSFixerConfigTests
 */
class ConfigTest extends TestCase
{
    public function testConstructsUsingNameParameter()
    {
        $name = uniqid('configName_');

        $config = $this->createConfig(
            [
                'name' => $name
            ]
        );

        self::assertEquals($name, $config->getName());
    }

    public function testContructs()
    {
        $config = $this->createConfig();

        self::assertNotEmpty($config->getName());
        self::assertNotEmpty($config->getRules());
    }

    public function testProhibitsSettingRules()
    {
        $config = $this->createConfig();

        self::expectException(BadMethodCallException::class);

        $config->setRules([]);
    }

    protected function createConfig(array $options = [])
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults(
            [
                'mockMethods' => [],
                'name' => null
            ]
        );

        $options = $resolver->resolve($options);

        if (!empty($options['mockMethods'])) {
            return $this
                ->getMockBuilder(Config::class)
                ->setConstructorArgs(
                    [
                        $options['name']
                    ]
                )
                ->onlyMethods($options['mockMethods'])
                ->getMock();
        }

        return new Config($options['name']);
    }
}
