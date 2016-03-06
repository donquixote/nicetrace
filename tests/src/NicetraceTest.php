<?php

namespace Donquixote\Nicetrace\Tests;

use Donquixote\Nicetrace\Util\NicetraceUtil;

class NicetraceTest extends \PHPUnit_Framework_TestCase {

  function testNicetrace() {

    $backtrace = include dirname(__DIR__) . '/fixtures/backtrace.php';
    $expectedNicetrace = include dirname(__DIR__) . '/fixtures/nicetrace.php';

    $nicetrace = NicetraceUtil::backtraceGetNicetrace($backtrace);

    // Compare array contents.
    static::assertEquals($expectedNicetrace, $nicetrace);

    // Compare array contents and order of (nested) keys.
    static::assertEquals(var_export($expectedNicetrace, TRUE), var_export($nicetrace, TRUE));
  }

}
