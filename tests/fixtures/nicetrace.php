<?php

/** @noinspection ImplicitMagicMethodCallInspection */
/** @noinspection PhpUndefinedMethodInspection */
return array (
  '14: Donquixote\\Nicetrace\\Tests\\NicetraceTest::staticGetBacktrace()' => 
  array (
  ),
  '13: include \'/[..]/makebacktrace.php\'' => 
  array (
    'args[0]' => '/home/lemonhead/projects/phplib/nicetrace/tests/src/makebacktrace.php',
    'makebacktrace.php: 5' => '/home/lemonhead/projects/phplib/nicetrace/tests/src/makebacktrace.php',
  ),
  '12: Donquixote\\Nicetrace\\Tests\\NicetraceTest->getBacktrace()' => 
  array (
    'args[0]: $x' => 5,
    'NicetraceTest.php: 35' => '/home/lemonhead/projects/phplib/nicetrace/tests/src/NicetraceTest.php',
  ),
  '11: Donquixote\\Nicetrace\\Tests\\NicetraceTest->testNicetraceExport()' => 
  array (
    'NicetraceTest.php: 11' => '/home/lemonhead/projects/phplib/nicetrace/tests/src/NicetraceTest.php',
  ),
  ' 10: ReflectionMethod->invokeArgs()' => 
  array (
    'args[0]: $object' => '{Donquixote\\Nicetrace\\Tests\\NicetraceTest}',
    'args[1]: $args' => 
    array (
    ),
  ),
  ' 9: PHPUnit_Framework_TestCase->runTest()' => 
  array (
    'TestCase.php: 860' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestCase.php',
  ),
  ' 8: PHPUnit_Framework_TestCase->runBare()' => 
  array (
    'TestCase.php: 737' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestCase.php',
  ),
  ' 7: PHPUnit_Framework_TestResult->run()' => 
  array (
    'args[0]: $test' => '{Donquixote\\Nicetrace\\Tests\\NicetraceTest}',
    'TestResult.php: 609' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestResult.php',
  ),
  ' 6: PHPUnit_Framework_TestCase->run()' => 
  array (
    'args[0]: $result' => '{PHPUnit_Framework_TestResult}',
    'TestCase.php: 693' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestCase.php',
  ),
  ' 5: PHPUnit_Framework_TestSuite->run()' => 
  array (
    'args[0]: $result' => '{PHPUnit_Framework_TestResult}',
    'TestSuite.php: 716' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestSuite.php',
  ),
  ' 4: PHPUnit_Framework_TestSuite->run()' => 
  array (
    'args[0]: $result' => '{PHPUnit_Framework_TestResult}',
    'TestSuite.php: 716' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/Framework/TestSuite.php',
  ),
  ' 3: PHPUnit_TextUI_TestRunner->doRun()' => 
  array (
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
    'TestRunner.php: 402' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/TextUI/TestRunner.php',
  ),
  ' 2: PHPUnit_TextUI_Command->run()' => 
  array (
    'args[0]: $argv' => 
    array (
      0 => '/home/lemonhead/.composer/vendor/bin/phpunit',
    ),
    'args[1]: $exit' => true,
    'Command.php: 152' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/TextUI/Command.php',
  ),
  ' 1: PHPUnit_TextUI_Command::main()' => 
  array (
    'Command.php: 104' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/src/TextUI/Command.php',
  ),
  ' 0: phpunit' => 
  array (
    'phpunit: 36' => '/home/lemonhead/.composer/vendor/phpunit/phpunit/phpunit',
    'argv' => 
    array (
      0 => '/home/lemonhead/.composer/vendor/bin/phpunit',
    ),
  ),
);
