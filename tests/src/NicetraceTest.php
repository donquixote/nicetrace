<?php

namespace Donquixote\Nicetrace\Tests;

use Donquixote\Nicetrace\Util\NicetraceUtil;

class NicetraceTest extends \PHPUnit_Framework_TestCase {

  function testNicetraceExport() {

    $backtrace = $this->getBacktrace(5);

    foreach ($backtrace as &$item) {
      unset($item['object']);
      /** @noinspection UnSafeIsSetOverArrayInspection */
      if (!isset($item['args'])) {
        continue;
      }
      foreach ($item['args'] as $i => &$arg) {
        if (is_object($arg)) {
          $arg = '{' . get_class($arg) . '}';
        }
      }
      unset($arg);
    }
    unset($item);

    $nicetrace = NicetraceUtil::backtraceGetNicetrace($backtrace);

    $this->export($backtrace, dirname(__DIR__) . '/fixtures/backtrace.php');
    $this->export($nicetrace, dirname(__DIR__) . '/fixtures/nicetrace.php');
  }

  private function getBacktrace($x) {
    return include __DIR__ . '/makebacktrace.php';
  }

  static function staticGetBacktrace() {
    return debug_backtrace();
  }

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

  function nicetraceProvider() {
    return array(
      array(
        include dirname(__DIR__) . '/fixtures/backtrace.php',
        include dirname(__DIR__) . '/fixtures/nicetrace.php',
      ),
    );
  }

  /**
   * @param mixed $var
   * @param string $file
   */
  private function export($var, $file) {

    # $var = serialize($var);
    $export = var_export($var, TRUE);
    $export = <<<EOT
<?php

/** @noinspection ImplicitMagicMethodCallInspection */
/** @noinspection PhpUndefinedMethodInspection */
return $export;

EOT;
    file_put_contents($file, $export);
  }
}
