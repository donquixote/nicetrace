<?php

namespace Donquixote\Nicetrace\BacktraceToNicetrace;

use Donquixote\Nicetrace\CallToNicecall\CallToNicecall_Class;
use Donquixote\Nicetrace\CallToNicecall\CallToNicecall_FileWithLine;
use Donquixote\Nicetrace\CallToNicecall\CallToNicecall_MultipleCombined;
use Donquixote\Nicetrace\CallToNicecall\CallToNicecall_NamedArgs;
use Donquixote\Nicetrace\CallToNicecall\CallToNicecallInterface;
use Donquixote\Nicetrace\CallToShortname\CallToShortname_Full;
use Donquixote\Nicetrace\CallToShortname\CallToShortname_NoNamespace;
use Donquixote\Nicetrace\CallToShortname\CallToShortnameInterface;
use Donquixote\Nicetrace\PathShortener\PathShortener_BasePaths;
use Donquixote\Nicetrace\PathShortener\PathShortener_Passthru;
use Donquixote\Nicetrace\PathShortener\PathShortenerInterface;

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
   * @var \Donquixote\Nicetrace\CallToShortname\CallToShortnameInterface
   */
  private $callToShortname;

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
      new CallToNicecall_NamedArgs(),
      new CallToShortname_Full());
  }

  /**
   * @param \Donquixote\Nicetrace\PathShortener\PathShortenerInterface $pathShortener
   *
   * @return \Donquixote\Nicetrace\BacktraceToNicetrace\BacktraceToNicetraceInterface
   */
  static function createWithNamespacelessKey(PathShortenerInterface $pathShortener) {
    return new self(
      new CallToNicecall_MultipleCombined(array(
        new CallToNicecall_FileWithLine($pathShortener),
        new CallToNicecall_Class(),
      )),
      new CallToNicecall_NamedArgs(),
      new CallToShortname_NoNamespace());
  }

  /**
   * @param \Donquixote\Nicetrace\PathShortener\PathShortenerInterface $pathShortener
   *
   * @return \Donquixote\Nicetrace\BacktraceToNicetrace\BacktraceToNicetraceInterface
   */
  static function createWithClasslessKey(PathShortenerInterface $pathShortener) {
    return new self(
      new CallToNicecall_MultipleCombined(array(
        new CallToNicecall_FileWithLine($pathShortener),
        new CallToNicecall_Class(),
      )),
      new CallToNicecall_NamedArgs(),
      new CallToShortname_NoNamespace());
  }

  /**
   * @param \Donquixote\Nicetrace\CallToNicecall\CallToNicecallInterface $innerCallToNicecall
   * @param \Donquixote\Nicetrace\CallToNicecall\CallToNicecallInterface $outerCallToNicecall
   * @param \Donquixote\Nicetrace\CallToShortname\CallToShortnameInterface $callToShortname
   */
  function __construct(CallToNicecallInterface $innerCallToNicecall, CallToNicecallInterface $outerCallToNicecall, CallToShortnameInterface $callToShortname) {
    $this->innerCallToNicecall = $innerCallToNicecall;
    $this->outerCallToNicecall = $outerCallToNicecall;
    $this->callToShortname = $callToShortname;
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

    $nicecallsByIndex = array(0 => array());
    foreach ($backtrace as $i => $call) {
      $nicecallsByIndex[$i + 1] = $this->innerCallToNicecall->callGetNicecall($call);
    }
    foreach ($backtrace as $i => $call) {
      $nicecallsByIndex[$i] += $this->outerCallToNicecall->callGetNicecall($call);
    }

    $nbsp = "\xC2\xA0";

    $nicetrace = array();
    foreach ($backtrace as $i => $call) {
      $combinedName = $this->callToShortname->callGetShortname($call);
      $depth = $n - $i;
      $depthStr = ($depth <= 10 ? $nbsp : '') . $depth;
      $nicetrace[$depthStr . ': ' . $combinedName] = $nicecallsByIndex[$i];
    }

    $combinedName = '#';
    /** @noinspection UnSafeIsSetOverArrayInspection */
    if (isset($backtrace[$n - 1]['file'])) {
      $combinedName = basename($backtrace[$n - 1]['file']);
    }

    $nicetrace[' 0: ' . $combinedName] = $nicecallsByIndex[$n];

    return $nicetrace;
  }
}
