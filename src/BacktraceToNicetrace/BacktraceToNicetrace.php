<?php

namespace Donquixote\Nicetrace\BacktraceToNicetrace;

use Donquixote\Nicetrace\CallToNicecall\CallToNicecall_FileWithLine;
use Donquixote\Nicetrace\CallToNicecall\CallToNicecall_NamedArgs;
use Donquixote\Nicetrace\CallToNicecall\CallToNicecallInterface;
use Donquixote\Nicetrace\PathShortener\PathShortener_BasePaths;
use Donquixote\Nicetrace\PathShortener\PathShortener_Passthru;
use Donquixote\Nicetrace\PathShortener\PathShortenerInterface;
use Donquixote\Nicetrace\Util\NicetraceUtil;

class BacktraceToNicetrace implements BacktraceToNicetraceInterface {

  /**
   * @var \Donquixote\Nicetrace\CallToNicecall\CallToNicecallInterface
   */
  private $innerCallToNicecall;

  /**
   * @var \Donquixote\Nicetrace\CallToNicecall\CallToNicecallInterface
   */
  private $outerCallToNicecall;

  /**
   * @return \Donquixote\Nicetrace\BacktraceToNicetrace\BacktraceToNicetraceInterface
   */
  static function createPassthru() {
    return self::create(new PathShortener_Passthru());
  }

  /**
   * @param string[] $basePaths
   *
   * @return \Donquixote\Nicetrace\BacktraceToNicetrace\BacktraceToNicetraceInterface
   */
  static function createWithBasePaths(array $basePaths = array()) {
    $pathShortener = (array() === $basePaths)
      ? new PathShortener_Passthru()
      : new PathShortener_BasePaths($basePaths);
    return self::create($pathShortener);
  }

  /**
   * @param \Donquixote\Nicetrace\PathShortener\PathShortenerInterface $pathShortener
   *
   * @return \Donquixote\Nicetrace\BacktraceToNicetrace\BacktraceToNicetraceInterface
   */
  static function create(PathShortenerInterface $pathShortener) {
    return new self(
      new CallToNicecall_FileWithLine($pathShortener),
      new CallToNicecall_NamedArgs());
  }

  /**
   * @param \Donquixote\Nicetrace\CallToNicecall\CallToNicecallInterface $innerCallToNicecall
   * @param \Donquixote\Nicetrace\CallToNicecall\CallToNicecallInterface $outerCallToNicecall
   */
  function __construct(CallToNicecallInterface $innerCallToNicecall, CallToNicecallInterface $outerCallToNicecall) {
    $this->innerCallToNicecall = $innerCallToNicecall;
    $this->outerCallToNicecall = $outerCallToNicecall;
  }

  /**
   * @param array $backtrace
   *   A backtrace, as obtained with debug_backtrace().
   *
   * @return array
   *
   * @see debug_backtrace()
   */
  function backtraceGetNicetrace(array $backtrace) {

    if (array() === $backtrace) {
      return array();
    }

    $n = count($backtrace);

    $nicecallsByIndex = array($n => array());
    foreach ($backtrace as $i => $call) {
      $nicecallsByIndex[$i] = $this->outerCallToNicecall->callGetNicecall($call);
    }
    foreach ($backtrace as $i => $call) {
      $nicecallsByIndex[$i + 1] += $this->innerCallToNicecall->callGetNicecall($call);
    }

    $nbsp = "\xC2\xA0";

    $nicetrace = array();
    foreach ($backtrace as $i => $call) {
      $combinedName = NicetraceUtil::itemGetCombinedName($call);
      $depth = $n - $i;
      $depthStr = ($depth <= 10 ? $nbsp : '') . $depth;
      $nicetrace[$depthStr . ': ' . $combinedName] = $nicecallsByIndex[$i];
    }

    $combinedName = '#';
    if (isset($backtrace[$n - 1]['file'])) {
      $combinedName = basename($backtrace[$n - 1]['file']);
    }

    $nicetrace[' 0: ' . $combinedName] = $nicecallsByIndex[$n];

    return $nicetrace;
  }
}
