<?php

namespace Donquixote\Nicetrace\Util;

use Donquixote\Nicetrace\BacktraceToNicetrace\BacktraceToNicetrace;

final class NicetraceUtil extends UtilBase {

  /**
   * @param array[] $backtrace
   *   A backtrace, as obtained with debug_backtrace(TRUE).
   * @param string[] $basePaths
   *
   * @return array[]
   */
  static function backtraceGetNicetrace(array $backtrace, array $basePaths = array()) {
    $backtraceToNicetrace = BacktraceToNicetrace::createWithBasePaths($basePaths);
    return $backtraceToNicetrace->backtraceGetNicetrace($backtrace);
  }

  /**
   * @param array $backtraceItem
   *
   * @return string
   */
  static function itemGetCombinedName(array $backtraceItem) {
    $function = $backtraceItem['function'];
    if (NULL !== $class = ArrayUtil::arrayValueOrNull($backtraceItem, 'class')) {
      $function = $class . $backtraceItem['type'] . $function . '()';
    }
    elseif ('include' === $function || 'include_once' === $function || 'require' === $function || 'require_once' === $function) {
      $includedFile = $backtraceItem['args'][0];
      if ('/' === $includedFile[0]) {
        $includedFileShortname = '/[..]/' . basename($includedFile);
      }
      elseif (FALSE !== strpos($includedFile, '/')) {
        $includedFileShortname = '[..]/' . basename($includedFile);
      }
      else {
        $includedFileShortname = $includedFile;
      }
      $function .= ' ' . $includedFileShortname;
    }
    else {
      $function .= '()';
    }
    return $function;
  }

}
