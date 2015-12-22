<?php // phar-builder.php

$stub = <<<EOF
  #!/usr/bin/env php
  <?php
    Phar::mapPhar('phpunit_facebook_webdriver.phar');
    require 'phar://phpunit_facebook_webdriver.phar/bootstrap.php';
    __HALT_COMPILER();
  ?>
EOF;

$phar = new Phar('phpunit_facebook_webdriver.phar');
$phar->setStub($stub);
$phar->buildFromDirectory('vendor');
$phar->compressFiles(Phar::BZ2);
$phar->stopBuffering();