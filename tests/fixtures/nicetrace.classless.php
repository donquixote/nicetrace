<?php

/** @noinspection ImplicitMagicMethodCallInspection */
/** @noinspection PhpUndefinedMethodInspection */
return array (
  '14: ::staticGetBacktrace()' =>
  array (
    'class' => 'Donquixote\\Nicetrace\\Tests\\NicetraceTest',
  ),
  '13: include /[..]/makebacktrace.php' => 
  array (
    'makebacktrace.php: 5' => '/home/lemonhead/projects/phplib/nicetrace/tests/src/makebacktrace.php',
    'args[0]' => '/home/lemonhead/projects/phplib/nicetrace/tests/src/makebacktrace.php',
  ),
  '12: ->getBacktrace()' =>
  array (
    'NicetraceTest.php: 35' => '/home/lemonhead/projects/phplib/nicetrace/tests/src/NicetraceTest.php',
    'class' => 'Donquixote\\Nicetrace\\Tests\\NicetraceTest',
    'args[0]' => 5,
  ),
  '11: ->testNicetraceExport()' =>
  array (
    'NicetraceTest.php: 11' => '/home/lemonhead/projects/phplib/nicetrace/tests/src/NicetraceTest.php',
    'class' => 'Donquixote\\Nicetrace\\Tests\\NicetraceTest',
  ),
  ' 10: ->invokeArgs()' =>
  array (
    'class' => 'ReflectionMethod',
    'args[0]: $object' => '{Donquixote\\Nicetrace\\Tests\\NicetraceTest}',
    'args[1]: $args' => 
    array (
    ),
  ),
  ' 9: ->runTest()' =>
  array (
    'TestCase.php: 860' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestCase.php',
    'class' => 'PHPUnit_Framework_TestCase',
  ),
  ' 8: ->runBare()' =>
  array (
    'TestCase.php: 737' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestCase.php',
    'class' => 'PHPUnit_Framework_TestCase',
  ),
  ' 7: ->run()' =>
  array (
    'TestResult.php: 609' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestResult.php',
    'class' => 'PHPUnit_Framework_TestResult',
    'args[0]: $test' => '{Donquixote\\Nicetrace\\Tests\\NicetraceTest}',
  ),
  ' 6: ->run()' =>
  array (
    'TestCase.php: 693' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestCase.php',
    'class' => 'PHPUnit_Framework_TestCase',
    'args[0]: $result' => '{PHPUnit_Framework_TestResult}',
  ),
  ' 5: ->run()' =>
  array (
    'TestSuite.php: 716' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestSuite.php',
    'class' => 'PHPUnit_Framework_TestSuite',
    'args[0]: $result' => '{PHPUnit_Framework_TestResult}',
  ),
  ' 4: ->run()' =>
  array (
    'TestSuite.php: 716' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestSuite.php',
    'class' => 'PHPUnit_Framework_TestSuite',
    'args[0]: $result' => '{PHPUnit_Framework_TestResult}',
  ),
  ' 3: ->doRun()' =>
  array (
    'TestRunner.php: 402' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/TextUI/TestRunner.php',
    'class' => 'PHPUnit_TextUI_TestRunner',
    'args[0]: $suite' => '{PHPUnit_Framework_TestSuite}',
    'args[1]: $arguments' => 
    array (
      'listGroups' => false,
      'loader' => NULL,
      'useDefaultConfiguration' => true,
      'testSuffixes' => 
      array (
        0 => 'Test.php',
        1 => '.phpt',
      ),
      'configuration' => '/home/lemonhead/projects/phplib/nicetrace/phpunit.xml.dist',
    ),
  ),
  ' 2: ->run()' =>
  array (
    'Command.php: 152' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/TextUI/Command.php',
    'class' => 'PHPUnit_TextUI_Command',
    'args[0]: $argv' => 
    array (
      0 => '/home/lemonhead/.composer/vendor/bin/phpunit',
    ),
    'args[1]: $exit' => true,
  ),
  ' 1: ::main()' =>
  array (
    'Command.php: 104' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/TextUI/Command.php',
    'class' => 'PHPUnit_TextUI_Command',
  ),
  ' 0: phpunit' => 
  array (
    'phpunit: 36' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/phpunit',
  ),
);
