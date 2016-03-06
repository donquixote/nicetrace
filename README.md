# nicetrace
PHP library to generate a human-friendly backtrace array.

Inspired from [ddebug_backtrace()](http://cgit.drupalcode.org/devel/tree/devel.module?h=8868652ec5f2a1121cf306287f1996dad44f4c27#n1951) in the [Devel](https://drupal.org/project/devel) module for Drupal.

The structure of the nicetrace can be seen in [nicetrace.php](tests/fixtures/nicetrace.php)

## Features

- Indices of trace items enhanced with function / method names.
- Indices for arguments enhanced with parameter names (based on reflection).
- Indices of trace items reversed, so that the index reflects the depth in the call tree.
- Arguments inlined, so the array becomes flatter. E.g.  
  `$backtrace[5]['args'][0] = ..` becomes  
  `$nicetrace[' 8: foo()']['args[0]: $x'] = ..`.
- Filename and line number from trace item one level deeper, instead of the "called from".
- File paths shortened, if known base paths are specified.
- File basename and line number combined into one array key. E.g.  
  `$backtrace[5]['file'] = '/../src/MyNamespace/MyFile.php'; $backtrace[5]['line'] = 97;` becomes
  `$nicetrace[' 8: foo()']['MyClass.php: 97'] = 'src/MyNamespace/MyClass.php';`

## Basic usage

```php
use Donquixote\Nicetrace\Util\NicetraceUtil;

$backtrace = debug_backtrace();
$nicetrace = NicetraceUtil::backtraceGetNicetrace($backtrace);

// Choose your favourite recursive function/method for recursive printing.
print_r($nicetrace);
```

## Advanced usage

The library allows to create and [compose](src/BacktraceToNicetrace/BacktraceToNicetrace.php) custom [BacktraceToNicetrace](src/BacktraceToNicetrace/BacktraceToNicetraceInterface.php) handlers.

Look at the code for an idea how this works.
