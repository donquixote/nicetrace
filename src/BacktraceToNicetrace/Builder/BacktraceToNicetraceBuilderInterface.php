<?php
namespace Donquixote\Nicetrace\BacktraceToNicetrace\Builder;

interface BacktraceToNicetraceBuilderInterface {

  /**
   * @return \Donquixote\Nicetrace\BacktraceToNicetrace\Builder\BacktraceToNicetraceBuilderInterface
   */
  function withClasslessKey();

  /**
   * @return \Donquixote\Nicetrace\BacktraceToNicetrace\Builder\BacktraceToNicetraceBuilderInterface
   */
  function withNamespacelessKey();

  /**
   * @return \Donquixote\Nicetrace\BacktraceToNicetrace\Builder\BacktraceToNicetraceBuilderInterface
   */
  function withClass();

  /**
   * @param string[] $basePaths
   *
   * @return \Donquixote\Nicetrace\BacktraceToNicetrace\Builder\BacktraceToNicetraceBuilderInterface
   */
  function withBasePaths(array $basePaths);

  /**
   * @return \Donquixote\Nicetrace\BacktraceToNicetrace\BacktraceToNicetraceInterface
   */
  function create();
}
