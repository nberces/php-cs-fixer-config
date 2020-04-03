PHP CS Fixer Config
==

This package provides an opinionated configuration for [PHP CS Fixer][1].

These instructions assume you have PHP CS Fixer already installed.

Usage
--

Create a local PHP CS Fixer configuration file (i.e. ``.php_cs``) at the root-level
of your project with the following contents:

```php
<?php

use NBerces\PHPCSFixerConfig\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->exclude('vendor')
    ->in(__DIR__);

$config = new Config();
$config->setFinder($finder);

return $config;
```

Then run:

```console
$ php-cs-fixer fix
```

Alternatively, name your configuration file something other than ``.php_cs``
(e.g. ``.php_cs_myconfig``) and run:

```console
$ php-cs-fixer fix --config=.php_cs_myconfig
```

[1]: https://github.com/FriendsOfPHP/PHP-CS-Fixer
