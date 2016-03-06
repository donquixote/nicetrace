<?php

namespace Donquixote\Nicetrace\Tests;

use Donquixote\Nicetrace\Util\NicetraceUtil;

class NicetraceTest extends \PHPUnit_Framework_TestCase {

  /**
   * @dataProvider nicetraceProvider
   *
   * @param array $backtrace
   * @param array $expectedNicetrace
   */
  function testNicetrace(array $backtrace, array $expectedNicetrace) {

    $nicetrace = NicetraceUtil::backtraceGetNicetrace($backtrace);

    static::assertEquals($expectedNicetrace, $nicetrace);
  }

  /**
   * @return mixed[][]
   */
  function nicetraceProvider() {
    return array(
      array(
        include dirname(__DIR__) . '/fixtures/backtrace.php',
        include dirname(__DIR__) . '/fixtures/nicetrace.php',
      ),
    );
  }
}
